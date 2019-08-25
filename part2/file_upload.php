<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script_for_part2.js'></script>
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

      echo "<h2>Welcome to fthe system, ". $_SESSION['username'] . " !</h2>";

    }
    mysqli_close($conn);

    ?>


   <p>You can add files to the system for review by an administrator.
   Click <b>Browse</b> to select the file you'd like to upload,
   and then click <b>Upload</b>.</p>

   <form action="read_file.php" method="POST"
         enctype="multipart/form-data">

       <input type="file" name="ufile" \>
       <input type="submit" value="Upload" \>

   </form>



  </body>


</html>
