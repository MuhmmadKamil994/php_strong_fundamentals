<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial;
      padding: 20px;
      background: #f7f7f7;
    }
    form {
      max-width: 400px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <h2>Welcome, <?php echo $_SESSION['fullname']; ?>!</h2>
  <p>You can register a new user below.</p>

  <form action="add_user.php" method="POST">
    <input type="text" name="fullname" placeholder="Full Name" required />
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required minlength="6" />
    <input type="submit" value="Add User" />
  </form>

  <p><a href="logout.php">Logout</a></p>

</body>
</html>
