<?php
    require 'config.php';
    session_start();

    $connection = mysqli_connect($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die('Database connection failed: ' . $connection->connect_error);
    };

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $connection->query($query);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['loggedIn'] = true;
                header("Location: Main.php");
                exit();
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Invalid username";
        }
    }
    $connection->close();
?>