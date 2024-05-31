<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\WishListService;

class WishListController
{

    public function store(Request $request, Response $response)
    {

        $body = $request::body();

        $wishListService = WishListService::create($body);

        if (isset($wishListService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $wishListService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $wishListService
        ], 201);
    }

    public function fetch(Request $request, Response $response, array $arrId)
    {

        $id = $arrId[0] ?? 0;

        $wishListService = WishListService::fetch($id);

        if (isset($wishListService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $wishListService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $wishListService
        ], 201);
    }

    public function update(Request $request, Response $response, array $arrId)
    {

        $id = $arrId[0] ?? 0;

        $body = $request->body();

        $wishListService = WishListService::update($id, $body);

        if (isset($wishListService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $wishListService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $wishListService
        ], 201);
    }

    public function list(Request $request, Response $response)
    {

        $wishListService = WishListService::list();

        if (isset($wishListService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $wishListService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $wishListService
        ], 201);
    }

}