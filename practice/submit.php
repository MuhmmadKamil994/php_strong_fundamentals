<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'msg' => 'Not logged in']);
    exit();
}

$userId = (int)$_SESSION['user_id'];

// Get current step data from AJAX
$currentStep = $_POST['current_step'] ?? 0;
$stepData = $_POST['step_data'] ?? []; // send only current step fields
$stepName = $_POST['step_name'] ?? 'step-' . $currentStep;

// Find or create draft application
$sel = $conn->prepare("SELECT id, form_data FROM applications WHERE user_id = ? AND is_submitted = 0 ORDER BY updated_at DESC LIMIT 1");
$sel->bind_param('i', $userId);
$sel->execute();
$res = $sel->get_result();

if ($res && $res->num_rows) {
    $app = $res->fetch_assoc();
    $appId = (int)$app['id'];
    $formData = json_decode($app['form_data'], true) ?? [];

    // Merge current step
    $formData[$stepName] = $stepData;

    $upd = $conn->prepare("UPDATE applications SET form_data = ?, current_step = ?, updated_at = NOW() WHERE id = ?");
    $formJson = json_encode($formData, JSON_UNESCAPED_UNICODE);
    $upd->bind_param('sii', $formJson, $currentStep, $appId);
    if ($upd->execute()) {
        echo json_encode(['status' => 'success', 'msg' => 'Step saved', 'current_step' => $currentStep]);
    } else {
        echo json_encode(['status' => 'error', 'msg' => $upd->error]);
    }
} else {
    // Create new draft application
    $appCode = bin2hex(random_bytes(6));
    $formData = [$stepName => $stepData];
    $formJson = json_encode($formData, JSON_UNESCAPED_UNICODE);

    $ins = $conn->prepare("INSERT INTO applications (application_code, user_id, form_data, current_step, is_submitted) VALUES (?,?,?,?,0)");
    $ins->bind_param('sisi', $appCode, $userId, $formJson, $currentStep);
    if ($ins->execute()) {
        echo json_encode(['status' => 'success', 'msg' => 'Step saved', 'current_step' => $currentStep]);
    } else {
        echo json_encode(['status' => 'error', 'msg' => $ins->error]);
    }
}
?>

