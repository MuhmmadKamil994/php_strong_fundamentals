<?php
include "db.php";
echo $stud_id=$_GET['id'];
$sql="delete from student where sid={$stud_id}";
$query=mysqli_query($conn,$sql) or die("query no run");
header("location:index.php");
mysqli_close($conn);
?>
