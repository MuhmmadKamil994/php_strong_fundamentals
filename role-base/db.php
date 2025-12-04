<?php
$servername='localhost:3307';
$username="root";
$dbname="multiple_user";
$password="";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "you have error";
}
?>