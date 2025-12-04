<?php
session_start();
include "db.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['fullname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $confirm   = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($full_name) || empty($email) || empty($password) || empty($confirm)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        // Check for existing email
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();
 
        if ($check->num_rows > 0) {
            $error = "Email already registered. Please login instead.";
        } else {
            // Hash password and insert
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email, $hash);

            if ($stmt->execute()) {
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['full_name'] = $full_name;
                $_SESSION['email'] = $email;

                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $check->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="css/bootstrap.bundle.min.js"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-4">

<div class="w-full max-w-md bg-white shadow-2xl rounded-2xl p-8 relative">

    <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-white rounded-full shadow-xl p-4">
        <i class="bi bi-person-plus-fill text-blue-600 text-5xl"></i>
    </div>

    <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-4 mt-6 tracking-wide">
        Create an Account
    </h2>

    <?php if(!empty($error)) : ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="post" class="space-y-5">

        <div class="relative">
            <input type="text" name="fullname" required
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-transparent"
                   placeholder="Full Name">
            <label class="absolute left-4 top-2 text-gray-500 text-sm
                          peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                          peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                          peer-focus:text-blue-600 transition-all">
                Full Name
            </label>
        </div>

        <div class="relative">
            <input type="email" name="email" required
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-transparent"
                   placeholder="Email">
            <label class="absolute left-4 top-2 text-gray-500 text-sm
                          peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                          peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                          peer-focus:text-blue-600 transition-all">
                Email
            </label>
        </div>

        <div class="relative">
            <input type="password" name="password" required
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-transparent"
                   placeholder="Password">
            <label class="absolute left-4 top-2 text-gray-500 text-sm
                          peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                          peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                          peer-focus:text-blue-600 transition-all">
                Password
            </label>
        </div>

        <div class="relative">
            <input type="password" name="confirm_password" required
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-transparent"
                   placeholder="Confirm Password">
            <label class="absolute left-4 top-2 text-gray-500 text-sm
                          peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                          peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                          peer-focus:text-blue-600 transition-all">
                Confirm Password
            </label>
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700
                       text-white font-semibold py-3 rounded-lg shadow-lg
                       transition transform hover:-translate-y-1 hover:shadow-2xl">
            Register
        </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
        Already have an account?
        <a href="login.php" class="text-blue-600 hover:underline font-medium">Login here</a>
    </p>
</div>

</body>
</html>
