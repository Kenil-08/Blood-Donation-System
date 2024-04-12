<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Blood Donation System</title>
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .jumbotron {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/Blood-Donation-System/">Blood Donation System</a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registration.php">Sign Up</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
     <!-- Main Content -->
     <div class="jumbotron text-center">
        <h1>Welcome to the Blood Donation System</h1>
        <p>Donate Blood, Save Lives</p>
        <a href="Login.php" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Why Donate Blood?</h2>
                <p>Donating blood is a noble cause that can help save lives. Every few seconds, someone, somewhere needs blood. By donating blood, you can make a difference and help those in need.</p>
            </div>
            <div class="col-md-6">
                <h2>How to Donate?</h2>
                <p>Donating blood is easy and safe. You can visit any blood donation center or participate in blood drives organized by various organizations. Before donating, make sure you meet the eligibility criteria.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <p>Have a question or need assistance? Contact us:</p>
                <p>Email: info@blooddonationsystem.com</p>
                <p>Phone: 011-23711551</p>
            </div>
            <div class="col-md-6">
                <h2>Upcoming Events</h2>
                <p>Join us at our next blood drive event:</p>
                <ul>
                    <li>May 5th, 2024 - Community Blood Drive - 10:00 AM to 4:00 PM</li>
                    <li>June 15th, 2024 - Blood Donation Awareness Campaign - 9:00 AM to 5:00 PM</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>