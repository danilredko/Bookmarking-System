
<!DOCTYPE html>
<html>
<body>

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

$login_username = mysqli_real_escape_string($conn, $_POST['username']);
$login_password = mysqli_real_escape_string($conn, $_POST['psw']);


$sql = "SELECT username FROM users WHERE username='$login_username' AND password='$login_password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);


if (mysqli_num_rows($result) == 1) {

    echo "<h2>Welcome to the system, ". $login_username . " !</h2>";

} else {
    echo "Wrong password or login";
}

mysqli_close($conn);
?>

</body>
</html>
