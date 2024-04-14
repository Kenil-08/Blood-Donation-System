<?php
    include 'MyDb.php';
    $obj = new MyDb();
?>

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
                    <a class="nav-link active" href="Admin_Dashboard.php">Manage Users</a>
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
    
    <!-- Delete Modal -->
    <div id="deleteUserModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Update Event Form -->
                    <form id="deleteUserForm" action="Admin_Dashboard.php" method="POST">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="id" name="id_delete" >     
                        </div>
                        <button type="submit" name="btnDeleteUser" class="btn btn-danger">Delete User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function openDeleteModal(Id) {
            // Show the modal
            $("#deleteUserModal").modal("show");
        }
    </script>
</body>
</html>

<?php
    if(isset($_POST['btnDeleteUser']))
    {
        $id = $_POST['id_delete'];
        $cnt = $obj->deleteUser($id);
        if($cnt > 0){
            echo "<script>alert('User Deleted Successfully.')</script>";
        }
    }

    echo "<div class='container mt-4'>";
        echo "<table class='table'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Password</th>";
                    echo "<th>Blood Type</th>";
                    echo "<th>Actions</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                $result = $obj->selectData();
                foreach($result as $row)
                {
                    
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["full_name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["password"]."</td>
                        <td>".$row["blood_group"]."</td>
                        <td>
                            <button type='button' class='btn btn-sm btn-danger' onclick='openDeleteModal(".$row["id"].")'>Delete</button>
                        </td>
                    </tr>";
                }
            echo "</tbody>";
        echo "</table>";
    echo "</div>";
?>
