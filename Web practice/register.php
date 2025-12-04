<?php
$conn = new mysqli("127.0.0.1:3307", "root", "", "user_registration");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// ✅ Safely access form inputs
$fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// ✅ Check for required fields
if (empty($fullname) || empty($email) || empty($password)) {
    echo "All fields are required.";
    exit;
}

// ✅ Check for duplicate email
$stmt = $conn->prepare("SELECT id FROM register WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Email already registered. Try another.<br><a href='dashboard.php'>Back to Register</a>";
    exit;
}
$stmt->close();

// ✅ Insert new user
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO register (fullname, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fullname, $email, $hashed_password);
if ($stmt->execute()) {
    echo "User registered successfully.<br><a href='dashboard.php'>Back</a>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
