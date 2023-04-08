<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

            //save to database
            $user_id = random_num(8);
            $query = "insert into registration (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
            
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }else{
            echo "Please enter valid information.";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Signup page</title>
    </head>

    <body>
        <style>

        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Customer Signup</div>

                Username: <input id="text" type="text" name="user_name"><br><br>
                Password: <input id="text" type="password" name="password"><br><br>

                <input id="button" type="submit" value="Signup"><br><br>

                <a href="login.php">Login</a>
            </form>
        </div>
    </body>
</html>