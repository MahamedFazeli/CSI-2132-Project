<?php
    session_start();

    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted

        $booking_ID = $_POST['booking_ID'];
        

        if(!empty($booking_ID)){
        
                $query = "select * from booking where (booking_ID = '$booking_ID')";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);

                
            
        }else{
            echo "Please enter a booking ID.";
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
            .firstForm{
                float: left;
            }
            .secondForm{
                float: right;
            }
        </style>

        <div class="content">
            <h1>Customer Booking</h1>
        </div>

        
            <div class="inputs">
                <h2>Booking ID</h2>
                <form class="forms" method="post">
                    <input class="box" id="text" type="text" name="booking_ID" placeholder="Booking ID">
                    <input class="submit" id="button" type="submit" value="Submit"><br><br>
                    <?php
                        echo "Booking Info:"; 
                        print "<pre>";
                        print_r("Booking ID: ".$row['booking_ID']);
                        print_r(", Booking Date: ".$row['booking_date']);
                        print_r(", Duration of Stay: ".$row['duration_of_stay']);
                        print_r(", Room ID: ".$row['room_ID']);
                        print_r(", Employee SSN: ".$row['employee_SSN']);
                        print_r(", Customer SSN: ".$row['customer_SSN']);
                        print_r(", Hotel ID: ".$row['hotel_ID']);
                        print "</pre>"; 
                    ?>
            </div>

            <div class="firstForm">
                <h1>Renting Info</h1>
                <form class="forms" method="post">
                    Booking_ID:<input class="box" id="text" type="text" name="booking_ID" placeholder="Booking ID"><br><br>
                    Booking Date:<input class="box" id="text" type="text" name="booking_date" placeholder="Booking Date"><br><br>
                    Duration of Stay:<input class="box" id="text" type="text" name="duration_of_stay" placeholder="Duration of Stay"><br><br>
                    Room ID:<input class="box" id="text" type="text" name="room_ID" placeholder="room_ID"><br><br>
                    Employee SSN:<input class="box" id="text" type="text" name="employee_SSN" placeholder="employee_SSN"><br><br>
                    Customer SSN:<input class="box" id="text" type="text" name="customer_SSN" placeholder="customer_SSN"><br><br>
                    Hotel ID:<input class="box" id="text" type="text" name="hotel_ID" placeholder="Hotel ID"><br><br>
                    <input class="submit" id="button" type="submit" value="Submit">
            </div>
            <div class="secondForm">
                <h1>Payment Info</h1>
                <form class="forms" method="post">
                    Payment ID:<input class="box" id="text" type="text" name="booking_ID" placeholder="Booking ID"><br><br>
                    Card Number:<input class="box" id="text" type="text" name="card_number" placeholder="Card Number"><br><br>
                    Card Name:<input class="box" id="text" type="text" name="card_name" placeholder="Card Name"><br><br>
                    CVV:<input class="box" id="text" type="text" name="CVV" placeholder="CVV"><br><br>
                    Customer SSN:<input class="box" id="text" type="text" name="customer_ssn" placeholder="Customer SSN"><br><br>
                    <input class="submit" id="button" type="submit" value="Submit">
            </div>

    </body>
</html>
