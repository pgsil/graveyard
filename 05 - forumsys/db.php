<?php

class DB {

    private static $servername = "localhost";
    private static $username     = "admin";
    private static $password     = "9Ufxpjj3UbjjhJN9";

    public static $connection;

    public static function connect() {

        try {

            self::$connection = new PDO(
                "mysql:host=" . self::$servername . ";dbname=forum",
                self::$username,
                self::$password
            );

        } catch(PDOException $e) {
            echo "oh dangit: " . $e->getMessage();
            die;
        }
    }
}

?>