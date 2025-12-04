<?php
include "db.php";
$stmt = $conn->prepare("SELECT id, full_name, email, created_at FROM users ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User List</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gray-100">

  <main class="flex-1 p-6">
    
    <div class="bg-white rounded-xl shadow-lg p-6">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">All Registered Users</h2>
      
      <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
          <thead>
            <tr class="bg-indigo-600 text-white text-sm">
              <th class="p-3 text-left">ID</th>
              <th class="p-3 text-left">Full Name</th>
              <th class="p-3 text-left">Email</th>
              <th class="p-3 text-left">Created</th>
              <th class="p-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="text-sm text-gray-700">
            <?php if (count($users) === 0): ?>
              <tr>
                <td class="p-4 text-center border-t" colspan="5">No users found.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($users as $row): ?>
                <tr class="hover:bg-gray-50 border-t">
                  <td class="p-3"><?php echo (int)$row['id']; ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['full_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3"><?php echo htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="p-3 text-center">
                    <a href="profile.php?id=<?php echo (int)$row['id']; ?>" 
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs shadow">
                       Edit
                    </a>
                    <a href="delete_user.php?id=<?php echo (int)$row['id']; ?>" 
                       onclick="return confirm('Are you sure you want to delete this user?')"
                       class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs shadow ml-2">
                       Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>

</body>
</html>
