<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Blood Donation System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <!-- <a class="navbar-brand" href="#">Admin Dashboard</a> -->
        <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="manage_users.php">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_events.php">Manage Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_reports.php">View Reports</a>
                </li>
                <!-- Add more links for additional functionalities -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Manage Users -->
    <div class="container mt-4">
        <h2>Manage Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Blood Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
            <?php
                include 'MyDb.php';
                $obj = new MyDb();
                $result = $obj->selectData();
                foreach($result as $row)
                {
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["full_name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["password"]."</td>
                        <td>".$row["blood_group"]."</td>
                    </tr>";
                }
                echo "</table>";
            ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
