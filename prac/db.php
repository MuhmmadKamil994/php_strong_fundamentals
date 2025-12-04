<?php
$server="localhost:3307";
$username="root";
$password="";
$dbname="curd";
$conn=mysqli_connect($server,$username,$password,$dbname);
if($conn){
    // echo "connection successfully"; 
}
else{
    echo "connection error";
}
?>