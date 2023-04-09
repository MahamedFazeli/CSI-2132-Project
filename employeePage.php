<?php
session_start();

include("connection.php");
include("functions.php");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Employee Page</title>
</head>
<style>
    .content{
        max-width: 500px;
        margin: auto;
        text-align: center;
    }
    .title{
        text-align: center;
    }
    
    .btn{
        padding: 5px;
        margin-left: 10px;
    }
    .link{
        text-decoration: none;
        color: black;
    }
</style>
<body>
    <div class="content">
        <h1 class="title">E-Hotels Employee Page</h1><br><br>
        <button class="btn"><a class ="link" href="adding.php">Add Hotel/Room</button>
        <button class="btn"><a class ="link" href="removing.php">Remove Hotel/Room</button>
        <button class="btn"><a class ="link" href="modifying.php">Modify Hotel/Room</button><br><br>

        <button class="btn"><a class ="link" href="customerBooking.php">Customer Booking</button>
        <button class="btn"><a class ="link" href="customerRenting.php">Customer Renting</button>
    </div>
</body>
</html>