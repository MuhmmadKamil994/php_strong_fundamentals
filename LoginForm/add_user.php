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
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
    Logged in as: <?php echo $_SESSION['username']; ?>
</div>

<div class="form-box">
    <h2>Add New User</h2>
    <form action="save_user.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
            <option value="parent">Parent</option>
        </select><br>
        <button type="submit">Save User</button>
    </form>
</div>
</body>
</html>
