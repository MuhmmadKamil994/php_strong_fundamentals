
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gray-100">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-900 text-white flex flex-col">
    <div class="p-4 text-2xl font-bold border-b border-gray-700">
      Admin Panel
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <a href="dashboard.php?page=profile" 
         class="block px-4 py-2 rounded hover:bg-gray-700">
        ➕ Add User 
      </a>
      <a href="dashboard.php?page=userlist" 
         class="block px-4 py-2 rounded hover:bg-gray-700">
        👥 User List
      </a>
    </nav>
  </aside>
  

</body>
</html>
