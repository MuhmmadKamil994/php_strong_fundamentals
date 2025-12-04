<?php
include 'db.php';
 $stud_id=$_POST['sid'];
 $stud_name=$_POST['sname'];
 $stud_address=$_POST['saddress'];
 $stud_class=$_POST['sclass'];
 $stud_phone=$_POST['sphone'];
$sql="update student set sid='{$stud_id}',sname='{$stud_name}',saddress='{$stud_address}',sclass='{$stud_class}',sphone='{$stud_phone}' where sid='{$stud_id}'";
$result=mysqli_query($conn,$sql) or die("query not running");
header("location:index.php");
mysqli_close($conn);
?>