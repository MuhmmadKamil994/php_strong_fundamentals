<?php
if(isset($_FILES['image'])){
   
    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    if(move_uploaded_file($file_tmp,"images/"."$file_name")){
        echo "file successfully Uploaded";
    }
    else{
        echo "File couldnot uploads";
    }

}
$cookie_name="user";
$cookie_value="Muhammad kamil";
setcookie($cookie_name,$cookie_value, time() + 3600); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Globals</title>
</head>
<body>
    <?php
  
    if(isset($_COOKIE[$cookie_name])){
    echo $_COOKIE[$cookie_name];
}
else{
    echo "Cookies are not set";
}
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image"><br>
        <input type="submit">
    </form>
</body>
</html>
