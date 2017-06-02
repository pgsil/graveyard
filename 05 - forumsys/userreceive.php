<?php
//start session
session_start();

//connection stuff goes here:
include("./db.php");
DB::connect();


$username = $_POST["username_new"];
$password = $_POST["password_new"];
$hash = password_hash($password, PASSWORD_DEFAULT);

DB::$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

$stmt = DB::$connection->prepare("INSERT INTO users set username=?, hashedpassword=?");
$stmt->execute([$username, $hash]);

header("location: /forumsys/login.php");
?>