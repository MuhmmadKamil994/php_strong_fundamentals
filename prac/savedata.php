<?php
include 'db.php';
echo $stud_name=$_POST['sname'];
echo $stud_address=$_POST['saddress'];
 echo $stud_class=$_POST['class'];
echo $stud_phone=$_POST['sphone'];
$sql="insert into student(sname,saddress,sclass,sphone) values('{$stud_name}','{$stud_address}','{$stud_class}','{$stud_phone}')";
$result=mysqli_query($conn,$sql) or die("query not running");
header("location:index.php");
mysqli_close($conn);
?>