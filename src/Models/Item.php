<?php

namespace App\Models;

use PDO;

class Item extends Database
{
    public static function save(array $data)
    {

        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO items (wish_list_id, name, description, price, priority, status)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['wish_list_id'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['priority'],
            $data['status']
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
                status = ?
            WHERE 
                id = ?
        ');

        $wishListId = $data['wish_list_id'] ?? '';
        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $priority = $data['priority'] ?? '';
        $status = $data['status'] ?? '';

        $stmt->execute([$wishListId, $name, $description, $price, $priority, $status, $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

}