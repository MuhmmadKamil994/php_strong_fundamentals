<?php
$conn = new mysqli("127.0.0.1:3307", "root", "", "user_registration");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle delete request
if (isset($_GET['delete'])) {
    $delete_id = (int) $_GET['delete'];
    $conn->query("DELETE FROM register WHERE id = $delete_id");
    header("Location: admin.php");
    exit;
}

// Handle search
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$sql = "SELECT * FROM register";
if (!empty($search)) {
    $sql .= " WHERE fullname LIKE '%$search%' OR email LIKE '%$search%'";
}
$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);
?>

<h2>All Registered Users</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Search by name or email" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>
<br>

<table border='1' cellpadding='10'>
    <tr>
        <th>ID</th><th>Full Name</th><th>Email</th><th>Actions</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="admin.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">No users found.</td></tr>
    <?php endif; ?>
</table>

<?php $conn->close(); ?>
