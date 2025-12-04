<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Not logged in.";
    exit();
}

$userId = (int)$_SESSION['user_id'];

$formJson = json_encode($_POST, JSON_UNESCAPED_UNICODE);

$sel = $conn->prepare("SELECT id FROM applications WHERE user_id = ? AND is_submitted = 0 ORDER BY updated_at DESC LIMIT 1");
$sel->bind_param('i', $userId);
$sel->execute();
$res = $sel->get_result();

if ($res && $res->num_rows) {
    $r = $res->fetch_assoc();
    $appId = (int)$r['id'];

    $upd = $conn->prepare("UPDATE applications SET form_data = ?, current_step = ?, is_submitted = 1, updated_at = NOW() WHERE id = ?");
    $current_step = isset($_POST['current_step']) ? (int)$_POST['current_step'] : 0;
    $upd->bind_param('sii', $formJson, $current_step, $appId);
    if ($upd->execute()) {
        echo "Application submitted successfully";
        exit();
    } else {
        echo "Database error: " . $upd->error;
        exit();
    }
} else {
    $appCode = bin2hex(random_bytes(6));
    $ins = $conn->prepare("INSERT INTO applications (application_code, user_id, form_data, current_step, is_submitted) VALUES (?,?,?,?,1)");
    $current_step = isset($_POST['current_step']) ? (int)$_POST['current_step'] : 0;
    $ins->bind_param('sisi', $appCode, $userId, $formJson, $current_step);
    if ($ins->execute()) {
        echo "Application submitted successfully";
        exit();
    } else {
        echo "Database error: " . $ins->error;
        exit();
    }
}
