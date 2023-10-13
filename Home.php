<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- animate -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- styles -->
  <link rel="stylesheet" href="styles.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

  <title>Jet Set Go</title>
</head>

<body>
  <div class="header">
    <button type="submit" onclick="home()" class="home"><i class="fa fa-plane" style="font-size:36px;"></i><i>Jet Set Go</i> <br />
      <hr class="plane-line" />
      <p class="travelagency">TRAVEL AGENCY</p>
    </button>

    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn ">
        <p class="pbtn" onclick="Home()">HOME </p>
      </button>

      <button type="button" class="btn ">
      <p class="pbtn" onclick="Ticketing()" >TICKETING </p>
      </button>
      <button type="button" class="btn ">
        <p class="pbtn"  onclick="RoomReservations()">Room Reservations</p>
      </button>
      <button type="button" class="btn ">
        <p class="pbtn"  onclick="Booking()">MY BOOKINGS </p>
      </button>
      <button type="button" class="btn ">
        <p class="pbtn"  onclick="Feedback()">FEEDBACK </p>
      </button>
    </div>
    <button type="button" class="signup-button" class="signup_link" onclick="signup()"> Sign up</button>
    <button type="button" class="login-button" class="login_link" onclick="Login()"> Login</button>
  </div>




  <div class="module darken">
    <h1 class="pictext">Your Gateway To The World.</h1>
    <h4 class="pictext2">A little extra context to explain your unique value.</h4>
    <button type="button" onclick="signup()" class="learn-button">Start Journey</button>
  </div>

  <div class="mountains">
    <img class="img1" src="https://d1h0qti89a78h.cloudfront.net/client-web/engines-dist/website-engine/travefy-website-preview/assets/images/azure/default-content-aside-left-image-ac0da35cbbf2ed351f209a1483aa91f6.jpg" alt="mountain">
    <h2 class="img1-heading">Luxurious Travels.</h2>
    <p class="img1-optional">Have a good journey.</p>
    <p class="img1-text">Here is space for you to give visitors a glimpse into what you are offering. Pairing this photograph with supporting paragraph will reinforce your message.</p>

    <div class="mountains">
      <img class="img2" src="images/mountain2.jpg" alt="mountain2">
      <h2 class="img2-heading">Discover the exquisite.</h2>
      <p class="img2-optional">Have a good journey.</p>
      <p class="img2-text">Here is space for you to give visitors a glimpse into what you are offering.<br> Pairing this photograph with supporting paragraph will reinforce your <br> message.</p>
    </div>
  </div>

  <div class="SnowMountainDiv">
    <img class="SnowMountain" src="images/SnowMountain.jpg" alt="snow mountain">
  </div>

  <div class="contactt">
    <img class="contact-img" src="images/contact.jpg" alt="">
    <div class="contact-div">
      <h1 class="contact-heading"><b>Contact Us</b></h1>
      <h3 class="contact-heading2"><b>Company Name</b></h3>
      <p class="contact-text">151 N. 8th Street
        <br>
        Omaha, NE 68124
        <br>
        <a class="hovercolor" href="">+1-555-123-4567</a>
        <br>
        <a class="hovercolor" href="">Info@Agency.com</a>
      </p>
      <p class="last-text">Fill out the below form to connect with us!</p>
        <button class="contactt-button" type="button" >Send Us A Message</button>
    </div>
  </div>

  <div class="footer">
<a class="footer-link1" href="#">About</a>
<a class="footer-link2" href="#">Team</a>
<a class="footer-link3" href="#">Destinations</a>

<button type="button" class="footer-btn">Contact Us</button>
<img class="footer-fb h" src="https://img.icons8.com/material-outlined/24/000000/facebook-f.png"/>
<img  class="footer-twitter h" src="https://img.icons8.com/material-rounded/24/000000/twitter.png"/>
<img class="footer-insta h" src="https://img.icons8.com/material-rounded/24/000000/instagram-new.png"/>
  </div>


  <script>
  function Home() {
      window.open(
      "Home.php", "_self");
  }

  function home(){
    window.open("/Airline/Home.php","_self");
  }

      function signup() {
          window.open(
          "signup/signup.php", "_self");
      }

      function Login() {
          window.open(
          "login/login.php", "_blank");
      }

      function Feedback() {
          window.open(
          "Feedback/feedback.php", "_blank");
      }

      function Ticketing() {
          window.open(
          "Ticketing/ticketing.php", "_blank");
      }

      function RoomReservations() {
          window.open(
          "reservations/reservations.php", "_blank");
      }

      function Booking(){
        window.open(
        "bookings/booking.php", "_blank");
      }
  </script>
</body>

</html>
