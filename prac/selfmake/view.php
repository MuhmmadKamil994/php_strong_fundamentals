<?php
include "db.php";

$stmt = $conn->prepare("SELECT id, username, email FROM student ORDER BY id DESC");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User List</title>

  <!-- ✅ Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #eef2f3, #8e9eab);
      min-height: 100vh;
      font-family: "Segoe UI", sans-serif;
    }
    .user-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 25px;
      margin-top: 40px;
    }
    .table th {
      background-color: #007bff;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-size: 14px;
    }
    .table-hover tbody tr:hover {
      background-color: #f9f9f9;
      transition: 0.3s;
    }
    .btn-custom {
      font-size: 13px;
      padding: 6px 12px;
      border-radius: 5px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      transform: translateY(-2px);
    }
    .search-box input {
      border-radius: 30px;
      padding: 8px 15px;
    }
    .title-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="user-card">
      <div class="title-bar mb-3">
        <h2 class="text-primary fw-semibold">All Registered Users</h2>
        <div class="search-box">
          <input type="text" id="searchInput" class="form-control" placeholder="Search users...">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody id="userTableBody">
            <?php if (count($students) === 0): ?>
              <tr>
                <td colspan="4" class="text-center text-muted py-3">No users found.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($students as $row): ?>
                <tr>
                  <td><?php echo (int)$row['id']; ?></td>
                  <td><?php echo htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                  <td class="text-center">
                    <a href="profile.php?id=<?php echo (int)$row['id']; ?>" 
                       class="btn btn-primary btn-sm btn-custom">Edit</a>
                    <a href="delete.php?id=<?php echo (int)$row['id']; ?>" 
                       onclick="return confirm('Are you sure you want to delete this user?')"
                       class="btn btn-danger btn-sm btn-custom">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
               <a href="delete1.php" 
                       class="btn btn-primary btn-sm btn-custom">Delete</a>
      </div>
    </div>
  </div>

  <!-- ✅ Bootstrap Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ✅ Simple JavaScript Search Filter -->
  <script>
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('userTableBody');
    searchInput.addEventListener('keyup', () => {
      const filter = searchInput.value.toLowerCase();
      const rows = tableBody.getElementsByTagName('tr');
      for (let i = 0; i < rows.length; i++) {
        const cols = rows[i].getElementsByTagName('td');
        let match = false;
        for (let j = 0; j < cols.length - 1; j++) {
          if (cols[j].textContent.toLowerCase().includes(filter)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? '' : 'none';
      }
    });
  </script>

</body>
</html>
