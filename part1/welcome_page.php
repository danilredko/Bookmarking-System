<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script.js'></script>
  </head>
  <body>

    <h1 style='text-align:center;'>Welcome to Bookmarking System!</h1>
    <hr>

    <form action="login.php" method="post">
      <div class="container">

        <h1>Login</h1>
        <p>Type in the your username and password to log in</p>

        <hr>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

      <div class="clearfix">

        <button type="submit" class="loginbtn" >Log In</button>

      </div>

    </div>
    </form>

    <form action="add_user.php" method="post">
      <div class="container">

        <h1>Sign UP</h1>
        <p>Fill the form to create an account</p>
        <hr>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <div class="clearfix">

          <button type="submit" class="signupbtn" onclick="SignUp()">Sign Up</button>

        </div>

    </div>
    </form>
    <hr>

    <h2 style='text-align:center'>Top websites:</h2>


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

    $sql = "SELECT URL, COUNT(*) FROM bookmarks GROUP BY URL ORDER BY COUNT(*) DESC LIMIT 10";

    $result = mysqli_query($conn, $sql);

    $row_num = 0;

    if (mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_assoc($result)){
        $row_num = $row_num + 1;
        echo "<div id=row", $row_num, " class = 'url_container'>";
        echo "<p style='text-align:center;' >" , " <a id=", $row['URL'], " href=https://", $row['URL'],">",  $row['URL'] , "</a></p>";
        echo "</div>";

      }

    };

    mysqli_close($conn);

     ?>
  <hr>
  </body>


</html>
