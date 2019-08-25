<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script_for_part2.js'></script>
  </head>
  <body>

    <h1 style='text-align:center;'>Welcome to Online Learning System!</h1>
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


  <hr>
  </body>


</html>
