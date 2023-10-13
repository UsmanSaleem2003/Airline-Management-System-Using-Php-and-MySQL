<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="signup.css" />
  </head>
  <body>
    <div class="login_form_container">
      <div class="login_form">
        <h2>Sign Up</h2>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  

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

if ((isset($_POST['signup'])))
{
  if(empty($email)){
    echo '
    <script>
      document.querySelector(\'[name="signup"]\').disabled = true;
    </script>
    ';
  }
  else
  {
    $sql = "INSERT INTO  `signup` (`Email`,`Password`) VALUES ('$email', '$hashedPassword')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      // echo "Data inserted successfully";
      header('Location: /Airline/login/login.php');
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

        <form action="/Airline/signup/signup.php" method="post">
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input
            name= "email"
            type="email"
            placeholder="E-mail"
            class="input_text"
            autocomplete="off"
            required
          />
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input
            name="password"
            type="password"
            placeholder="Password"
            class="input_text"
            autocomplete="off"
            required
          />
        </div>
        <div class="button_group" id="login_button">
          <button type="submit" name ="signup"><a onclick="Submitted()">Signup</a></button>
        </div>
        </form>

        <div class="fotter">
          <a>Forgot Password ?</a>
          <a onclick="loginpage()">Login</a>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>

    <script>
        function Submitted() {
            window.open(
            "/DB Airline Web Project/clone2.html", "_self");
        }

        function loginpage(){
          window.open(__dirname + "login.html")
        }
    </script>

  </body>
</html>
