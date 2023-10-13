<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="bookings.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">

  <title>My Bookings</title>
</head>

<body class="b">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Store in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "airline";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['button'])) {
        if (empty($email)) {
            echo '
            <script>
                document.querySelector(\'[name="button"]\').disabled = true;
            </script>
            ';
        } else {
            // Retrieve data from international_ticket_info table
            $query = "SELECT Departure_Date, Departing_From_Country, Departing_From_City, Destination_Country, Destination_City FROM international_ticket_info WHERE Email = '$email'";
            $query1 = "SELECT MiddleName FROM international_personal_info WHERE Email = '$email'";
            $result = mysqli_query($conn, $query);
            $result1 = mysqli_query($conn, $query1);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Fetch and store the data in variables
            $departureDate = '';
            $departingCountry = '';
            $departingCity = '';
            $destinationCountry = '';
            $destinationCity = '';

            while ($row = mysqli_fetch_assoc($result)){
                $departureDate = $row['Departure_Date'];
                $departingCountry = $row['Departing_From_Country'];
                $departingCity = $row['Departing_From_City'];
                $destinationCountry = $row['Destination_Country'];
                $destinationCity = $row['Destination_City'];
            }
            // Retrieve MiddleName from international_personal_info table
            $query1 = "SELECT MiddleName FROM international_personal_info";
            $result1 = mysqli_query($conn, $query1);

            if (!$result1) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Fetch and store the MiddleName in a variable
            $middleName = '';
            
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $middleName = $row1['MiddleName'];
            }
        }
    }
}
?>


<form action="/Airline/bookings/booking.php" method="post">
<div class="maindiv">
  <button type="submit" onclick="document.location='animate.html'" class="home"><i class="fa fa-plane" style="font-size:36px;"></i><i>Jet Set Go</i> <br />
    <hr class="plane-line" />
    <p class="travelagency">TRAVEL AGENCY</p>
  </button>
  <div class="text">
    <p class="t1">BOOKINGS DETAILS</p>
  </div>
  <hr class="line2">

  <button type="submit" class="btnenter" name="button">Enter</button>
  <div class="textinfo">
  <label class="emi" for="">Email : </label>
  <input class="emi_input" type="email" placeholder="example@gmail.com" name="email">
  <br>
  <h3>Passenger Name :  <?php echo $middleName; ?> </h3>
  <br>
  <h3>Departure Time: <?php echo $departureDate; ?></h3>
  <br>
  <h3>Departure Country: <?php echo $departingCountry; ?> <span class="pn1">Departure City: <?php echo $departingCity; ?></span></h3> 
  <br>
  <h3>Arrival Country: <?php echo $destinationCountry; ?> <span class="pn">Arrival City: <?php echo $destinationCity; ?></span></h3>
</div>

<hr class="line">
<button type="button" class="login-button" class="login_link" onclick="Next()">Back To Home</button>
</form>


<script type="text/javascript">

function Next(){
  window.open(
  "/DB Airline Web Project/clone2.html", "_self");
}
</script>
</body>
</html>
