<?php

namespace App\Services;

use App\Models\WishList;
use App\Utils\Validator;
use Exception;
use PDOException;

class WishListService
{
    public static function create(array $data)
    {

        try {

            $fields = Validator::validate([
                'category_id' => $data['category_id'] ?? '',
                'name' => $data['name'] ?? '',
                'description' => $data['description'] ?? ''
            ]);

            $wishList = WishList::save($fields);

            if (!$wishList) {
                return ['error' => 'Sorry, we could not create a wish list.'];
            }

            return "Wish list created successfully!";
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }

    }

    public static function fetch(int|string $id)
    {

        try {

            $strId = $id[0] ?? false;

            if (!$strId) {
                return ['error' => 'Invalid params.'];
            }

            $wishList = WishList::findById($strId);

            if (!$wishList) {
                return ['error' => 'Wish list not found.'];
            }

            return $wishList;
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
                'category_id' => $data['category_id'] ?? '',
                'name' => $data['name'] ?? '',
                'description' => $data['description'] ?? ''
            ]);

            $wishList = WishList::update($id, $fields);

            if (!$wishList) {
                return ['error' => 'Sorry, we could not update this wish list.'];
            }

            return $wishList;
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function list()
    {
        try {

            $wishLists = WishList::find();

            if (!$wishLists) {
                return ['error' => 'Sorry, wish lists not found.'];
            }

            return $wishLists;
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }

    }
}
