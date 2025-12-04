<?php
include 'db.php';
$stud_id=$_GET['id'];
$sql=$conn->prepare("delete from student where id=?");
$sql->execute([$stud_id]);
$conn=null;
?>