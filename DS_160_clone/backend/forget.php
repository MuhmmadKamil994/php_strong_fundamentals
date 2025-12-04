<?php
include "db.php";
session_start();
date_default_timezone_set("Asia/Karachi");

$showForgotForm = true; 
$resetForm      = "";   


if (isset($_POST['request_reset'])) {
    $email = trim($_POST['email'] ?? '');

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token  = bin2hex(random_bytes(16));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $update = $conn->prepare("UPDATE users SET reset_token=?, reset_expiry=? WHERE email=?");
        $update->bind_param("sss", $token, $expiry, $email);
        $update->execute();

        $msg = "<div class='p-4 mb-4 text-green-700 bg-green-100 rounded-lg shadow'>  
                   Reset link generated:<br>
                   <a class='text-blue-600 underline' href='forget.php?reset_token=$token'>
                   http://localhost/DS_160_clone/backend/forget.php?reset_token=$token
                   </a>
               </div>";
    } else {
        $msg = "<div class='p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow'>  
                   No user found with that email.  
               </div>";
    }
}

if (isset($_GET['reset_token'])) {
    $token = $_GET['reset_token'];

    $stmt = $conn->prepare("SELECT id, reset_expiry FROM users WHERE reset_token=?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        if (strtotime($row['reset_expiry']) > time()) {
            $showForgotForm = false; 
            $resetForm = "
                <div class='bg-white p-8 rounded-2xl shadow-md w-full max-w-md'>
                    <h2 class='text-2xl font-bold mb-6 text-gray-800 text-center'>Reset Your Password</h2>
                    <form method='POST' class='space-y-4'>
                        <input type='hidden' name='token' value='$token'>
                        
                        <div>
                            <label class='block text-sm font-medium text-gray-600'>New Password</label>
                            <input type='password' name='new_password' required
                                   class='mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none'>
                        </div>
                        <div>
                            <label class='block text-sm font-medium text-gray-600'>Confirm Password</label>
                            <input type='password' name='confirm_password' required
                                   class='mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none'>
                        </div>
                        
                        <button type='submit' name='update_password'
                                class='w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition'>
                            Update Password
                        </button>
                    </form>
                </div>";
        } else {
            $msg = "<div class='p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow'>  
                       Token expired at: {$row['reset_expiry']}  
                    </div>";
        }
    } else {
        $msg = "<div class='p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow'>  
                   Invalid reset link.  
                </div>";
    }
}

if (isset($_POST['update_password'])) {
    $token   = $_POST['token'];
    $newPass = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($newPass === $confirm) {
        $hash = password_hash($newPass, PASSWORD_BCRYPT);

        $update = $conn->prepare("UPDATE users SET password=?, reset_token=NULL, reset_expiry=NULL WHERE reset_token=?");
        $update->bind_param("ss", $hash, $token);

        if ($update->execute()) {
            header("Location: ../LoginForm/login.html");
    exit();
        } else {
            $msg = "<div class='p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow'>  
                        Error updating password.  
                    </div>";
        }
    } else {
        $msg = "<div class='p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow'>  
                   Passwords do not match.  
                </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md">
    <?php if (!empty($msg)) echo $msg; ?>

    <?php if ($showForgotForm): ?>
    <div class="bg-white p-8 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Forgot Password</h2>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" required
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit" name="request_reset"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Send Reset Link
            </button>
        </form>
    </div>
    <?php endif; ?>

    <?php if (!empty($resetForm)) echo $resetForm; ?>
  </div>

</body>
</html>
