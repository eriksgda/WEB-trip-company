<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Sign up</title>
</head>
<body>
    <?php
        session_start();

        require "../../database/database_connection.php";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection -> connect_error) {
            die("<strong> Connection failure: </strong>" . $conn->connect_error);
        }

        $name = $connection ->real_escape_string($_POST["name"]);
        $username = $connection ->real_escape_string($_POST["signupUsername"]);
        $email = $connection ->real_escape_string($_POST["email"]);
        $password = $connection ->real_escape_string($_POST["signupPassword"]);
    
        $sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', md5('$password'))";

        if ($result = $connection -> query($sql)) {
            $_SESSION["authorized"] = true;
            $_SESSION["message"] = "Sign up executed successful!";
        } else {
            unset($_SESSION["login"]);
            $_SESSION["authorized"] = false;
            $_SESSION["message"] = "Unable to register.";
        }

        $_SESSION["message_title"] = "SignUp";
        header("location: /tripCompany/index.php");
        exit();

        $connection -> close();
    ?>
</body>
</html>