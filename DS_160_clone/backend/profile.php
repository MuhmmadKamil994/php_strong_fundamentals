<?php
include "../backend/db.php";
session_start();

$user_id = $_GET['id'] ?? $_SESSION['user_id'];

if (!$user_id) {
    header("Location: ../LoginForm/login.html");
    exit();
}

$sql = "SELECT u.full_name, u.email,
               ui.username, ui.firstname, ui.lastname, ui.country, ui.postalcode, ui.city
        FROM users u
        LEFT JOIN user_information ui ON u.id = ui.user_id
        WHERE u.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();

include "../LoginForm/profile_view.php";
