<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id   = $_SESSION['user_id'];
$full_name = $_SESSION['full_name'] ?? 'User';

$sql = "SELECT u.full_name, u.email,
               ui.username, ui.firstname, ui.lastname, ui.country, ui.postalcode, ui.city
        FROM users u
        LEFT JOIN user_information ui ON u.id = ui.user_id
        WHERE u.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
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
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Edit Profile</h2>
     <form class="post-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <form action="save_profile.php" method="post">
      <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
      <input type="hidden" name="action" value="edit">

      <label class="block mb-2 font-medium">Username</label>
      <input type="text" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Email</label>
      <input type="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" class="w-full border p-2 rounded mb-4 bg-gray-100" readonly>

      <label class="block mb-2 font-medium">First Name</label>
      <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Last Name</label>
      <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Country</label>
      <input type="text" name="country" value="<?= htmlspecialchars($user['country'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Postal Code</label>
      <input type="text" name="postalcode" value="<?= htmlspecialchars($user['postalcode'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">City</label>
      <input type="text" name="city" value="<?= htmlspecialchars($user['city'] ?? '') ?>" class="w-full border p-2 rounded mb-4">

      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Update Profile</button>
    </form>
  </div>
</body>
</html>
