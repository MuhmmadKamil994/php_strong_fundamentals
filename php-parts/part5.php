<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
echo $_POST['fname'].PHP_EOL;
echo $_POST['lname'];

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get method</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  Fisrt Name: <input type="text"  name="fname">  
  Last Name: <input type="text"  name="lname">  
  <input type="submit" value="Submit">
  </form>
</body>
</html>
