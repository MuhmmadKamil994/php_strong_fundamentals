<?php
session_start();

$conn = new mysqli("127.0.0.1:3307", "root", "", "user_registration");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, fullname, password FROM register WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $fullname, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['fullname'] = $fullname;
        header("Location: dashboard.php");
        exit;
    }
}
echo "<h3>Invalid credentials</h3><a href='login.html'>Try again</a>";
?>
