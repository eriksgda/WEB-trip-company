<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Update exe</title>
</head>
<body>   
    <?php 
    session_start();
    
    require "../../database/database_connection.php";
    
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection -> connect_error) {
        die("<strong> Connection failure: </strong>" . $connection->connect_error);
    }

    if (isset($_POST["type"]) && isset($_POST["id"])){
        if ($_POST["type"] == "PARTICIPANT"){
            $id = $connection -> real_escape_string($_POST["id"]);
            $name = $connection -> real_escape_string($_POST["name"]);
            $email = $connection -> real_escape_string($_POST["email"]);

            $sql = "UPDATE participants SET name='$name', email='$email' WHERE id='$id'";

        } elseif ($_POST["type"] == "LOCAL"){
            $id = $connection -> real_escape_string($_POST["id"]);
            $name = $connection -> real_escape_string($_POST["name"]);
            $occursAt = $connection -> real_escape_string($_POST["occurs_at"]);

            $sql = "UPDATE locations SET name='$name', occurs_at='$occursAt' WHERE id='$id'";

        } elseif ($_POST["type"] == "TRIP"){
            $id = $connection -> real_escape_string($_POST["id"]);
            $name = $connection -> real_escape_string($_POST["tripName"]);
            $description = $connection -> real_escape_string($_POST["description"]);
            $startsAt = $connection -> real_escape_string($_POST["starts_at"]);
            $endsAt = $connection -> real_escape_string($_POST["ends_at"]);

            $sql = "UPDATE trips SET name='$name', description='$description', starts_at='$startsAt', ends_at='$endsAt' WHERE id='$id'";

        }
    } else {
        $_SESSION["message"] = "Unable to update.";
        $_SESSION["message_title"] = "Error.";
    }

    if ($result = $connection -> query($sql)) {
        $_SESSION["message"] = $_POST["type"] . " updated successful!";
        $_SESSION["message_title"] = $_POST["type"] . " UPDATE";
    } else {
        $_SESSION["message"] = "Unable to update.";
        $_SESSION["message_title"] = "Error.";
    }

    $_SESSION["hasResponse"] = true;

    header("location: /tripCompany/trip/read/view.php");
    exit();

    $connection -> close();
    ?>
</body>
</html>