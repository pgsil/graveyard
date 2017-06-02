<?php
//start session
session_start();

//connection stuff goes here:
include("./db.php");
DB::connect();

$username = $_POST["username_new"];
$password = $_POST["password_new"];
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = DB::$connection->prepare("INSERT INTO accounts set username=?, password=?");
$stmt->execute([$username, $hash]);

header("location: /blogsys/login.php");

?>