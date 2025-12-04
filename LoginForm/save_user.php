<?php
include("db.php");

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = "INSERT INTO students (username, password, role) VALUES ('$username', '$password', '$role')";
if ($conn->query($sql) === TRUE) {
    echo "User added successfully. <a href='dashboard.php'>Go back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
