<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Registration</title>
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
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <span class="navbar-brand mb-0 h1">User Dashboard</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="User_Dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Donation_Registration.php">Donation Registration</a>
                </li>
                
                <!-- Add more links for additional functionalities -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <span class="navbar-text">Welcome, <?php echo $_SESSION['user_name']; ?></span>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <!-- <h2 class="text-center mb-4">Donation Registration</h2> -->
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" maxlength="10" required>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select class="form-control" id="blood_group" name="blood_group" required>
                    <option value="">Select</option>
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
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <button type="submit" name="btnDonate" class="btn btn-primary">Submit</button>
        </form>
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
    if(isset($_POST['btnDonate']))
	{
		// echo "<script>alert('Registered Successfully.')</script>";
		$name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $blood_group = $_POST['blood_group'];
        $city = $_POST['city'];

		$cnt = $obj->addDonation($name, $email, $phone, $blood_group,$city);	
		// echo $cnt . " rows inserted";
        if($cnt > 0){
            echo "<script>alert('Donation Register Successfully.')</script>";
        }
	}
?>