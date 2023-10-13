<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="domesticluggage.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

  <title>Luggage</title>
</head>

<body class="b">

<div class="maindiv">
  <!-- <button type="submit" onclick="document.location='animate.html'" class="home"><i class="fa fa-plane" style="font-size:36px;"></i><i>Jet Set Go</i> <br />
    <hr class="plane-line" />
    <p class="travelagency">TRAVEL AGENCY</p>
  </button> -->
  <img src="logo.png" class="logo" alt="">
  <div class="text">
    <p class="t1">LUGGAGE DETAILS</p>
  </div>
  <hr class="line2">

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $fname = $_POST['firstname'];
  $mname = $_POST['middlename'];
  $lname = $_POST['lastname'];
  $email = $_POST['user_email'];
  $areacode = $_POST['areacode'];
  $phoneNumber = $_POST['phoneNumber'];
  $weight = $_POST['weight'];

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
if((isset($_POST['continue'])))
{
  $sql = "INSERT INTO `luggage` (`FirstName`, `MiddleName`, `LastName`, `Email`, `Area_code`, `Phone_Number`, `Luggage_Weight`) Values ('$fname','$mname','$lname','$email','$areacode','$phoneNumber' , '$weight')";
  $result = mysqli_query($conn, $sql);

  if($result)
  {
    // echo "Data inserted successfully";
    header('Location: domestic.php');
    exit;
  }
} 
}
?>

  <form action="/Airline/Ticketing/domesticluggage.php" method="post">
  <div class="passenger_details">
    <h4 class="pn">Passenger Name</h4>
    <input type="text" class="fname" name="firstname">
    <input type="text" class="mlname" name="middlename">
    <input type="text" class="mlname" name="lastname">
    <p class="f"> First Name</p>
    <p class="m"> Middle Name</p>
    <p class="l"> Last Name</p>
  </div>

  <div class="email_details">
    <h4 class="ema">Email</h4>
    <input type="email" class="email" name="user_email" placeholder="myname@example.com" value="">
  </div>

  <div class="phone_details">
    <h4 class="ema">Phone Number</h4>
    <input type="text" class="area_code" name="areacode">
    <input type="text" class="phone_number" name="phoneNumber">
    <p class="ac"> Area Code</p>
    <p class="phone_no"> Phone Number</p>
  </div>


  <div class="depart1">
    <h4 class="departing">Select Weight of Luggage</h4>
    <select name= "weight"  id="list2">
          <option class="u" value="none">--Please Select</option>
          <option class="u" value="10">0 KG-10 KG</option>
          <option class="u" value="20">10 KG-20 KG</option>
          <option class="u" value="30">20 KG-30 KG</option>
        </select>
</div>

    <hr class="line">
    <button type="submit" name="continue" class="login-button" class="login_link" onclick="Next()">Continue</button>
    </form>


</div>

<script>
function Next() {
    window.open(
    "next.php", "_self");
}

</script>
</body>
</html>
