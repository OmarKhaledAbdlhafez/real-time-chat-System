<?php
/**
 * Created by PhpStorm.
 * User: omar khaled
 * Date: 8/16/2019
 * Time: 10:00 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=chat", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    }
?>