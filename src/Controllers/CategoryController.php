<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\CategoryService;

class CategoryController
{

    public function store(Request $request, Response $response)
    {

        $body = $request::body();

        $categoryService = CategoryService::create($body);

        if (isset($categoryService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $categoryService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $categoryService
        ], 201);
    }

    public function fetch(Request $request, Response $response, array $arrId)
    {

        $id = $arrId[0] ?? 0;

        $categoryService = CategoryService::fetch($id);

        if (isset($categoryService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $categoryService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $categoryService
        ], 201);
    }

    public function update(Request $request, Response $response, array $arrId)
    {

        $id = $arrId[0] ?? 0;

        $body = $request->body();

        $categoryService = CategoryService::update($id, $body);

        if (isset($categoryService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $categoryService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $categoryService
        ], 201);
    }

    public function list(Request $request, Response $response)
    {

        $categoryService = CategoryService::list();

        if (isset($categoryService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $categoryService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $categoryService
        ], 201);
    }

}