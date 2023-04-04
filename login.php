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

    // Get the user input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match an existing account in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {