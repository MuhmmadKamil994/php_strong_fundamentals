<?php 
include 'header.php'; 
include "db.php";

if(isset($_POST['deletebtn'])){
    $stud_id = $_POST['sid'];

    if(!empty($stud_id)){
        $stmt = $conn->prepare("DELETE FROM student WHERE sid = ?");
        $stmt->bind_param("i", $stud_id);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Please enter a valid ID.</p>";
    }
}
?>

<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="number" name="sid" required />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</body>
</html>
