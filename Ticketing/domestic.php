<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="domestic.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

  <title>Ticketing</title>
</head>

<body class="b">

<div class="maindiv">
  <button type="submit" onclick="document.location='animate.html'" class="home"><i class="fa fa-plane" style="font-size:36px;"></i><i>Jet Set Go</i> <br />
    <hr class="plane-line" />
    <p class="travelagency">TRAVEL AGENCY</p>
  </button>
  <div class="text">
    <p class="t1">DOMESTIC TICKETING DETAILS</p>
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
  $address = $_POST['address1'] . $_POST['address2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zipcode = $_POST['zipcode'];
  $country = $_POST['country'];
  $departuredate = $_POST['departuredate'];
  $departuretime = $_POST['departuretime'];
  $returndate = $_POST['returndate'];
  $returntime = $_POST['returntime'];
  $departingfromcity = $_POST['departingfromcity'];
  $destinationcity = $_POST['destinationcity'];
  $airline = isset($_POST['airline']) ? $_POST['airline'] : '';
  $paymentmethod = isset($_POST['payment']) ? $_POST['payment'] : '';
  $cardnumber = $_POST['cardnumber'];

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
if ((isset($_POST['reserveflight'])))
{
  // if(empty($fname) || empty($mname) || empty($lname) || empty($email) || empty($areacode) || empty($phoneNumber) || empty($address) || empty($city) || empty($state) || empty($zipcode) || empty($country)|| empty($departuredate) || empty($departuretime) || empty($returndate) || empty($returntime) || empty($departingfromcity) || empty($destinationcity) || empty($paymentmethod) || empty($cardnumber)){
  //   echo '
  //   <script>
  //     document.querySelector(\'[name="reserveflight"]\').disabled = true;
  //   </script>
  //   ';
  // }
  // else
  {
    $sql1 = "INSERT INTO `domestic_personal_info` (`firstName`, `middleName`, `lastName`, `Email`, `Area_code`, `PhoneNumber`, `Address`, `City`, `State_Province`, `Zip_Postal_Code`, `Country`) Values ('$fname','$mname','$lname','$email','$areacode','$phoneNumber' , '$address', '$city', '$state', '$zipcode', '$country')";
    $result1 = mysqli_query($conn, $sql1);
    $sql2 = "INSERT INTO `domestic_ticket_info` (`Email`, `Departure_Date`, `Departure_Time`, `Return_Date`, `Return_Time`, `Departing_From_City`, `Destination_City`, `Airline`, `Card_Number`, `Payment_Method`) Values ('$email','$departuredate','$departuretime','$returndate','$returntime', '$departingfromcity', '$destinationcity', '$airline', '$cardnumber', '$paymentmethod')";
    $result2 = mysqli_query($conn, $sql2);
    $sql = $sql1 . ";" . $sql2;
  if($result1 && $result2)
  {
    // echo "Data inserted successfully";
    header('Location: thanks.php');
    exit;
  }
}
}
elseif((isset($_POST['back'])))
{
    header('Location: ticketing.php');
    exit;
}
elseif ((isset($_POST['luggage'])))
{
  header('Location: domesticluggage.php');
  exit;
}
else
{
  header('Location: price.php');
  exit;
}

}
?>

<form action="/Airline/Ticketing/domestic.php" method="post">
  <div class="passenger_details">
    <h4 class="pn">Passenger Details</h4>
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


<div class="address_details">
  <h4 class="ema">Address</h4>
  <input type="text" class="address" name="address1">
  <p class="ac"> Street Address</p>
  <input type="text" class="address2" name="address2">
  <p class="ac"> Street Address 2</p>
</div>

<div class="phone_details">
  <input type="text" class="city" name="city">
  <input type="text" class="city" name="state">
  <p class="ac"> City</p>
  <p class="province"> State/Province</p>
</div>


<div class="phone_details">
  <input type="typeext" class="city" name="zipcode">
  <p class="ac"> Zip>  / Postal Code</p>
  <select id="list1" name="country" list1="getSelectValue1();">
        <option class="u" value="none">--Please Select</option>
        <option class="u" value="Pakistan">Pakistan</option>
        <option class="u" value="India">India</option>
        <option class="u" value="Iran">Iran</option>
        <option class="u" value="Iraq">Iraq</option>
        <option class="u" value="America">America</option>
        <option class="u" value="Canada">Canada</option>
      </select>
      <p class="countryselect">Country</p>
</div>


<div class="deptTime">
  <h4 class="deptText">Departure Date and Time</h4>
  <input type="date" name="departuredate" class="month">
  <input type="time" name="departuretime"  class="time">
  <p class="mt">Select Date</p>
  <p class="dt">Select Time</p>
</div>


<div class="retTime">
  <h4 class="deptText">Return Date and Time</h4>
  <input type="date"  name="returndate"  class="month">
  <input type="time"  name="returntime" class="time">
  <p class="mt">Select Date</p>
  <p class="dt">Select Time</p>
</div>

<div class="depart1">
  <h4 class="departing"> Departing From</h4>
  <select id="list2" name="departingfromcity">
        <option class="u" value="none">--Please Select</option>
        <option class="u" value="Lahore">Lahore</option>
        <option class="u" value="Multan">Multan</option>
        <option class="u" value="Rahim Yar Khan">Rahim Yar Khan</option>
        <option class="u" value="Quetta">Quetta</option>
        <option class="u" value="Islamabad">Islamabad</option>
        <option class="u" value="Karachi">Karachi</option>
      </select>
      <!-- <input type="text" placeholder="Enter City Name" class="city2"> -->
      <p class="city2t">City</p>
      <!-- <p class="countryselecttext">City</p> -->
</div>

<div class="depart1">
  <h4 class="departing">Destination</h4>
  <select id="list2" name="destinationcity">
    <option class="u" value="none">--Please Select</option>
    <option class="u" value="Lahore">Lahore</option>
    <option class="u" value="Multan">Multan</option>
    <option class="u" value="Rahim Yar Khan">Rahim Yar Khan</option>
    <option class="u" value="Quetta">Quetta</option>
    <option class="u" value="Islamabad">Islamabad</option>
    <option class="u" value="Karachi">Karachi</option>
  </select>
      <!-- <input type="text" placeholder="Enter City Name" class="city2"> -->
      <p class="city2t">City</p>
      <!-- <p class="countryselecttext" >Country</p> -->
</div>


<div class="depart1">
  <h4 class="departing1">Airline</h4>
  <select id="list2" name="airline">
        <option class="u" value="none">--Select Airline</option>
        <option class="u" value="Airline1">Airline1</option>
        <option class="u" value="Airline2">Airline2</option>
        <option class="u" value="Airline3">Airline3</option>
        <option class="u" value="Airline4">Airline4</option>
        <option class="u" value="Airline5">Airline5</option>
        <option class="u" value="Airline6">Airline6</option>
      </select>
</div>

<div class="paymentdiv">
<h4 class="paymentHeading">Select a suitable Payment Method</h4>
<input class="pr" name="payment" value="CreditCard" type="radio">
<label class="pr" >Credit/Debit Card</label>
<br>
<input class="pr" name="payment" value="Paypal" type="radio">
<label class="pr" >Paypal</label>
<br>
<input type="text" class="card_text" name= "cardnumber" placeholder="Enter Card Number">

      <button type="submit" class="login-button2" name="luggage" class="login_link" onclick="Luggage()">Luggage Selection</button>
      <button type="submit" class="PricePlan" name="priceplan" class="login_link" onclick="PricePlan()">Price Plan</button>
</div>

  <hr class="line">
  <button type="submit" name="reserveflight" class="login-button" class="login_link" onclick="ReserveFlight()">Reserve Flight</button>
  <button type="button" name="back" class="back-button" class="login_link" onclick="Previous()">Back</button>
  
</form>
</div>


<script>
function ReserveFlight(){
  window.open(
  "/Airline/Ticketing/thanks.php", "_self");
}

function Luggage() {
    window.open(
    "Luggage.php", "_self");
}

function PricePlan() {
    window.open(
    "price.php", "_self");
}

function Previous() {
    window.open(
    "/Airline/Ticketing/ticketing.php", "_self");
}
  </script>
</body>
</html>
