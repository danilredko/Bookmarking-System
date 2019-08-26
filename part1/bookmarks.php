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

    session_start();

    if ( isset( $_SESSION['username'] ) ) {

      echo "<h2>Welcome to the system, ". $_SESSION['username'] . " !</h2>";

      $new = $_SESSION['username'];

      $sql = "SELECT URL FROM bookmarks WHERE user_id='$new'";

      $result = mysqli_query($conn, $sql);

      $row_num = 0;

      if (mysqli_num_rows($result) > 0){


        while($row = mysqli_fetch_assoc($result)){
          $row_num = $row_num + 1;

          echo "<div id=row", $row_num, " class = 'url_container'>";
          echo "<p >" , "URL: <a id=", $row['URL'], " href=https://", $row['URL'],">",  $row['URL'] , "</a></p>";
          echo "<button id='row_button", $row_num, "' class='edit_button' onclick=" , "edit_url(" , "'", $row['URL'] ,"',$row_num)>Edit </button>";
          echo "<button id='delete_row_button", $row_num, "' class='delete_button' onclick=" , "delete_url(" , "'", $row['URL'] ,"',$row_num)>Delete</button>";
          echo "</div>";
      }

    };


    } else {

        header("Location: login.html");
    };

    mysqli_close($conn);

    ?>

  </body>

  <button type="button" id="add_bookmark" style='width:10%' onclick="add_bookmark()">Add Bookmark</button>

</html>
