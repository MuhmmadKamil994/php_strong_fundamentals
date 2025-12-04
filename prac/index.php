<?php
include 'header.php';
include 'db.php';
?>
<div id="main-content">
    <h2>All Records</h2>
   <?php
$sql ="select *from student join studendclass where student.sclass=studendclass.cid ";
$result=mysqli_query($conn,$sql) or die("query have error");
 if(mysqli_num_rows($result)>0){

?> 
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php while($rows =mysqli_fetch_assoc($result)) {    
           ?>
            <tr>
                <td><?php echo $rows['sid'] ;?></td>
                <td><?php echo $rows['sname']; ?></td>
                <td><?php echo $rows['saddress'] ;?></td>
                <td><?php echo $rows['cclass']; ?></td>
                <td><?php echo $rows['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $rows['sid'] ;?>'>Edit</a>
                    <a href='delete_inline.php?id=<?php echo $rows['sid'] ;?>'>Delete</a>
                </td>
            </tr>
           <?php  }?>
        </tbody>
    </table>
    <?php }
    else{
        "<h2>No record found</h2>";
    }
    mysqli_close($conn);
     ?>
</div>
</div>
</body>
</html>
