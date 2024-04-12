<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blood Donation System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="http://localhost/Blood-Donation-System/">Blood Donation System</a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark font-weight-bold" aria-current="page" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="Registration.php">Sign Up</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
                <form action="Login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="card-footer">
                <p class="mb-0">Don't have an account? <a href="Registration.php">Sign Up</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    include "MyDb.php";
    $obj = new MyDb();

    if(isset($_POST['btnLogin']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query to check if the user exists
        $qry = "SELECT * FROM tblregistration WHERE email=?";
        $stmt = $obj->conn->prepare($qry);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Verify the password
            if(password_verify($password, $hashed_password)) {
                // Password is correct, login successful
                // Redirect the user to the dashboard or another page
                header("Location: Admin_Dashboard.php");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password";
            }
        } else {
            // User does not exist
            echo "User not found";
        }
    }
?>

