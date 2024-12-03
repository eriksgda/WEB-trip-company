<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/asidebar.css">
    <link rel="stylesheet" href="../../styles/logout.css">
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/create.css">

    <title>Trip Management - Create</title>
</head>
<body>
    <?php require "../../global/asidebar.php";?>

    <div class="container">
        <h1>Create Trip</h1>
        <form id="create-trip-form" action="create_exe.php" method="post">
            <label for="tripName">Trip name:</label>
            <input 
                type="text" 
                id="tripName" 
                name="tripName" 
                placeholder="Enter your trip name" 
                title="Enter your trip name"
                required 
            >
            <label for="description">Description:</label>
            <textarea 
                id="description" 
                name="description" 
                rows="4" 
                placeholder="Enter you trip description..." 
                title="Enter you trip description" 
                required
            ></textarea>

            <label for="starts_at">Starts at:</label>
            <input 
                id="starts_at" 
                type="date" 
                name="starts_at" 
                required
            >

            <label for="ends_at">Ends at:</label>
            <input 
                id="ends_at" 
                type="date" 
                name="ends_at" 
                required
            >

            <p id="error-message" style="display: none;">The end date cannot be equal or less than the start date!</p>

            <button type="submit">Create Trip</button>
        </form>
    </div>

    <?php
        $message = "";
        $message_title = "TRIP CREATE";
        $modal_style = "display:none;";

        if (isset($_SESSION["hasResponse"]) and $_SESSION["hasResponse"] == true) {
            $message = $_SESSION['message'];
            $modal_style = "display:block;";

            unset($_SESSION["hasResponse"]);
            unset($_SESSION["message"]);
        }
    ?>

    <div id="trip-response-modal" style="<?php echo $modal_style; ?>">
        <div class="close">
            <span id="close-trip-response-modal">x</span>
        </div>
        <div class="content">
            <h2><?php echo $message_title; ?></h2>
            <p><?php echo $message; ?></p>
        </div>
    </div>

    <script src="../../scripts/create.js"></script>
</body>
</html>