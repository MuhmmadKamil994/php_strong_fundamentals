<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
  <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">User Information</h2>

    <form action="../backend/save_profile.php" method="post">
      <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_GET['id'] ?? $_SESSION['user_id']); ?>">

      <label class="block mb-2 font-medium">Username</label>
      <input type="text" name="username" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Email</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="w-full border p-2 rounded mb-4" readonly>

      <label class="block mb-2 font-medium">First Name</label>
      <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Last Name</label>
      <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Country</label>
      <input type="text" name="country" value="<?php echo htmlspecialchars($user['country'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">Postal Code</label>
      <input type="text" name="postalcode" value="<?php echo htmlspecialchars($user['postalcode'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <label class="block mb-2 font-medium">City</label>
      <input type="text" name="city" value="<?php echo htmlspecialchars($user['city'] ?? ''); ?>" class="w-full border p-2 rounded mb-4">

      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">Save</button>
    </form>
  </div>
</body>
</html>
