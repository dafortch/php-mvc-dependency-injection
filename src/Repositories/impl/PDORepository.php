<?php

namespace App\Repositories\impl;

use App\Repositories\Repository;
use PDO;

abstract class PDORepository implements Repository
{
    protected static function getConnection(): PDO
    {
        $dsn = $_ENV['PDO_DB_DSN'] ?? 'mysql:host=localhost;dbname=database;charset=utf8';
        $user = $_ENV['PDO_DB_USER'] ?? 'root';
        $password = $_ENV['PDO_DB_PASSWORD'] ?? 'root';

        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}