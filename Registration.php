<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Blood Donation System</title>
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
            
            max-width: 500px;
            margin: 50px auto;
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
<body class=".bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="http://localhost/Blood-Donation-System/">Blood Donation System</a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="Registration.php">Sign Up</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Sign Up</h3>
            </div>
            <div class="card-body">
                <form action="Registration.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <button type="submit" name="btnRegister" class="btn btn-primary">Sign Up</button>
                </form>
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
    if(isset($_POST['btnRegister']))
	{
		// echo "<script>alert('Registered Successfully.')</script>";
		$fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $blood_group = $_POST['blood_group'];

		$cnt = $obj->registerData($fullname, $email, $password, $blood_group);	
		// echo $cnt . " rows inserted";
        if($cnt > 0){
            // echo "<script>alert('Registered Successfully.')</script>";
            echo "<script>window.location.href='Login.php'</script>";
        }
	}
    
?>
