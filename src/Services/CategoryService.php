<?php

namespace App\Services;

use App\Models\Category;
use App\Utils\Validator;
use Exception;
use PDOException;

class CategoryService
{

    public static function create(array $data)
    {

        try {

            $fields = Validator::validate([
                'name' => $data['name'] ?? ''
            ]);

            $category = Category::save($fields);

            if (!$category) {
                return ['error' => 'Sorry, we could not create a category.'];
            }

            return "Category created successfully!";
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

            $category = Category::findById($strId);

            if (!$category) {
                return ['error' => 'Category not found.'];
            }

            return $category;
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
                'name' => $data['name'] ?? ''
            ]);

            $category = Category::update($id, $fields);

            if (!$category) {
                return ['error' => 'Sorry, we could not update this category.'];
            }

            return $category;
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function list()
    {
        try {

            $categories = Category::find();

            if (!$categories) {
                return ['error' => 'Sorry, categories not found.'];
            }

            return $categories;
        } catch (PDOException $e) {
            return ['error' => $e->errorInfo[0]];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }

    }
}