<?php
include 'db.php';

// Get the user ID (usually passed via GET)
$id = $_GET['id'] ?? 0;

// Initialize variables
$username = '';
$email = '';

// Fetch current data to pre-fill the form
if ($id > 0) {
    $stmt = $conn->prepare("SELECT username, email FROM student WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $username = $user['username'];
        $email = $user['email'];
    }
}

// Handle form submission
if (isset($_POST['update'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($id > 0) {
        $stmt = $conn->prepare("UPDATE student SET username = ?, email = ? WHERE id = ?");
        $stmt->execute([$username, $email, $id]);
        echo "User updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
