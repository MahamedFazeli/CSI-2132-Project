<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        //read from database
        $query = "Select * from registration where user_name = '$user_name' limit 1";
        
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Incorrect password or username";

    }else{
        echo "Please enter valid information.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
    </head>

    <body>
        <style>

        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Customer Login</div>

                Username: <input id="text" type="text" name="user_name"><br><br>
                Password: <input id="text" type="password" name="password"><br><br>

                <input id="button" type="submit" value="Login">
                <a href="signup.php">Signup</a><br><br>
                
            </form>
            <button><a href="employeeLogin.php" style="text-decoration: none;">Employee Login</a></button>
            
        </div>
    </body>
</html>