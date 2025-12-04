<?php
include "db.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.html");
    exit();
}
$delete_id = $_GET['id'] ?? null;

if ($delete_id) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
}
header("Location: dashboard.php");
exit();
