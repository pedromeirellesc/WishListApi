<?php

namespace App\Services;

use App\Models\Item;
use App\Utils\Validator;
use Exception;
use PDOException;

class ItemService
{

    public static function create(array $data)
    {

        try {

            $fields = Validator::validate([
                'wish_list_id' => $data['wish_list_id'] ?? '',
                'name' => $data['name'] ?? '',
                'description' => $data['description'] ?? '',
                'price' => $data['price'] ?? '',
                'priority' => $data['priority'] ?? '',
                'status' => $data['status'] ?? ''
            ]);

            $item = Item::save($fields);

            if (!$item) {
                return ['error' => 'Sorry, we could not create a item.'];
            }

            return "Item created successfully!";
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }

    }

    public static function update(int|string $id, array $data)
    {

        try {

            $fields = Validator::validate([
                'wish_list_id' => $data['wish_list_id'] ?? '',
                'name' => $data['name'] ?? '',
                'description' => $data['description'] ?? '',
                'price' => $data['price'] ?? '',
                'priority' => $data['priority'] ?? '',
                'status' => $data['status'] ?? ''
            ]);

            $item = Item::update($id, $fields);

            if (!$item) {
                return ['error' => 'Sorry, we could not update this item.'];
            }

            return $item;
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

}