<?php
    session_start();

    include("connection.php");
    include("functions.php");
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

        $room_ID = $_POST['room_ID'];
        $amenities = $_POST['amenities'];
        $price = $_POST['price'];
        $capacity = $_POST['capacity'];
        $view_type = $_POST['view_type'];
        $can_be_extended = $_POST['can_be_extended'];
        $defects = $_POST['defects'];
        $hotel_ID2 = $_POST['hotel_ID2'];
        
        $roomAdd = $_POST['roomAdd'];
        $hotelAdd = $_POST['hotelAdd'];

        if($roomAdd === "1"){
            
            if((empty($room_ID))){
                echo "Please don't leave anything blank.";
            }else{
                $query = "delete from room where (room_ID = '$room_ID')";
                mysqli_query($con, $query);

                header("Location: successPage.php");
                die;
            }

        }elseif($hotelAdd === "1"){
            if((empty($hotel_ID))){
                echo "Please don't leave anything blank.";
            }else{
                $query = "delete from hotel where (hotel_ID = '$hotel_ID')";
                mysqli_query($con, $query);
                header("Location: successPage.php");
                die;
            }
                
            
        }
    }

?>


<!DOCTYPE html>
<html>
    
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
            <h1>Employee Removing Page</h1>
        </div>

        
            <div class="inputs">Removing Hotel:</div>
                <form class="forms" method="post">
                    
                    <input type="hidden" id="text" name="hotelAdd"  value="0">
                    <input type="checkbox" id="text" name="hotelAdd" value="1">
                    <input class="box" id="text" type="text" name="hotel_ID" placeholder="Hotel ID">
                    <input class="submit" id="button" type="submit" value="Submit">

            </div><br><br>

            <div class="inputs">Removing Room:</div>

                    <input type="hidden" id="text" name="roomAdd"  value="0">
                    <input type="checkbox" id="text" name="roomAdd" value="1">
                    <input class="box" id="text" type="text" name="room_ID" placeholder="Room ID">
                    <input class="submit" id="button" type="submit" value="Submit">
                </form>
            </div>
        
    </body>
</html>