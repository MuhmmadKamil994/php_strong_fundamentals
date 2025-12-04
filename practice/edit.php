<?php
session_start();
include "db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

function clean_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// If user is not logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user = [];
$show_form = false;

// STEP 1: When the user enters ID and clicks "Show"
if (isset($_POST['showbtn'])) {
    $userid = clean_input($_POST['userid'] ?? '');
    
    if (empty($userid) || !is_numeric($userid)) {
        echo "Please enter a valid numeric ID.";
    }

    $stmt = $conn->prepare("SELECT u.email, ui.username, ui.firstname, ui.lastname, ui.country, ui.postalcode, ui.city 
                            FROM users u 
                            LEFT JOIN user_information ui ON u.id = ui.user_id
                            WHERE u.id = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $show_form = true;
        $_SESSION['edit_user_id'] = $userid;
    } else {
        echo "<p style='color:red;'>No record found for ID: " . htmlspecialchars($userid) . "</p>";
    }

    $stmt->close();
}

// STEP 2: When updating the record
if (isset($_POST['updatebtn'])) {
    $user_id = $_SESSION['edit_user_id'] ?? null;

    if (!$user_id) {
        die("No user selected for update.");
    }

    $username   = clean_input($_POST['username'] ?? '');
    $firstname  = clean_input($_POST['firstname'] ?? '');
    $lastname   = clean_input($_POST['lastname'] ?? '');
    $country    = clean_input($_POST['country'] ?? '');
    $postalcode = clean_input($_POST['postalcode'] ?? '');
    $city       = clean_input($_POST['city'] ?? '');

    // Validation
    if (empty($username) || empty($firstname) || empty($lastname)) {
        die("Username, First name, and Last name are required.");
    }
    if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
        die("Invalid username format.");
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $firstname) || !preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
        die("Names should contain only letters.");
    }

    $stmt = $conn->prepare("UPDATE user_information 
        SET username=?, firstname=?, lastname=?, country=?, postalcode=?, city=? 
        WHERE user_id=?");
    $stmt->bind_param("ssssssi", $username, $firstname, $lastname, $country, $postalcode, $city, $user_id);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Profile updated successfully!</p>";
    } else {
        echo "<p style='color:red;'>Database error: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Record</h2>

    <!-- Step 1: Enter ID -->
    <form class="mb-6" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="form-group mb-4">
            <label class="block mb-2 font-medium">User ID</label>
            <input type="text" name="userid" class="w-full border p-2 rounded" placeholder="Enter user ID to edit">
        </div>
        <input class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700" type="submit" name="showbtn" value="Show">
    </form>

    <!-- Step 2: Show Update Form -->
    <?php if ($show_form): ?>
        <form action="dashboard.php" method="post">
            <label>Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <label>Email</label>
            <input type="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" class="w-full border p-2 rounded mb-4 bg-gray-100" readonly>

            <label>First Name</label>
            <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <label>Last Name</label>
            <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <label>Country</label>
            <input type="text" name="country" value="<?= htmlspecialchars($user['country'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <label>Postal Code</label>
            <input type="text" name="postalcode" value="<?= htmlspecialchars($user['postalcode'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <label>City</label>
            <input type="text" name="city" value="<?= htmlspecialchars($user['city'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

            <button type="submit" name="updatebtn" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                Update Profile
            </button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
