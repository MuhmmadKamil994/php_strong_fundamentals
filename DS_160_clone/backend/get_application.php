<?php
include "db.php";
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['status'=>'error','message'=>'Not logged in']);
    exit();
}

$userId = (int)$_SESSION['user_id'];

$sel = $conn->prepare("SELECT id, application_code, form_data, current_step, is_submitted, updated_at FROM applications WHERE user_id = ? AND is_submitted = 0 ORDER BY updated_at DESC LIMIT 1");
$sel->bind_param('i', $userId);
$sel->execute();
$res = $sel->get_result();

if ($res && $res->num_rows) {
    $row = $res->fetch_assoc();
    echo json_encode(['status'=>'ok','data'=>$row]);
} else {
    echo json_encode(['status'=>'ok','data'=>null]);
}
