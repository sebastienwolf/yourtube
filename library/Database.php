<?php

class Database
{
    // singleton sur $instance pour la connexion
    private static $instance = null;


    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = $pdo = new PDO('mysql:host=i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=ros2shytxjjcf00d;charset=utf8', 'r7eznm3mp4t3di5q', 'eyvnxk8rxgzzojw1', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}
