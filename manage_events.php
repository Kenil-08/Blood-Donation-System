<?php
    include 'MyDb.php';
    $obj = new MyDb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events - Blood Donation System</title>
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
                    <a class="nav-link " href="Admin_Dashboard.php">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="manage_events.php">Manage Events</a>
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
    <div class="container mt-4">
        <h2>Manage Events</h2>
        <!-- Event Creation Form -->
        <form action="manage_events.php" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
            <button type="submit" name="btnCreateEvent" class="btn btn-primary">Create Event</button>
        </form>

        <hr>

        <!-- Event Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody id="eventTableBody">
                <?php
                    $result = $obj->selectEvent();
                    foreach($result as $row)
                    {
                        echo "<tr>
                            <td>".$row["event_id"]."</td>
                            <td>".$row["title"]."</td>
                            <td>".$row["date"]."</td>
                            <td>".$row["location"]."</td>
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

<?php
    if(isset($_POST['btnCreateEvent'])){
        $title = $_POST['title'];
        $date = $_POST['date'];
        $location = $_POST['location'];

        $cnt = $obj->addEvent($title,$date,$location);
        if($cnt > 0){
            echo "<script>alert('Event Created Successfully.')</script>";
        }
    }
?>
