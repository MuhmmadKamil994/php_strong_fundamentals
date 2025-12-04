<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../LoginPage/login.html");
    exit();
}

$full_name = $_SESSION['full_name'] ?? 'User';
$role      = $_SESSION['role'] ?? 'user'; // (if you add roles later)

// Fetch all users with their info
$sql = "SELECT u.id, u.full_name, u.email, u.created_at, 
               ui.username, ui.firstname, ui.lastname, ui.country, ui.city
        FROM users u
        LEFT JOIN user_information ui ON u.id = ui.user_id
        ORDER BY u.created_at DESC";

$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

$conn->close();

// Pass data to view
include "../LoginForm/dashboard_view.php";
