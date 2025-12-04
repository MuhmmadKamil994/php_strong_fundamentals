<?php
session_start();
include "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = "Both email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $error = "No user found with this username. <a href='register.php'>Register here</a>.";
        } else {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Incorrect password. Please try again.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <script src="css/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-4">
  <div class="w-full max-w-md bg-white shadow-2xl rounded-2xl p-8 relative">
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-white rounded-full shadow-xl p-4">
      <i class="bi bi-person-circle text-indigo-600 text-5xl"></i>
    </div>

    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8 mt-6 tracking-wide">
      Welcome Back
    </h2>

    <?php if(!empty($error)) : ?>
      <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="post" class="space-y-5">
      <div class="relative">
        <input type="text" name="username" required
          class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                 focus:ring-2 focus:ring-indigo-500 focus:outline-none placeholder-transparent"
          placeholder="Username">
        <label class="absolute left-4 top-2 text-gray-500 text-sm
                      peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                      peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                      peer-focus:text-indigo-600 transition-all">
          User Name
        </label>
      </div>

      <div class="relative">
        <input type="password" name="password" required
          class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                 focus:ring-2 focus:ring-indigo-500 focus:outline-none placeholder-transparent"
          placeholder="Enter Password">
        <label class="absolute left-4 top-2 text-gray-500 text-sm
                      peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                      peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                      peer-focus:text-indigo-600 transition-all">
          Password
        </label>
        <a href="forget.php" class="absolute right-4 top-3 text-sm text-indigo-500 hover:underline">
          Forgot?
        </a>
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-lg
               transition transform hover:scale-105 hover:shadow-2xl">
        Login
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Don’t have an account?
      <a href="register.php" class="text-indigo-600 hover:underline font-medium">Register here</a>
    </p>
  </div>
</body>
</html>
