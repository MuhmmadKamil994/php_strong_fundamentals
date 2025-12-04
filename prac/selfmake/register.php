<?php
include "db.php";

if(isset($_POST['submitform'])){
    // Sanitize inputs
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $cpassword = $_POST['cpassword'] ?? '';

    // Basic validation
    if(empty($username) || empty($email) || empty($password) || empty($cpassword)){
        echo "All fields are required.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format.";
    } elseif($password !== $cpassword){
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql = $conn->prepare("INSERT INTO student(username, email, password) VALUES (?, ?, ?)");
        $sql->execute([$username, $email, $hashedPassword]);
        $sql = null;

        echo "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <form action="" method="post">
        Username: <input type="text" name="username"><br><br>
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        Confirm Password: <input type="password" name="cpassword"><br><br>
        <input type="submit" name="submitform" value="Submit">
    </form>
</body>
</html>
