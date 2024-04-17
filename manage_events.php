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
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
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
    </div>

    <div id="updateEventModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Event</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Update Event Form -->
                    <form id="updateEventForm" action="manage_events.php" method="POST">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="id" name="event_id_update" >     
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title_update">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date_update">
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location_update">
                        </div>
                        <button type="submit" name="btnUpdateEvent" class="btn btn-primary">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteEventModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Event</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Delete Event Form -->
                    <form id="deleteEventForm" action="manage_events.php" method="POST">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="id" name="event_id_delete" >     
                        </div>
                        <button type="submit" name="btnDeleteEvent" class="btn btn-danger">Delete Event</button>
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
        function openUpdateModal(eventId) {
            // Show the modal
            $("#updateEventModal").modal("show");
        }
        function openDeleteModal(eventId) {
            // Show the modal
            $("#deleteEventModal").modal("show");
        }
    </script>
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
    if(isset($_POST['btnUpdateEvent'])){
        $event_id = $_POST['event_id_update'];
        $title = $_POST['title_update'];
        $date = $_POST['date_update'];
        $location = $_POST['location_update'];

        $cnt = $obj->updateEvent($title,$date,$location,$event_id);
        if($cnt > 0){
            echo "<script>alert('Event Updated Successfully.')</script>";
        }
    }

    if(isset($_POST['btnDeleteEvent'])){
        $event_id = $_POST['event_id_delete'];
        $cnt = $obj->deleteEvent($event_id);
        if($cnt > 0){
            echo "<script>alert('Event Deleted Successfully.')</script>";
        }
    }
    
    echo "<div class='container mt-4'>";
        echo "<table class='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Title</th>";
                echo "<th>Date</th>";
                echo "<th>Location</th>";
                echo "<th>Action</th>";
            echo "</tr>"; 
        echo "</thead>";
        echo "<tbody>";
            $result = $obj->selectEvent();
            foreach($result as $row)
            {
                echo "<tr>
                    <td>".$row["event_id"]."</td>
                    <td>".$row["title"]."</td>
                    <td>".$row["date"]."</td>
                    <td>".$row["location"]."</td>
                    <td>
                        <button type='button' class='btn btn-sm btn-primary' onclick='openUpdateModal(".$row["event_id"].")'>Update</button>

                        <button type='button' class='btn btn-sm btn-danger' 
                        onclick='openDeleteModal(".$row["event_id"].")'>Delete</button>
                    </td>
                </tr>";
            }
        echo "</tbody>";
        echo "</table>";
    echo "</div>";
?>  
