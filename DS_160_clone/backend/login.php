<?php
include "db.php";  
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        die("Both email and password are required.");
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No user found with this email. 
              <a href='../LoginForm/register.html'>Click here to Register</a>";
    } else {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email']   = $user['email'];

            header("Location: ../LoginForm/dashboard_view.php");
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    }

    $stmt->close();
}
$conn->close();
?>
