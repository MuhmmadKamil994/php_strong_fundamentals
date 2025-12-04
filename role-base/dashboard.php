<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
 <script src="css/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-gray-100">

<!-- Sidebar -->
<aside class="w-64 h-screen bg-white shadow-lg fixed">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        <nav>
            <ul class="space-y-3">
                <?php if($role === 'Admin'): ?>
                    <li><a href="#" class="hover:text-blue-500">Manage Users</a></li>
                    <li><a href="#" class="hover:text-blue-500">System Settings</a></li>
                    <li><a href="#" class="hover:text-blue-500">Audit Logs</a></li>
                <?php elseif($role === 'Clerk'): ?>
                    <li><a href="#" class="hover:text-blue-500">Process Requests</a></li>
                    <li><a href="#" class="hover:text-blue-500">Manage Records</a></li>
                    <li><a href="#" class="hover:text-blue-500">Generate Reports</a></li>
                <?php elseif($role === 'VC'): ?>
                    <li><a href="#" class="hover:text-blue-500">Overview Departments</a></li>
                    <li><a href="#" class="hover:text-blue-500">Approve Budgets</a></li>
                    <li><a href="#" class="hover:text-blue-500">Key Metrics</a></li>
                <?php elseif($role === 'HOD'): ?>
                    <li><a href="#" class="hover:text-blue-500">Manage Staff</a></li>
                    <li><a href="#" class="hover:text-blue-500">Track Performance</a></li>
                    <li><a href="#" class="hover:text-blue-500">Approve Leaves</a></li>
                <?php endif; ?>
                <li><a href="logout.php" class="hover:text-red-500">Logout</a></li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 p-6">
    <h2 class="text-2xl font-bold mb-4">Welcome, <?php echo $_SESSION['username']; ?> (<?php echo $role; ?>)</h2>
    <p>This is your dashboard. Use the menu on the left to navigate your tasks.</p>
</main>

</body>
</html>
