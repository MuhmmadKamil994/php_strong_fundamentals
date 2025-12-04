<?php
session_start();
include "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ✅ Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id'];

// ✅ Function to sanitize input
function clean_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// ✅ Retrieve and sanitize POST data
$username   = clean_input($_POST['username'] ?? '');
$firstname  = clean_input($_POST['firstname'] ?? '');
$lastname   = clean_input($_POST['lastname'] ?? '');
$country    = clean_input($_POST['country'] ?? '');
$postalcode = clean_input($_POST['postalcode'] ?? '');
$city       = clean_input($_POST['city'] ?? '');

// ✅ Validation
if (empty($username) || empty($firstname) || empty($lastname)) {
    die("Please fill in all required fields.");
}

// ✅ Check if user profile exists before updating
$check = $conn->prepare("SELECT id FROM user_information WHERE user_id = ?");
$check->bind_param("i", $user_id);
$check->execute();
$check->store_result();

if ($check->num_rows === 0) {
    die("No existing profile found. Please create one first.");
}
$check->close();

// ✅ Update existing record
$sql = "UPDATE user_information 
        SET username = ?, firstname = ?, lastname = ?, country = ?, postalcode = ?, city = ?
        WHERE user_id = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssssssi", $username, $firstname, $lastname, $country, $postalcode, $city, $user_id);

if ($stmt->execute()) {
    echo "<script>alert('Profile updated successfully.'); window.location.href='profile.php';</script>";
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
