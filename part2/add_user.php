<!DOCTYPE html>
<html>
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

$new_username = mysqli_real_escape_string($conn, $_POST['username']);
$new_password = mysqli_real_escape_string($conn, $_POST['psw']);


$sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
$result = mysqli_query($conn, $sql);
if ($result) {
    session_start();
    $_SESSION['username'] = $new_username;
    header('Location: homepage.php');
    echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // header('Location: welcome_learning.php');

}

mysqli_close($conn);

?>

</body>
</html>
