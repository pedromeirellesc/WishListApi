<?php

namespace App\Models;

use PDO;

class Database
{

    public static function getConnection()
    {

        $pdo = new PDO('mysql:host=localhost;dbname=wish_list', "root", "");

        return $pdo;
    }
}