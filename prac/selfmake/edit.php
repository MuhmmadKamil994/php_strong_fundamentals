<?php
include "db.php";

// Make sure an ID is provided
$stud_id = $_POST['sid'] ?? null;
if(!$stud_id){
    die("No student ID provided.");
}

if(isset($_POST['updatebtn'])){
    // Sanitize input
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $cpassword = $_POST['cpassword'] ?? '';

    // Validation
    if(empty($username) || empty($email)){
        echo "Username and Email are required.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format.";
    } elseif(!empty($password) && $password !== $cpassword){
        echo "Passwords do not match.";
    } else {
        // Build SQL
        if(!empty($password)){
            // Hash the password if updating
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = $conn->prepare("UPDATE student SET username=?, email=?, password=? WHERE id=?");
            $sql->execute([$username, $email, $hashedPassword, $stud_id]);
        } else {
            // Update without changing password
            $sql = $conn->prepare("UPDATE student SET username=?, email=? WHERE id=?");
            $sql->execute([$username, $email, $stud_id]);
        }

        echo "Update successful!";
        $sql = null;
    }
}
?>
<form action="" method="post">
    <input type="hidden" name="sid" value="<?php echo $stud_id; ?>">
    Username: <input type="text" name="username" value=""><br><br>
    Email: <input type="email" name="email" value=""><br><br>
    Password: <input type="password" name="password" placeholder="Leave blank to keep"><br><br>
    Confirm Password: <input type="password" name="cpassword" placeholder="Leave blank to keep"><br><br>
    <input type="submit" name="updatebtn" value="Update">
</form>
