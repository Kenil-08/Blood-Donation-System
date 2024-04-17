<?php
    include 'MyDb.php';
    $obj = new MyDb();

    // Fetch event records from the database
    $events = $obj->selectEvent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation System - Events</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles go here */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .event-card {
            margin-bottom: 20px;
        }
        .event-card {
            margin-bottom: 20px;
            transition: transform 0.5s ease;
        }

        .event-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
                    <a class="nav-link active" href="User_Dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Donation_Registration.php">Donation Registration</a>
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
    <div class="container mt-4">
        <h2>Upcoming Events</h2>
        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $event['title']; ?></h5>
                            <p class="card-text">Date: <?php echo $event['date']; ?></p>
                            <p class="card-text">Location: <?php echo $event['location']; ?></p>
                            <!-- You can add more details about the event if needed -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
