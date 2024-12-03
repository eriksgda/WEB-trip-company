<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management - Login</title>
</head>
<body>
    <?php
        session_start();

        require "../../database/database_connection.php";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection -> connect_error) {
            die("<strong> Connection failure: </strong>" . $connection->connect_error);
        }

        $login = $connection -> real_escape_string($_POST["loginUsername"]);
        $password = $connection -> real_escape_string($_POST["loginPassword"]);

        $sql = "SELECT id, name FROM users WHERE username = '$login' AND password = md5('$password')";

        if ($result = $connection -> query($sql)) {
            if ($result -> num_rows == 1) {
                $response = $result -> fetch_assoc();

                $_SESSION["login"] = $login;
                $_SESSION["id"] = $response["id"];
                $_SESSION["authorized"] = true;
                $_SESSION["message"] = "Login executed successfully!";
            } else {
                unset($_SESSION["login"]);
                $_SESSION["authorized"] = false;
                $_SESSION["message"] = "Username or password not found!";
            }

            $_SESSION["message_title"] = "Login";
            header("location: /tripCompany/index.php");
            exit();
        } else {
            echo "Error to connect with the database: " . mysqli_error($connection);
        }
        $connection -> close();
    ?>
</body>
</html>