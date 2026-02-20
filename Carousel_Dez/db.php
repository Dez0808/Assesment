<?php
// db.php - Database connection file
$host = "localhost";
$user = "root";
$pass = "";
$db = "dez"; 

$conn = new mysqli($host, $user, $pass, $db);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
