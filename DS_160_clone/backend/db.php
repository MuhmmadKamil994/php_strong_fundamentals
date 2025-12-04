<?php
$host = "localhost";
$user = "root";
$pass = "Password@1";
$dbname = "ds_160";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>
