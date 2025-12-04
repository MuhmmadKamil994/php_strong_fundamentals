<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Variable</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Name:<input type="text" name="name"><br><br>
        Age:<input type="text" name="age"><br><br>
        <input type="submit" name="save">
</form>
<?php


if(isset($_POST['save'])){
echo $_POST['name']."<br>";
echo $_POST['age'];

}

?>
</body>
</html>