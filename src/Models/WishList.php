<?php

namespace App\Models;
use PDO;

class WishList extends Database
{

    public static function save(array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO 
                wish_lists 
                (
                    category_id,
                    name,
                    description,
                    created_at
                )
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['category_id'],
            $data['name'],
            $data['description'],
            date('Y-m-d H:i:s'),
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
                wish_lists
            WHERE
                wish_lists.id = ?
        ');

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update(int|string $id, array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            UPDATE
                wish_lists
            SET 
                category_id = ?,
                name = ?,
                description = ?,
                updated_at = ?
            WHERE 
                id = ?
        ');

        $categoryId = $data['category_id'] ?? '';
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $updatedAt = date('Y-m-d H:i:s');

        $stmt->execute([$categoryId, $name, $description, $updatedAt, $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function find()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            SELECT 
                *
            FROM 
                wish_lists
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}