<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("127.0.0.1:3307", "root", "", "user_registration");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$created_by = $_SESSION['user_id'];

// Prevent duplicate email
$stmt = $conn->prepare("SELECT id FROM register WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<h3>Email already exists</h3><a href='dashboard.php'>Back</a>";
    exit;
}
$stmt->close();

// Add user
$stmt = $conn->prepare("INSERT INTO register (fullname, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fullname, $email, $password);
if ($stmt->execute()) {
    echo "<h3>User added successfully</h3><a href='dashboard.php'>Add Another</a>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
