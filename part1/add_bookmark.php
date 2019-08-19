
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

$new_url = $_REQUEST['new_url'];
$user = $_SESSION['username'];

if ( isset( $user ) ) {

  $sql = "INSERT INTO bookmarks (BookMarkID, user_id, URL) VALUES (NULL, '$user', '$new_url')";

  $result = mysqli_query($conn, $sql);

  if ($result){

  header("Location: bookmarks.php");

} else{

  echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}


};
mysqli_close($conn);

?>
