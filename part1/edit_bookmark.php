

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
$old_url = $_REQUEST['old_url'];
$user = $_SESSION['username'];

$check_sql = "SELECT URL from bookmarks where user_id='$user' and URL='$new_url'";

$chech_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($chech_result) == 0){


if ( isset( $user ) ) {

  $sql = "UPDATE bookmarks SET URL='$new_url' WHERE user_id='$user' AND URL = '$old_url'";

  $result = mysqli_query($conn, $sql);

  if ($result){

  echo $new_url;


} else{

  echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}


}


}else{

  echo 'Err';

}




mysqli_close($conn);

?>
