<?php
session_start();

echo "email:".$_SESSION['email']."<br>";
echo "password:".$_SESSION['password']."<br>";
// echo $_POST['email']."<br>";
// echo $_POST['password']."<br>";


// echo $_GET['email']."<br>";
// echo $_GET['password'];
 if(isset($_COOKIE['userone'])){
        echo $_COOKIE['userone'];
    }else{
        echo "cookie is not working";
    } 

?>