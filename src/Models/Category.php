<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class Category extends Database
{

    public static function save(array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO categories (name)
            VALUES (?)
        ");

        $stmt->execute([
            $data['name']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function findById(int|string $id)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            SELECT 
                *
            FROM 
                categories
            WHERE
                id = ?
        ');

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update(int|string $id, array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            UPDATE
                categories
            SET 
                name = ?
            WHERE 
                id = ?
        ');

        $name = $data['name'] ?? '';

        $stmt->execute([$name, $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function find()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            SELECT 
                *
            FROM 
                categories
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}