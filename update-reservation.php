<!doctype html>

<html lang="en">
  <head>
    <title>Check-In</title>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="change-background.js"></script>
    <link rel="stylesheet" href="styles.css" type="text/css">
  </head>
  <body>
    <div class="title-container">
      <h1>TCWS Hotels</h1>
    </div>
    <div class="background-container">
<?php
// hotelManagement/update-reservation.php
// Created: May 5th, 2018
// Created by Wayne Warnke
//
// Last Edit: May 5th, 2018
// Edited by Wayne Warnke

//Reserve table --guest_id, room_id, res_start, res_end

//TODO:startsession();

$db = new DB();

//TODO: get guest id by select statement
$roomID = $_POST['room_id'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];

$statement = $db->conn->prepare("UPDATE reserve SET room_id=?, res_start=?, res_end=? WHERE "); //TODO: Where statement needs to be reservation id
  if(!$statement) die("Prepare failed: " . $db->conn->error);
$bind = $statement->bind_param("iss", $roomID, $startDate, $endDate);
  if(!$bind) die("Bind failed: " . $statement->error);
$execute = $statement->execute();
  if(!$execute) die("Execute failed: " . $statement->error);

  if($execute)
  {
    //redirect back to view page
    header('Location: ');
  }
  else
  {
    die('Could not update Reservation: ' . $db->conn->error);
  }

 ?>
</div>
<ul class="nav-bar">
  <li><a href="index.php">Home</a></li>
  <li><a href="signup.php">Sign Up</a></li>
  <li><a href="check-in.php">Check In</a></li>
  <li><a href="check-out.php">Check Out</a></li>
  <li><a href="make-reservation.php">Make Reservation</a></li>
  <li><a href="emp-login.php">Employee Login</a></li>
</ul>
<div class="information-container">
  <h2>Comfort and Closeness at a Price You'll Love.</h2>
  <p>Discover a refresing hotel retreat in the heart of downtown Dunkirk, NY. With
  stylish accommodations and invigorating amenities, TWCS Hotel will make you free right
  at home during your stay.</p>
  <p>Well-appointed rooms and suites boast modern decor and perks including our iconic
    beds. Maintain your well-being at the fitness center, or explore Dunkirk on foot with
    our running program. If you're hosting an event in town, we offer flexible venues and
    comprehensive planning and catering services. Our hotel also provides eacy access to some
    of the city's top attractions. Whether you're traveling for business or pleasure, TWCS
    Hotel invites you to experience a revitalizing escape</p>
</div>
</body>
</html>
