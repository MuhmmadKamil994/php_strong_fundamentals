<?php
// session_start();
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// ✅ Fetch logged-in user's email
$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$email = $user['email'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Add Profile Information</h2>

        <form action="savedata.php" method="post">
            <!-- Hidden User ID -->
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

            <label class="block mb-1 font-medium">Username</label>
            <input type="text" name="username" class="w-full border p-2 rounded mb-4" required>

            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded mb-4 bg-gray-100" 
                   value="<?= htmlspecialchars($email) ?>" readonly>

            <label class="block mb-1 font-medium">First Name</label>
            <input type="text" name="firstname" class="w-full border p-2 rounded mb-4" required>

            <label class="block mb-1 font-medium">Last Name</label>
            <input type="text" name="lastname" class="w-full border p-2 rounded mb-4" required>

            <label class="block mb-1 font-medium">Country</label>
            <input type="text" name="country" class="w-full border p-2 rounded mb-4">

            <label class="block mb-1 font-medium">Postal Code</label>
            <input type="text" name="postalcode" class="w-full border p-2 rounded mb-4">

            <label class="block mb-1 font-medium">City</label>
            <input type="text" name="city" class="w-full border p-2 rounded mb-4">

            <input type="submit" value="Save Profile" 
                   class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 cursor-pointer">
        </form>
    </div>
</body>
</html>
