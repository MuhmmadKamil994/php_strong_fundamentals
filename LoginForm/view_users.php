<?php
include("db.php");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
    <h2>Admin</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#">Teachers</a></li>
        <li><a href="#">Parents</a></li>
        <li><a href="#">Students</a></li>
        <li><a href="add_user.php">Add User</a></li>
        <li><a href="view_users.php">View Users</a></li>
    </ul>
</div>

<div class="content">
    <h1>Registered Users</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['role']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
