<?php
$server="localhost:3307";
$username="root";
$password="";
$dbname="employee";

try {
    $conn=new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
     echo "connection successful";
} catch (Exception $e) {
     echo "connection error".$e->getMessage();
}
?>
