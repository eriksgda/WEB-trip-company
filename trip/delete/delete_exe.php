<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Delete exe</title>
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

            $sql = "DELETE FROM participants WHERE id = '$id'";

        } elseif ($_POST["type"] == "LOCAL"){
            $id = $connection -> real_escape_string($_POST["id"]);

            $sql = "DELETE FROM locations WHERE id = '$id'";

        } elseif ($_POST["type"] == "TRIP"){
            $id = $connection -> real_escape_string($_POST["id"]);

            $sql = "DELETE FROM trips WHERE id = '$id'";

        }
    } else {
        $_SESSION["message"] = "Unable to delete.";
        $_SESSION["message_title"] = "Error.";
    }

    if ($result = $connection -> query($sql)) {
        $_SESSION["message"] = $_POST["type"] . " deleted successful!";
        $_SESSION["message_title"] = $_POST["type"] . " DELETE";
    } else {
        $_SESSION["message"] = "Unable to delete.";
        $_SESSION["message_title"] = "Error.";
    }

    $_SESSION["hasResponse"] = true;

    header("location: /tripCompany/trip/read/view.php");
    exit();

    $connection -> close();
    ?>
</body>
</html>