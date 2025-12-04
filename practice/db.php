<?php
$server="localhost:3307";
$username="root";
$password="";
$dbname="firstdb";
$conn=mysqli_connect($server,$username,$password,$dbname);
if($conn){
    // echo "connection successfully";
}
else{
    echo "connection error";
}
?>
