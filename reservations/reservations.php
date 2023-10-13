<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="res.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">


  <title>Hotel Booking</title>
</head>

<body class="b">
  <div class="maindiv">
    <img class="plane" src="h.jpg" alt="Flight Reservation">
<div class="text">
  <p class="t1">Hotel Booking</p>
  <p class="t2">Please make sure that you fill all the fields.</p>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $email = $_POST['user_email'];
  $roomtype = $_POST['roomtype'];
  $guests = $_POST['guestsnumber'];
  $arrivaldate = $_POST['arrivaldate'];
  $arrivaltime = $_POST['arrivaltime'];
  $departuredate = $_POST['departuredate'];
  $departuretime = $_POST['departuretime'];

 //store in the database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "airline";

//create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

if ((isset($_POST['submit'])))
{
  if(empty($email)){
    echo '
    <script>
      document.querySelector(\'[name="submit"]\').disabled = true;
    </script>
    ';
  }
  else
{
    $sql = "INSERT INTO `hotelbooking` (`Email`, `Room_Type`, `Total_Guests`, `Arrival_Date`, `Arrival_Time`, `Departure_Date`, `Departure_Time`) Values ('$email','$roomtype','$guests','$arrivaldate','$arrivaltime','$departuredate' , '$departuretime')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      // echo "Data inserted successfully";
      header('Location: /Airline/Home.php');
      exit;
    }
}
}
else{
    $url = "/Airline/Home.php";
echo '<script>window.location.href = "'.$url.'";</script>';
exit;
}

}
?>

<form action="/Airline/reservations/reservations.php" method="post">
<div class="email_details">
  <h4 class="ema">Email</h4>
  <input type="email" class="email" name="user_email" placeholder="myname@example.com" value="">
</div>

<div class="phone_details">
	<p class="countryselect">Room Type</p>
	<select id="list1" name="roomtype" list1="getSelectValue1();">
				<option class="u" value="none">--Please Select</option>
				<option class="u" value="Standard Room">Standard Room(1 to 2 people)</option>
				<option class="u" value="Family Room">Family Room(1 to 4 people)</option>
				<option class="u" value="Private Room">Private Room(1 to 3 people)</option>
				<option class="u" value="Mix Dorm Room">Mix Dorm Room(6 people)</option>
				<option class="u" value="Female Dorm Room">Female Dorm Room(6 people)</option>
				<option class="u" value="Male Dorm Room">Male Dorm Room(6 people)</option>
			</select>
</div>

<div class="phone_details">
	<p class="countryselect">Number Of Guests</p>
	<select id="list1" name="guestsnumber" list1="getSelectValue1();">
				<option class="u" value="0">0</option>
				<option class="u" value="1">1</option>
				<option class="u" value="2">2</option>
				<option class="u" value="3">3</option>
				<option class="u" value="4">4</option>
				<option class="u" value="5">5</option>
				<option class="u" value="6">6</option>
			</select>
</div>

<div class="deptTime">
  <h4 class="deptText">Arival Date & Time</h4>
  <input type="date" name="arrivaldate" class="month">
  <input type="time" name="arrivaltime" class="time">
  <p class="mt">Select Date</p>
  <p class="dt">Select Time</p>
</div>

<div class="deptTime">
  <h4 class="deptText">Departure Date & Time</h4>
  <input type="date" name="departuredate" class="month">
  <input type="time" name="departuretime" class="time">
  <p class="mt">Select Date</p>
  <p class="dt">Select Time</p>
</div>


    <hr class="line">

    <button type="submit" class="login-button" name="submit" class="login_link" >Submit</button>
    <button type="submit" class="login-button2" name="back" class="login_link" >Back</button>

</form>
</div>

  </body>
  </html>
