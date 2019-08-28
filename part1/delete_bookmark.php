
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookmarking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$delete_url = $_REQUEST['delete_url'];
$user = $_SESSION['username'];


if ( isset( $user ) ) {

  $sql = "DELETE FROM bookmarks WHERE user_id='$user' AND URL='$delete_url'";

  $result = mysqli_query($conn, $sql);

  if ($result){

  header("Location: bookmarks.php");

} else{

  echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}


} else{

  echo "Err";

}
mysqli_close($conn);

?>
