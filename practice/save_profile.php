<?php
session_start();
include "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id   = $_POST['user_id'] ?? null;
$username  = $_POST['username'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname  = $_POST['lastname'] ?? '';
$country   = $_POST['country'] ?? '';
$postalcode= $_POST['postalcode'] ?? '';
$city      = $_POST['city'] ?? '';
$action    = $_POST['action'] ?? ''; 

if (!$user_id || !$action) {
    die("Invalid request: Missing user id or action.");
}
$stmt = $conn->prepare("SELECT id FROM user_information WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$hasProfile = $stmt->num_rows > 0;
$stmt->close();

if ($action === "add") {
    if ($hasProfile) {
        die("User profile already exists. Please edit instead.");
    }
    $stmt = $conn->prepare("INSERT INTO user_information 
        (user_id, username, firstname, lastname, country, postalcode, city)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $user_id, $username, $firstname, $lastname, $country, $postalcode, $city);
    $redirectMsg = "user_saved";
} elseif ($action === "edit") {
    if (!$hasProfile) {
        die("No profile found. Please add your profile first.");
    }
    $stmt = $conn->prepare("UPDATE user_information 
        SET username=?, firstname=?, lastname=?, country=?, postalcode=?, city=? 
        WHERE user_id=?");
    $stmt->bind_param("ssssssi", $username, $firstname, $lastname, $country, $postalcode, $city, $user_id);
    $redirectMsg = "user_updated";
} else {
    die("Invalid action.");
}

if ($stmt->execute()) {
    header("Location: dashboard.php?msg=$redirectMsg");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
