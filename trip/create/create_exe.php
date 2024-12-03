<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Create exe</title>
</head>
<body>   
    <?php 
    session_start();
    
    require "../../database/database_connection.php";
    
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection -> connect_error) {
        die("<strong> Connection failure: </strong>" . $connection->connect_error);
    }

    $name = $connection -> real_escape_string($_POST["tripName"]);
    $description = $connection -> real_escape_string($_POST["description"]);
    $startsAt = $connection -> real_escape_string($_POST["starts_at"]);
    $endsAt = $connection -> real_escape_string($_POST["ends_at"]);

    $userId = $_SESSION["id"];


    $sql = "INSERT INTO trips (name, description, starts_at, ends_at, user_id) VALUES ('$name', '$description', '$startsAt', '$endsAt', '$userId')";

    if ($result = $connection -> query($sql)) {
        $_SESSION["message"] = "Trip created successful!";
    } else {
        $_SESSION["message"] = "Unable to register.";
    }
    $_SESSION["hasResponse"] = true;

    header("location: /tripCompany/trip/create/create.php");
    exit();

    $connection -> close();
    
    ?>
</body>
</html>