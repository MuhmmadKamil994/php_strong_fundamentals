<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    Logged in as: <?php echo $_SESSION['username']; ?> |
    <a href="view_users.php">View Users</a> |
    <a href="logout.php">Logout</a>
</div>

<div class="sidebar">
    <h2>Admin</h2>
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Teachers</a></li>
        <li><a href="#">Parents</a></li>
        <li><a href="#">Students</a></li>
        <li><a href="add_user.php">Add User</a></li>
    </ul>
</div>

<div class="content">
    <h1>Welcome to School Admin Panel</h1>
</div>

</body>
</html>
