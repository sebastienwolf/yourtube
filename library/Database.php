<?php

class Database
{
    // singleton sur $instance pour la connexion
    private static $instance = null;


    public static function getPdo(): PDO
    {
        $dbHost = $_ENV["HOST"];
        $dbName = $_ENV["DB_NAME"];
        $dbUser = $_ENV["DB_USERNAME"];
        $dbPwd = $_ENV["DB_PASSWORD"];
        
        if (self::$instance === null) {
            self::$instance = $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", "$dbUser", "$dbPwd", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}
