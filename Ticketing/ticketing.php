<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="ticketing.css" />

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


  <title>Ticketing</title>
</head>

<body class="b">
  <div class="maindiv">
    <img class="plane" src="images/plane.png" alt="Flight Reservation">
<div class="text">
  <p class="t1">FLIGHT RESERVATION</p>
  <p class="t2">Please make sure that you fill in the name which is in your passport.<br>Fill all boxes to continue.</p>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $fname = $_POST['firstname'];
  $mname = $_POST['middlename'];
  $lname = $_POST['lastname'];
  $month = $_POST['month'];
  $date = $_POST['date'];
  $year = $_POST['year'];
  // echo "The name entered by user is " . $fname ." " . $mname . " " . $lname . "!";

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


//sql query for insertion of data
if ((isset($_POST['international'])))
{
  if(empty($fname) || empty($mname) || empty($lname) || empty($month) || empty($date) || empty($year))
  {
        echo '
        <script>
          document.querySelector(\'[name="international"]\').disabled = true;
        </script>
        ';
  }
  else
  {
    $sql = "INSERT INTO `ticketing` (`FirstName`, `MiddleName`, `LastName`, `Month`, `Date`, `Year`) Values ('$fname','$mname','$lname','$month','$date','$year')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      // echo "Data inserted successfully";
      header('Location: next.php');
      exit;
    }
  }
} 
elseif((isset($_POST['domestic'])))
{
  if(empty($fname) || empty($mname) || empty($lname) || empty($month) || empty($date) || empty($year))
  {
        echo '
        <script>
          document.querySelector(\'[name="domestic"]\').disabled = true;
        </script>
        ';
  }
  else
  {
    $sql = "INSERT INTO `ticketing` (`FirstName`, `MiddleName`, `LastName`, `Month`, `Date`, `Year`) Values ('$fname','$mname','$lname','$month','$date','$year')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      // echo "Data inserted successfully";
      header('Location: domestic.php');
      exit;
    }
  }
}
else
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>

<div class="passenger_details">
  <h4 class="pn">Passenger Name</h4>

<form action="/Airline/Ticketing/ticketing.php" method= "post">
    <input type="text" class="fname" name="firstname">
    <input type="text" class="mlname" name="middlename">
    <input type="text" class="mlname" name="lastname">
    <p class="f"> First Name</p>
    <p class="m"> Middle Name</p>
    <p class="l"> Last Name</p>
</div>

<div class="birth_details">
    <h4 class="pn">Date Of Birth</h4>
      <input type="text" class="fname" name="month" placeholder="Month">
      <input type="text" class="mlname" name="date" placeholder="Date">
      <input type="text" class="mlname" name="year" placeholder="Year">
  </div>
  
  <hr class="line">
  
  <button type="submit" class="login-button" class="login_link" name="international" >International</button>
  <button type="submit" class="login-button2" class="login_link" name="domestic" onclick="Domestic()">Domestic</button>

</form>
</div>

  <script>
  function International() {
      window.open(
      "next.php", "_self");
  }

  function Domestic() {
      window.open(
      "domestic.php", "_self");
  }
    </script>
  </body>
  </html>
