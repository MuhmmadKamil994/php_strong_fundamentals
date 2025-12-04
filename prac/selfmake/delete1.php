
<?php
include 'db.php';
if(isset($_POST['deletebtn'])){
$stud_id=$_POST['id'];
$sql=$conn->prepare("delete from student where id=?");
$sql->execute([$stud_id]);
header("location:view.php");
}
$conn=null;
?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>