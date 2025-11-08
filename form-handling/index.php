<?php
session_start();
echo "session is started";

$cookie_name="userone";
$cookies_value="blue shirts";
setcookie($cookie_name,$cookies_value,time()+3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form handling</title>
</head>
<body>
    <h1>This is form for testing</h1>
    
    <!-- <form action="view.php"method="get">-->
   <form action="view.php"method="post">
    <!-- <form action="<?php #$_SERVER['PHP_SELF'] ?>" method="post">  -->

    <input type="text" name="email"><br><br>
    <input type="password" name="password"><br>
    <input type="submit" name="submit">
    </form>

<?php if(isset($_POST['submit'])){
    $_SESSION['email'] =$_POST['email']."<br>";
   $_SESSION['password']=$_POST['password'];
   echo "session is ended";
} ?>


</body>
</html>
