<?php
session_start();
include "db.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $username = trim($_POST['fullname'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role     = trim($_POST['role'] ?? '');

    // Validate
    if (empty($username) || empty($password) || empty($role)) {
        $error = "All fields are required.";
    } else {
        // Check if username already exists
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "User already exists. Please login instead.";
        } else {
            // Hash password
            $hash = password_hash($password, PASSWORD_BCRYPT);
            
            // Insert new user with current timestamp
            $stmt = $conn->prepare("INSERT INTO users (username, password, role, submit_at) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $username, $hash, $role);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                header("Location: login.php");
                exit();
            } else {
                $error = "Database error: " . $stmt->error;
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
            <input type="password" name="password" required
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-transparent"
                   placeholder="Enter Password">
            <label class="absolute left-4 top-2 text-gray-500 text-sm
                          peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400
                          peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-sm
                          peer-focus:text-blue-600 transition-all">
                Password
            </label>
        </div>

        <div class="relative">
            <select name="role" class="form-select form-select-sm w-full border border-gray-300 rounded-lg p-2" required>
                <option value="" selected disabled>Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Clerk">Clerk</option>
                <option value="HOD">HOD</option>
                <option value="VC">VC</option>
            </select>
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

