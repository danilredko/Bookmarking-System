<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script.js'></script>
  </head>
  <body>

    <a href="logout.php"> <button type="button"name="button">LogOut</button></a>

    <?php

    $servername = "localhost";
    $username = "danil";
    $password = "danil";
    $dbname = "bookmarking";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Always start this first
    session_start();

    if ( isset( $_SESSION['username'] ) ) {

      echo "<h2>Welcome to the system, ". $_SESSION['username'] . " !</h2>";

      $new = $_SESSION['username'];

      $sql = "SELECT URL FROM bookmarks WHERE user_id='$new'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
          echo "<div class = 'container'>";
          echo "<p style='width:50%;' >" , "URL: <a href=https://", $row['URL'],">",  $row['URL'] , "</a></p>";

          echo "<button class='edit_button' onclick=" , "change_url(" , "'", $row['URL'] ,"'",  ")>Edit </button>";

          echo "<button class='delete_button'>Delete</button>";
          echo "</div>";
      }

    };


    } else {

        header("Location: login.html");
    };

    mysqli_close($conn);

    ?>

  </body>

<button type="button" name="button">CHANGE</button>



</html>
