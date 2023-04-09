<?php
    session_start();

    include("C:/xampp/htdocs/CSI-2132-Project/connection.php");
    include("C:/xampp/htdocs/CSI-2132-Project/functions.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $hotel_ID = $_POST['hotel_ID'];
        $rating = $_POST['rating'];
        $number_of_rooms = $_POST['number_of_rooms'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $chain_ID = $_POST['chain_ID'];
        $manager_ID = $_POST['manager_ID'];

        if(empty($hotel_ID) || empty($rating) || empty($number_of_rooms)|| empty($address)|| empty($email)|| empty($phone_number)|| empty($chain_ID)|| empty($manager_ID)){

            echo "Please don't leave anything blank.";
        }else{
            $query = "insert into hotel (hotel_ID, rating, number_of_rooms, address, email, phone_number, chain_ID, manager_ID) values ('$hotel_ID', '$rating', '$number_of_rooms', '$address', '$email', '$phone_number', '$chain_ID', '$manager_ID')";
            mysqli_query($con, $query);
        }

    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>adding page</title>
    </head>

    <body>
        <style>
            .content{
                text-align: center;
            }
            .inputs{
                font-size: 25px;
                margin-left: 75px;
            }
            .box{
                margin-top: 10px;
                margin-right: 5px;
            }
            .forms{
                margin-left:75px;
            }
            .submit{
                background-color: lightskyblue;
                color: black;
                
            }
            .submit:hover{
                background-color: blue;
                color: white;
                
            }
        </style>

        <div class="content">
            <h1>Employee Adding Page</h1>
        </div>

        
            <div class="inputs">Adding Hotel:</div>
                <form class="forms" method="post">
                    
                    <input class="box" id="text" type="text" name="hotel_ID" placeholder="Hotel ID">
                    <input class="box" id="text" type="text" name="rating" placeholder="Rating">
                    <input class="box" id="text" type="text" name="number_of_rooms" placeholder="Number of Rooms">
                    <input class="box" id="text" type="text" name="address" placeholder="Address">
                    <input class="box" id="text" type="text" name="email" placeholder="Email">
                    <input class="box" id="text" type="text" name="phone_number" placeholder="Phone Nubmer">
                    <input class="box" id="text" type="text" name="chain_ID" placeholder="Chain ID">
                    <input class="box" id="text" type="text" name="manager_ID" placeholder="Manager ID">
                    <input class="submit" id="button" type="submit" value="Submit">
                </form>
            </div><br><br>

            <div class="inputs">Adding Room:</div>
                <form class="forms" method="post">
                    
                    <input class="box" id="text" type="text" name="room_ID" placeholder="Room ID">
                    <input class="box" id="text" type="text" name="amenities" placeholder="Amenities">
                    <input class="box" id="text" type="text" name="price" placeholder="Price">
                    <input class="box" id="text" type="text" name="capacity" placeholder="Capacity">
                    <input class="box" id="text" type="text" name="view_type" placeholder="View Type">
                    <input class="box" id="text" type="text" name="can_be_extended" placeholder="Extendable">
                    <input class="box" id="text" type="text" name="defects" placeholder="Defects">
                    <input class="box" id="text" type="text" name="hotel_ID" placeholder="Hotel ID">
                    <input class="submit" id="button" type="submit" value="Submit">
                </form>
            </div>
        
    </body>
</html>
