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

  // Execute the query
  $result = mysqli_query($con, $query);

  // Process the results
  if (!$result || mysqli_num_rows($result) === 0) {
    echo "<p>No results found.</p>";
  } else {
    echo "<table>";
    echo "<tr><th>Room Number</th><th>Hotel ID</th><th>Capacity</th><th>Price</th></tr>";
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
    Hello, <?php echo $user_data['user_name']; ?>

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

        <br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price">

        <br>

        <button type="submit">Search</button>
    </form>

</body>
</html>
