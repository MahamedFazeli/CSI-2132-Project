<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $employee_ID = $_POST['employee_ID'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        //read from database
        $query = "Select * from employee where user_name = '$user_name' limit 1";
        
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password && $user_data['employee_SSN'] === $employee_ID){

                    $_SESSION['user_name'] = $user_data['user_name'];
                    header("Location: employeePage.php");
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
        <title>Employee Login page</title>
    </head>

    <body>
        <style>

        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px; margin: 10px;">Employee Login</div>

                Employee_ID: <input id="text" type="text" name="employee_ID"><br><br>
                Username: <input id="text" type="text" name="user_name"><br><br>
                Password: <input id="text" type="password" name="password"><br><br>

                <input id="button" type="submit" value="Login">
                
            </form>
            
        </div>
    </body>
</html>