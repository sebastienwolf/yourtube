<?php

class Database
{
    // singleton sur $instance pour la connexion
    private static $instance = null;


    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = $pdo = new PDO('mysql:host=localhost;dbname=yourtube;charset=utf8', 'sebastien', 'sebastien', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}
