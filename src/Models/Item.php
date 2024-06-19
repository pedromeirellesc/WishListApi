<?php

namespace App\Models;

use PDO;

class Item extends Database
{
    public static function save(array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO items (
                wish_list_id,
                name, 
                description, 
                price, 
                priority, 
                status,
                created_at
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['wish_list_id'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['priority'],
            $data['status'],
            date('Y-m-d H:i:s')
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function update(int|string $id, array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare('
            UPDATE
                items
            SET 
                wish_list_id = ?,
                name = ?,
                description = ?,
                price = ?,
                priority = ?,
                status = ?,
                updated_at = ?
            WHERE 
                id = ?
        ');

        $wishListId = $data['wish_list_id'] ?? '';
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $priority = $data['priority'] ?? '';
        $status = $data['status'] ?? '';
        $updatedAt = date('Y-m-d H:i:s');

        $stmt->execute([$wishListId, $name, $description, $price, $priority, $status, $updatedAt, $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

}