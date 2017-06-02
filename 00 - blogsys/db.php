<?php

class DB {

    private static $servername = "localhost";
    private static $username     = "blog";
    private static $password     = "blogpwd";

    public static $connection;

    public static function connect() {

        try {

            self::$connection = new PDO(
                "mysql:host=" . self::$servername . ";dbname=blog",
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