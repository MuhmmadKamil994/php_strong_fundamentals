<?php include 'header.php';
include 'db.php';
?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $stu_id=$_GET['id'];
    $sql ="select * from student where sid={$stu_id}";
  $result=mysqli_query($conn,$sql) or die("query failed");
  if(mysqli_num_rows($result)>0){
while ($rows =mysqli_fetch_assoc($result)) {

    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $rows['sid']; ?>"/>
          <input type="text" name="sname" value="<?php echo $rows['sname']; ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $rows['saddress']; ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <?php
          $sql1="select * from studendclass "; 
          $query=mysqli_query($conn,$sql1) or die("query not running");
          if(mysqli_num_rows($query)>0){
          echo  '<select name="sclass">';
           while($row1=mysqli_fetch_assoc($query)){
            if($rows['sclass']==$row1['cid']){
$select="selected";
            }
         
            else{
$select="";
            }
        
             echo   "<option {$select} value='{$row1['cid']}'> {$row1['cclass']}</option>";
        }
          echo "</select>";
    }
          ?>
   
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $rows['sphone']; ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php  }
  }
     ?>
</div>
</div>
</body>
</html>
