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
            INSERT INTO categories 
            (
                name,
                created_at
            )
            VALUES (?, ?)
        ");

        $stmt->execute([
            $data['name'],
            date('Y-m-d H:i:s')
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
                name = ?,
                updated_at = ?
            WHERE 
                id = ?
        ');

        $name = $data['name'] ?? '';
        $updatedAt = date('Y-m-d H:i:s');

        $stmt->execute([$name, $updatedAt, $id]);

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