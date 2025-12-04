<?php
// If opened directly, redirect to controller
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($full_name) || !isset($users) || !is_array($users)) {
    header("Location: ../backend/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Dropdown toggle
    function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("hidden");
    }
    // Close dropdown when clicking outside
    window.addEventListener("click", function(e) {
      if (!document.getElementById("dropdownWrapper").contains(e.target)) {
        document.getElementById("dropdownMenu").classList.add("hidden");
      }
    });
  </script>
</head>
<body class="bg-gray-50 min-h-screen">
  <div class="max-w-6xl mx-auto py-8 px-4">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-3xl font-bold text-gray-800">
        Welcome, <span class="text-indigo-600"><?php echo htmlspecialchars($full_name, ENT_QUOTES, 'UTF-8'); ?></span> 🎉
      </h1>
      <div class="flex items-center gap-4">
        
        <!-- Dropdown -->
        <div class="relative" id="dropdownWrapper">
          <button onclick="toggleDropdown()" 
                  class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-md flex items-center">
            Actions
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="dropdownMenu" 
               class="absolute right-0 mt-2 w-52 bg-white border rounded-lg shadow-lg hidden z-50">
            <a href="../backend/edit_profile.php" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a>
            <a href="../LoginForm/index.html" class="block px-4 py-2 hover:bg-gray-100">Apply for Visa</a>
          </div>
        </div>

        <!-- Logout -->
        <a href="../backend/logout.php" 
           class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md">
           Logout
        </a>
      </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">All Registered Users</h2>
      
      <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
          <thead>
            <tr class="bg-indigo-600 text-white text-sm">
              <th class="p-3 text-left">ID</th>
              <th class="p-3 text-left">Full Name</th>
              <th class="p-3 text-left">Email</th>
              <th class="p-3 text-left">Created</th>
              <th class="p-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="text-sm text-gray-700">
            <?php if (count($users) === 0): ?>
              <tr>
                <td class="p-4 text-center border-t" colspan="5">No users found.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($users as $row): ?>
                <tr class="hover:bg-gray-50 border-t">
                  <td class="p-3"><?php echo (int)$row['id']; ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['full_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3 text-center">
                    <a href="../backend/profile.php?id=<?php echo (int)$row['id']; ?>" 
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs shadow">
                       Edit
                    </a>
                    <a href="../backend/delete_user.php?id=<?php echo (int)$row['id']; ?>" 
                       onclick="return confirm('Are you sure you want to delete this user?')"
                       class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs shadow ml-2">
                       Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
