<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="login_form_container">
      <div class="login_form">
        <h2>Login</h2>




        <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Store in the database
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Use a different variable name for the database password
    $database = "airline";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['login'])) {
        if (empty($email)) {
            echo '
            <script>
                document.querySelector(\'[name="login"]\').disabled = true;
            </script>
            ';
        } else {
            $query = "SELECT email FROM signup WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // $sql = "INSERT INTO `login` (`Email`, `Password`) VALUES ('$email', '$hashedPassword')";
                // $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Data inserted successfully
                    header('Location: /Airline/Ticketing/ticketing.php');
                    exit;
                } else {
                    // Failed to insert data
                    header('Location: /Airline/login/login.php');
                    exit;
                }
            } else {
                // Email does not exist in the signup table
                header('Location: /Airline/login/login.php');
                exit;
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>



        <form action="/Airline/login/login.php" method="post">
        <div class="input_group">
          <i class="fa fa-user"></i>
          <input
            name="email"
            type="email"
            placeholder="E-mail"
            class="input_text"
            autocomplete="off"
          />
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input
            name = "password"
            type="password"
            placeholder="Password"
            class="input_text"
            autocomplete="off"
          />
        </div>
        <div class="button_group" id="login_button">
        <button type="submit" name ="login"><a onclick="Submitted()">Login</a></button>
        </div>
        </form>
        <div class="fotter">
          <a>Forgot Password ?</a>
          <a>SignUp</a>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
    <script>
        function loggedin() {
            window.open(
            "/DB Airline Web Project/clone2.html", "_self");
        }
    </script>

  </body>
</html>
