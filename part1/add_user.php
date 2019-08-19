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

$new_username = mysqli_real_escape_string($conn, $_POST['username']);
$new_password = mysqli_real_escape_string($conn, $_POST['psw']);


$sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: bookmarks.php');
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

</body>
</html>
