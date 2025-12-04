<?php
$Sname = "localhost";
$username = "root";         
$password = "Password@1";              
$db = "register";

$conn = new mysqli($Sname, $username, $password, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

echo "Connection Successfully";
?>
