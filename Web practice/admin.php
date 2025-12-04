<?php
// Connect to MySQL
$conn = new mysqli("127.0.0.1:3307", "root", "", "user_registration");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all users
$sql = "SELECT id, fullname, email FROM register ORDER BY id ASC";
$result = $conn->query($sql);

// Output
echo "<h2>All Registered Users</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Full Name</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}
$conn->close();
?>
