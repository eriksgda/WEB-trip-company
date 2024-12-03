<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/logout.css">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/view.css">
    <link rel="stylesheet" href="../../styles/asidebar.css">
    <title>Trip Management - View</title>
</head>
<body>
    <?php 
    require "../../global/asidebar.php";
    require "../../database/database_connection.php";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("<strong> Connection failure: </strong>" . $connection->connect_error);
    }

    $userId = $_SESSION["id"];
    $sqlTrips = "SELECT * FROM trips WHERE user_id = '$userId'";

    echo "<div class='container'>";
    echo "<br>";

    if ($resultTrips = $connection->query($sqlTrips)) {
        if ($resultTrips->num_rows >= 1) {
            while ($trip = $resultTrips->fetch_assoc()) {
                $tripId = $trip['id'];
                $tripName = $trip['name'];
                $tripDescription = $trip['description'];
                $startDate = date('d/m/Y', strtotime($trip['starts_at']));
                $endDate = date('d/m/Y', strtotime($trip['ends_at']));

                echo "<div class='trip-participants'>";
                echo "<div class='trip-table'>";
                echo "<h1>$tripName 
                        <a href='?function=UPDATE&type=TRIP&id=$tripId' class='action-link'>[UPDATE]</a> | 
                        <a href='?function=DELETE&type=TRIP&id=$tripId' class='action-link'>[DELETE]</a>
                    </h1>";
                echo "<table border='1'>";
                echo "<tr><td><strong>DATE (STARTS-ENDS):</strong></td><td>$startDate - $endDate</td></tr>";
                echo "<tr><td><strong>DESCRIPTION:</strong></td><td>$tripDescription</td></tr>";

                echo "<tr><td><strong>LOCALS:</strong></td><td>";
                $sqlLocations = "SELECT * FROM locations WHERE trip_id = '$tripId'";
                if ($resultLocations = $connection->query($sqlLocations)) {
                    while ($location = $resultLocations->fetch_assoc()) {
                        $locationId = $location['id'];
                        $locationName = $location['name'];
                        $occursAt = date('d/m/Y', strtotime($location['occurs_at']));

                        echo "$locationName - $occursAt ";
                        echo "<a href='?function=UPDATE&type=LOCAL&id=$locationId' class='action-link'>[UPDATE]</a> ";
                        echo "<a href='?function=DELETE&type=LOCAL&id=$locationId' class='action-link'>[DELETE]</a><br>";
                    }
                }
                echo "<a href='?function=ADD&type=LOCAL&id=$tripId' class='action-link'>[ADD LOCAL]</a>";
                echo "</td></tr>";
                echo "</table>";
                echo "</div>";

                echo "<div class='participants-table'>";
                echo "<h2>PARTICIPANTS:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>NAME</th><th>E-MAIL</th></tr>";

                $sqlParticipants = "SELECT * FROM participants WHERE trip_id = '$tripId'";
                if ($resultParticipants = $connection->query($sqlParticipants)) {
                    while ($participant = $resultParticipants->fetch_assoc()) {
                        $participantId = $participant['id'];
                        $participantName = $participant['name'];
                        $participantEmail = $participant['email'];

                        echo "<tr>";
                        echo "<td>$participantName 
                                <a href='?function=UPDATE&type=PARTICIPANT&id=$participantId' class='action-link'>[UPDATE]</a> 
                                <a href='?function=DELETE&type=PARTICIPANT&id=$participantId' class='action-link'>[DELETE]</a>
                            </td>";
                        echo "<td>$participantEmail</td>";
                        echo "</tr>";
                    }
                }
                echo "<tr><td colspan='2'><a href='?function=ADD&type=PARTICIPANT&id=$tripId' class='action-link'>[ADD PARTICIPANT]</a></td></tr>";
                echo "</table>";
                echo "</div>";

                echo "</div>"; 
                echo "<br>";
                echo "<br>";
            }
        } else {
            echo "<p>NO EXISTING TRIPS</p>";
        }
    } else {
        echo "Error connecting to the database: " . mysqli_error($connection);
    }

    echo "</div>";


    if (isset($_GET['function']) && isset($_GET['type'])) {
        $function = $_GET['function'];
        $type = $_GET['type'];
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        echo "<div id='modal' class='modal show'>";
        echo "<div class='close'><a href='view.php'>x</a></div>";
        echo "<h2 id='title-modal'>" . strtoupper($type) . " - " . strtoupper($function) . "</h2>";

        switch ($function) {
            case 'ADD':
                if ($type == 'PARTICIPANT') {
                    echo "
                        <form action='../create/add_exe.php' method='post'>
                            <input type='hidden' name='trip_id' value='{$id}'>
                            <input type='hidden' name='type' value='{$type}'>
                            <label for='participantName'>Name:</label>
                            <input type='text' id='participantName' name='name' required>
            
                            <label for='participantEmail'>Email:</label>
                            <input type='email' id='participantEmail' name='email' required>
            
                            <button type='submit'>Add Participant</button>
                        </form>";
                } elseif ($type == 'LOCAL') {
                    echo "
                        <form action='../create/add_exe.php' method='post'>
                            <input type='hidden' name='trip_id' value='{$id}'>
                            <input type='hidden' name='type' value='{$type}'>
                            <label for='locationName'>Name:</label>
                            <input type='text' id='locationName' name='name' required>
            
                            <label for='occurs_at'>Occurs at:</label>
                            <input type='date' id='occurs_at' name='occurs_at' required>
            
                            <button type='submit'>Add Location</button>
                        </form>";
                }
                break;
            case 'UPDATE':
                if ($type == 'PARTICIPANT'){
                    $sqlUpdate = "SELECT * FROM participants WHERE id = '$id'";
                    $result = $connection->query($sqlUpdate);
                    $participant = $result->fetch_assoc();

                    echo "
                    <form class='modal-form' action='../update/update_exe.php' method='post'>
                        <input type='hidden' name='id' value='{$id}'>
                        <input type='hidden' name='type' value='{$type}'>
                        <label for='participantName'>Name:</label>
                        <input type='text' id='participantName' name='name' value='{$participant['name']}' required>

                        <label for='participantEmail'>Email:</label>
                        <input type='email' id='participantEmail' name='email' value='{$participant['email']}' required>

                        <button type='submit'>Update Participant</button>
                    </form>";
                } elseif ($type == 'LOCAL') {
                    $sqlUpdate = "SELECT * FROM locations WHERE id = '$id'";
                    $result = $connection->query($sqlUpdate);
                    $location = $result->fetch_assoc();
        
                    echo "
                    <form class='modal-form' action='../update/update_exe.php' method='post'>
                        <input type='hidden' name='id' value='{$id}'>
                        <input type='hidden' name='type' value='{$type}'>
                        <label for='locationName'>Name:</label>
                        <input type='text' id='locationName' name='name' value='{$location['name']}' required>
        
                        <label for='occurs_at'>Occurs at:</label>
                        <input type='date' id='occurs_at' name='occurs_at' value='{$location['occurs_at']}' required>
        
                        <button type='submit'>Update Location</button>
                    </form>";
                } elseif ($type == 'TRIP') {
                    $sqlUpdate = "SELECT * FROM trips WHERE id = '$id'";
                    $result = $connection->query($sqlUpdate);
                    $trip = $result->fetch_assoc();
        
                    echo "
                    <form class='modal-form' id='update-trip-form' action='../update/update_exe.php' method='post'>
                        <input type='hidden' name='id' value='{$id}'>
                        <input type='hidden' name='type' value='{$type}'>
                        <label for='tripName'>Trip name:</label>
                        <input type='text' id='tripName' name='tripName' value='{$trip['name']}' required>
        
                        <label for='description'>Description:</label>
                        <textarea id='description' name='description' rows='8' required>{$trip['description']}</textarea>
        
                        <label for='starts_at'>Starts at:</label>
                        <input id='starts_at' type='date' name='starts_at' value='{$trip['starts_at']}' required>
        
                        <label for='ends_at'>Ends at:</label>
                        <input id='ends_at' type='date' name='ends_at' value='{$trip['ends_at']}' required>
        
                        <p id='error-message' style='display: none;'>The end date cannot be equal or less than the start date!</p>

                        <button type='submit'>Update Trip</button>
                    </form>";
                } else {
                    echo 'Error: Invalid type.';
                }
                break;
            case 'DELETE':
                echo "
                    <form action='../delete/delete_exe.php' method='post'>
                        <input type='hidden' name='type' value='{$type}'>
                        <input type='hidden' name='id' value='{$id}'>
                        <label>
                            <input type='checkbox' name='confirm' required> Are you sure you want to delete this $type?
                        </label>
                        <br>
                        <button type='submit'>Delete</button>
                    </form>";
                break;
        }
        echo "</div>";
    }
    $connection->close();
    ?>

    <?php
        $message = "";
        $message_title = "";
        $modal_style = "display:none;";

        if (isset($_SESSION["hasResponse"]) and $_SESSION["hasResponse"] == true) {
            $message = $_SESSION['message'];
            $message_title = $_SESSION['message_title'];
            $modal_style = "display:block;";

            unset($_SESSION["hasResponse"]);
            unset($_SESSION["message"]);
            unset($_SESSION["message_title"]);
        }
    ?>

    <div id="response-modal" style="<?php echo $modal_style; ?>">
        <div class="close">
            <a href='view.php'>x</a>
        </div>
        <div class="content">
            <h2><?php echo $message_title; ?></h2>
            <p><?php echo $message; ?></p>
        </div>
    </div>

    <script src="../../scripts/view.js"></script>
</body>
</html>