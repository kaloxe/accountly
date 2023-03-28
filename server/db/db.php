<?php

$connection = new mysqli('localhost', 'root', '', 'danlipagos_hil');

date_default_timezone_set("America/Caracas");
$host = "localhost";
$user_db = "root";
$pass_db = "";
$db = "danlipagos_hil";

try {
    $conn = new PDO("mysql:host=$host; dbname=$db", $user_db, $pass_db, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

$conn->query("SET NAMES 'utf8'");

$conn->exec("set names utf8");