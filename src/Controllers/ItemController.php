<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\ItemService;

class ItemController
{
    public function store(Request $request, Response $response)
    {

        $body = $request::body();

        $itemService = ItemService::create($body);

        if (isset($itemService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $itemService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $itemService
        ], 201);
    }

    public function update(Request $request, Response $response, array $arrId)
    {

        $id = $arrId[0] ?? 0;

        $body = $request->body();

        $itemService = ItemService::update($id, $body);

        if (isset($itemService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $itemService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $itemService
        ], 201);
    }

}