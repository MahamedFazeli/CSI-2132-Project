<?php
    session_start();

    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $payment_ID = $_POST['payment_ID'];
        $cardNumber = $_POST['card_number'];
        $cardName = $_POST['card_name'];
        $CVV = $_POST['CVV'];
        $customer_SSN = $_POST['customer_SSN'];

        if(empty($payment_ID) || empty($cardNumber) || empty($cardName) || empty($CVV) || empty($customer_SSN)){
            echo("Please don't leave anything blank!!!");
        }else{
            $query = "insert into payment (payment_ID , card_number, card_name, CVV, customer_SSN) values ('$payment_ID','$cardNumber', '$cardName', '$CVV', '$customer_SSN')";
            $result = mysqli_query($con, $query);
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
            .link{
                text-decoration: none;
                color: black;
            }
        </style>

        <div class="content">
            <h1>Customer Booking</h1>
        </div>

            <div class="firstForm">
                <h1>Payment Info</h1>
                <form class="forms" method="post">
                    Payment ID:<input class="box" id="text" type="text" name="payment_ID" placeholder="Payment ID"><br><br>
                    Card Number:<input class="box" id="text" type="text" name="card_number" placeholder="Card Number"><br><br>
                    Card Name:<input class="box" id="text" type="text" name="card_name" placeholder="Card Name"><br><br>
                    CVV:<input class="box" id="text" type="text" name="CVV" placeholder="CVV"><br><br>
                    Customer SSN:<input class="box" id="text" type="text" name="customer_SSN" placeholder="Customer SSN"><br><br>
                    <input class="submit" id="button" type="submit" value="Submit">
                    <button><a class="link" href="customerBooking.php">Booking</a></button>
                </form>
                <?php echo("Payment ID: ".$payment_ID);?>
            </div>
    </body>
</html>