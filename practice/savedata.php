<?php
session_start();
include "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id'];

// ✅ Sanitize & validate POST data
function clean_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$username   = clean_input($_POST['username'] ?? '');
$firstname  = clean_input($_POST['firstname'] ?? '');
$lastname   = clean_input($_POST['lastname'] ?? '');
$country    = clean_input($_POST['country'] ?? '');
$postalcode = clean_input($_POST['postalcode'] ?? '');
$city       = clean_input($_POST['city'] ?? '');

// ✅ Validation
if (empty($username) || empty($firstname) || empty($lastname)) {
    die("Username, First name, and Last name are required.");
}
if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
    die("Invalid username format.");
}
if (!preg_match("/^[a-zA-Z\s]+$/", $firstname) || !preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
    die("Names should contain only letters.");
}

$stmt = $conn->prepare("SELECT id FROM user_information WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "<div style='max-width:600px;margin:50px auto;padding:20px;background:#ffecec;color:#cc0000;
            border:1px solid #cc0000;border-radius:8px;font-family:Arial;'>
            <h3>User profile already exists.</h3>
            <p>Please use <a href='edit.php' style='color:#0066cc;'>Edit Profile</a> instead.</p>
          </div>";
    $stmt->close();
    $conn->close();
    exit(); 
}

$stmt = $conn->prepare("INSERT INTO user_information 
    (user_id, username, firstname, lastname, country, postalcode, city)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $user_id, $username, $firstname, $lastname, $country, $postalcode, $city);

if ($stmt->execute()) {
    header("Location: dashboard.php?msg=user_saved");
    exit();
} else {
    echo "Database error: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
?>
