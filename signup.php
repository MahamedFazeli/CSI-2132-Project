<?php
    // Connect to the MySQL database
    $host = 'localhost';
    $user = 'username';
    $pass = 'password';
    $dbname = 'mydb';

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the user input from the sign-up form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists in the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already taken.";
        exit();
    }

    // Insert the new user into the database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "Sign up successful!";
        header('Location: index.html');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
?>