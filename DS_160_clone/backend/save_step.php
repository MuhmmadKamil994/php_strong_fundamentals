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

$raw = $_POST; 
$step = isset($_POST['step']) ? (int)$_POST['step'] : (isset($_GET['step']) ? (int)$_GET['step'] : null);
$form_json = isset($_POST['form_json']) ? $_POST['form_json'] : null;

if (!$form_json && isset($_POST['form']) && is_array($_POST['form'])) {
    $form_json = json_encode($_POST['form'], JSON_UNESCAPED_UNICODE);
}

if (!$form_json && strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
    $payload = file_get_contents('php://input');
    $pj = json_decode($payload, true);
    if ($pj) {
        $form_json = json_encode($pj['form'] ?? $pj, JSON_UNESCAPED_UNICODE);
        $step = $pj['step'] ?? $step;
    }
}

if (!$form_json) {
    echo json_encode(['status'=>'error','message'=>'No form data provided']);
    exit();
}

$sel = $conn->prepare("SELECT id FROM applications WHERE user_id = ? AND is_submitted = 0 ORDER BY updated_at DESC LIMIT 1");
$sel->bind_param('i', $userId);
$sel->execute();
$res = $sel->get_result();

$appId = null;
if ($res && $res->num_rows) {
    $r = $res->fetch_assoc();
    $appId = (int)$r['id'];

    $upd = $conn->prepare("UPDATE applications SET form_data = ?, current_step = ?, updated_at = NOW() WHERE id = ?");
    $upd->bind_param('sii', $form_json, $step, $appId);
    if ($upd->execute()) {
        echo json_encode(['status'=>'ok','message'=>'Draft updated','application_id'=>$appId]);
        exit();
    } else {
        http_response_code(500);
        echo json_encode(['status'=>'error','message'=>'DB update failed']);
        exit();
    }
} else {
    $appCode = bin2hex(random_bytes(6)); 
    $ins = $conn->prepare("INSERT INTO applications (application_code, user_id, form_data, current_step) VALUES (?,?,?,?)");
    $ins->bind_param('sisi', $appCode, $userId, $form_json, $step);
    if ($ins->execute()) {
        $newId = $ins->insert_id;
        $_SESSION['application_id'] = $newId;
        echo json_encode(['status'=>'ok','message'=>'Draft created','application_id'=>$newId,'application_code'=>$appCode]);
        exit();
    } else {
        http_response_code(500);
        echo json_encode(['status'=>'error','message'=>'DB insert failed']);
        exit();
    }
}
