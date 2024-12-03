<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Add exe</title>
</head>
<body>   
    <?php 
    session_start();
    
    require "../../database/database_connection.php";
    
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection -> connect_error) {
        die("<strong> Connection failure: </strong>" . $connection->connect_error);
    }

    if (isset($_POST["type"]) && isset($_POST["trip_id"])){
        if ($_POST["type"] == "PARTICIPANT"){
            $tripId = $connection -> real_escape_string($_POST["trip_id"]);
            $name = $connection -> real_escape_string($_POST["name"]);
            $email = $connection -> real_escape_string($_POST["email"]);

            $sql = "INSERT INTO participants (name, email, trip_id) VALUES ('$name', '$email', '$tripId')";

        } elseif ($_POST["type"] == "LOCAL"){
            $tripId = $connection -> real_escape_string($_POST["trip_id"]);
            $name = $connection -> real_escape_string($_POST["name"]);
            $occursAt = $connection -> real_escape_string($_POST["occurs_at"]);

            $sql = "INSERT INTO locations (name, occurs_at, trip_id) VALUES ('$name', '$occursAt', '$tripId')";
        }
    } else {
        $_SESSION["message"] = "Unable to register.";
        $_SESSION["message_title"] = "Error.";
    }

    if ($result = $connection -> query($sql)) {
        $_SESSION["message"] = $_POST["type"] . " created successful!";
        $_SESSION["message_title"] = $_POST["type"] . " CREATE";
    } else {
        $_SESSION["message"] = "Unable to register.";
        $_SESSION["message_title"] = "Error.";
    }

    $_SESSION["hasResponse"] = true;

    header("location: /tripCompany/trip/read/view.php");
    exit();

    $connection -> close();
    ?>
</body>
</html>