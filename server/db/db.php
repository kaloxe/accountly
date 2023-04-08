<?php

$conn = new mysqli('localhost', 'root', '', 'accountly');

date_default_timezone_set("America/Caracas");
$host = "localhost";
$user_db = "root";
$pass_db = "";
$db = "accountly";

try {
    $connection = new PDO("mysql:host=$host; dbname=$db", $user_db, $pass_db, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}


$connection->query("SET NAMES 'utf8'");

$connection->exec("set names utf8");


// ?>
