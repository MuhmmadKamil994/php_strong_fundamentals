<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    exit();
}

$full_name = $_SESSION['full_name'] ?? 'User';
$role      = $_SESSION['role'] ?? 'user';

$sql = "SELECT id, full_name, email, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);

$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>User Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <script>
    function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("hidden");
    }
    window.addEventListener("click", function(e) {
      if (!document.getElementById("dropdownWrapper").contains(e.target)) {
        document.getElementById("dropdownMenu").classList.add("hidden");
      }
    });
  </script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  <div class="flex flex-1 min-h-screen">
    <?php include "sidebar.php"; ?>

    <main class="flex-1 flex flex-col p-6 bg-gray-50">
      
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
          Welcome, <span class="text-indigo-600">
            <?php echo htmlspecialchars($full_name, ENT_QUOTES, 'UTF-8'); ?>
          </span> 🎉
        </h1>

        <div class="flex flex-wrap items-center gap-3">
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
  <a href="edit.php" class="block px-4 py-2 hover:bg-gray-100">
    Edit Profile
  </a>
  <a href="ds_form/index.php" class="block px-4 py-2 hover:bg-gray-100">Apply for Visa</a>
</div>

          </div> 

          <a href="logout.php" 
             class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md">
             Logout
          </a>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-lg p-6 flex-1 overflow-auto">
        <?php
          $page = $_GET['page'] ?? 'home';
          if ($page === "userlist") {
              include "userlist.php";
          } elseif ($page === "profile") {
              include "profile.php";
          } 
        ?>
      </div>

    </main>
  </div>

</body>
</html>
