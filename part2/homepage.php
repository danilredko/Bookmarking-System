<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script_for_part2.js'></script>
  </head>
  <body>

    <button onclick="window.location.href='logout.php'">Log Out</button>

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

      $user = $_SESSION['username'];

      echo "<h2 style='text-align: center;'>Welcome to the system, ". $_SESSION['username'] . " !</h2>";

      $sql_show_chapters = "SELECT chapter_name FROM chapter where username='$user'";

      $list_of_chapters = mysqli_query($conn, $sql_show_chapters);

      $row_num = 0;

      if(mysqli_num_rows($list_of_chapters) > 0){

        while ($row = mysqli_fetch_assoc($list_of_chapters)) {
          echo "<div class='url_container' style='text-align:center; padding-bottom: 20px;'>";
          echo "<a style='font-size: 30px;' href=", "lesson.php?q=", $row['chapter_name']   ,">", $row['chapter_name'], "</a>";
          echo "</div>";

        }
      }else{
        echo "No chapters ";
      }


    }
    mysqli_close($conn);

    ?>
    <div class="utl_container">

    <p>You can add files to the system for review by an administrator.
    Click <b>Browse</b> to select the file you'd like to upload,
    and then click <b>Upload</b>.</p>
  </div>

    <form action="read_file.php" method="POST" enctype="multipart/form-data">
      <div class="container">

        <input  style ='width:50%; font-size:17px;   background-color: #4CAF50;' type="file" name="ufile" \>
      </div>
      <div class="container">

        <input style ='width:50% ; font-size:17px;  background-color: #4CAF50;' type="submit" value="Upload" \>
      </div>

    </form>








  </body>


</html>
