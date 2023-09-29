<?php
$conn = new mysqli('127.0.0.1:3366', 'root', '', 'accountly');

// date_default_timezone_set("America/Caracas");
// $host = "127.0.0.1:3366";
// $user_db = "root";
// $pass_db = "";
// $db = "accountly";
// try {
//     $connection = new PDO("mysql:host=$host; dbname=$db", $user_db, $pass_db, array(
//         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
//     ));
// } catch (PDOException $e) {
//     die('Connection Failed: ' . $e->getMessage());
// }
// $connection->query("SET NAMES 'utf8'");
// $connection->exec("set names utf8");