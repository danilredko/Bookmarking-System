<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script.js'></script>
  </head>
  <body>



    <?php
    $servername = "localhost";
    $username = "danil";
    $password = "danil";
    $dbname = "learning";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    if ( isset( $_SESSION['username'] ) ) {

      echo "<h2>Welcome to the system, ". $_SESSION['username'] . " !</h2>";

    }
    mysqli_close($conn);

    ?>




  </body>


</html>
