<?php
include "db.php";
session_start();

$full_name = trim($_POST['fullname'] ?? '');
$email     = trim($_POST['email'] ?? '');
$password  = $_POST['password'] ?? '';
$confirm   = $_POST['confirm_password'] ?? '';

if (empty($full_name) || empty($email) || empty($password)) {
    die("All fields are required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

if ($password !== $confirm) {
    die("Passwords do not match.");
}

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    die("Email already registered. Please login instead.");
}
$check->close();

$hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $full_name, $email, $hash);

if ($stmt->execute()) {
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['email'] = $email;

    header("Location: ../LoginForm/login.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
