<!DOCTYPE html>
<html>
    
    <title>adding page</title>
    </head>

    <body>
        <style>
            .content{
                text-align: center;
            }
            .link{
                text-decoration: none;
                color: black;
            }
        </style>

        <div class="content">
            <h1>Customer Booking</h1>
        </div>

        
            <div class="inputs">
                <h2>Booking ID</h2>
                <form class="forms" method="post">
                    <input type="hidden" id="text" name="book"  value="0">
                    <input type="checkbox" id="text" name="book" value="1">
                    <input class="box" id="text" type="text" name="booking_ID2" placeholder="Booking ID">
                    <input class="submit" id="button" type="submit" value="Submit"><br><br>
            </div>

            <div class="firstForm">
                <h1>Renting Info</h1>
                <form class="forms" method="post">
                    Renting ID:<input class="box" id="text" type="text" name="renting_ID" placeholder="Renting ID"><br><br>
                    Check in Date:<input class="box" id="text" type="text" name="check_in_date" placeholder="Check in Date"><br><br>
                    Price:<input class="box" id="text" type="text" name="price" placeholder="Price"><br><br>
                    Duration:<input class="box" id="text" type="text" name="duration_of_rent" placeholder="Duration"><br><br>
                    Room ID:<input class="box" id="text" type="text" name="room_ID" placeholder="Room ID"><br><br>
                    Payment ID:<input class="box" id="text" type="text" name="payment_ID" placeholder="Payment ID">
                    <button><a class="link" href="customerPayment.php">Customer Payment Info</a></button><br><br>
                    Booking ID:<input class="box" id="text" type="text" name="booking_ID" placeholder="Booking ID"><br><br>
                    Hotel ID:<input class="box" id="text" type="text" name="hotel_ID" placeholder="Hotel ID"><br><br>
                    <input class="submit" id="button" type="submit" value="Submit">
                </form>
            </div><br><br>
            
            <?php
                session_start();

                include("connection.php");
                include("functions.php");
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    //something was posted
                    $booking_ID2 = $_POST['booking_ID2'];
                    $book = $_POST['book'];

                    $renting_ID = $_POST['renting_ID'];
                    $checkInDate = $_POST['check_in_date'];
                    $price = $_POST['price'];
                    $durationOfRent = $_POST['duration_of_rent'];
                    $room_ID = $_POST['room_ID'];
                    $payment_ID = $_POST['payment_ID'];
                    $booking_ID = $_POST['booking_ID'];
                    $hotel_ID = $_POST['hotel_ID'];
                    if(empty($booking_ID2) && $book == 1){
                        echo("Please don't booking ID blank.");
                    }elseif($book == 1){
                        $query3 = "select * from booking where booking_ID = ('$booking_ID2')";
                        $result = mysqli_query($con, $query3);
                        $row = mysqli_fetch_array($result);
                        print "<pre>";
                        print_r($row);
                        print "</pre>";
                    }

                    if((empty($renting_ID) || empty($checkInDate) || empty($durationOfRent) || empty($room_ID) || empty($payment_ID) || empty($booking_ID) || empty($hotel_ID))&& $book == 0){
                        echo("Please don't leave anything blank!!!");
                    }elseif($book == 0){
                        $query = "insert into renting (renting_ID , check_in_date, price, duration_of_rent, room_ID, payment_ID, booking_ID, hotel_ID) values ('$renting_ID','$checkInDate', '$price', '$durationOfRent', '$room_ID', '$payment_ID','$booking_ID', '$hotel_ID')";
                        mysqli_query($con, $query);

                        $query2 = "delete from booking where booking_ID = ('$booking_ID')";
                        mysqli_query($con, $query2);

                        Header("Location: successPage.php");
                        die;
                    }
                }

            ?>
    </body>
</html>
