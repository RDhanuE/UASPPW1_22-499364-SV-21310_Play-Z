<?php
    require 'config.php';
    session_start();

    $connection = mysqli_connect($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die('Database connection failed: ' . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hpassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hpassword')";
        if ($connection->query($query) === TRUE) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            $_SESSION['accountCreated'] = true;
            header("Location: Main.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $connection->error;
        }
    }
    
    $connection->close();
?>