

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

$q = $_REQUEST['q'];

echo $q;

mysqli_close($conn);

?>
