<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Build the SQL query based on selected search criteria
  $query = "SELECT * FROM room WHERE 1=1"; // Start with a true condition to make subsequent conditions easier to append
  if (!empty($_POST['capacity'])) {
    $capacity = $_POST['capacity'];
    $query .= " AND capacity >= $capacity";
  }
  if (!empty($_POST['price'])) {
    $price = $_POST['price'];
    $query .= " AND price <= $price";
  }
   if (!empty($_POST['number_of_rooms'])) {
    $num_rooms = $_POST['num-rooms'];
    $query .= " AND hotel_ID IN (SELECT hotel_ID FROM hotel WHERE number_of_rooms <= $num_rooms)";
  }
  if (!empty($_POST['hotel-chain'])) {
    $hotel_chain = $_POST['hotel-chain'];
    $query .= " AND hotel_ID IN (SELECT hotel_id FROM hotel WHERE Chain_ID = '$hotel_chain')";
  }
   if (!empty($_POST['hotel'])) {
    $hotel = $_POST['hotel'];
    $query .= " AND hotel_ID = '$hotel'";
  }

  // Execute the query
  $result = mysqli_query($con, $query);

  // Process the results
  if (!$result || mysqli_num_rows($result) === 0) {
    echo "<p>No results found.</p>";
  } else {
    echo "<table>";
    echo "</th><th>Hotel ID</th><th>Capacity</th><th>Price</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "</td><td>" . $row['hotel_ID'] . "</td><td>" . $row['Capacity'] . "</td><td>" . $row['Price'] . "</td></tr>";
    }
    echo "</table>";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>E-Hotels</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>E-Hotels</h1>

    <br>
    <h1>Hello, <?php echo $user_data['user_name']; ?></h1>

    <form method="POST" id="search-form">
        <label for="capacity">Room capacity:</label>
        <select id="capacity" name="capacity">
            <option value="">Any</option>
            <option value="1">1 person</option>
            <option value="2">2 people</option>
            <option value="3">3 people</option>
            <option value="4">4 people</option>
            <option value="5">5 people</option>
            <option value="6">6 people</option>
        </select>
        <label for="num-rooms">Number of rooms in hotel:</label>
        <input type="number" id="num-rooms" name="num-rooms" min="0">
        
        <label for="hotel-chain">Hotel chain:</label>
        <select id="hotel-chain" name="hotel-chain">
            <option value="">Any</option>
            <option value="chain1">Chain 1</option>
            <option value="chain2">Chain 2</option>
            <option value="chain3">Chain 3</option>
            <option value="chain4">Chain 4</option>
            <option value="chain5">Chain 5</option>
        </select>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price">

        <label for="hotel">Hotel:</label>
        <select id="hotel" name="hotel">
            <option value="">Any</option>
            <option value="hotel1">Hotel 1</option>
            <option value="hotel2">Hotel 2</option>
            <option value="hotel3">Hotel 3</option>
            <option value="hotel4">Hotel 4</option>
            <option value="hotel5">Hotel 5</option>
            <option value="hotel6">Hotel 6</option>
            <option value="hotel7">Hotel 7</option>
            <option value="hotel8">Hotel 8</option>
        </select>

        <button type="submit">Search</button>
    </form>

</body>
</html>
