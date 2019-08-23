
<!DOCTYPE html>
<html>
<body>
<h1>Hello </h1>
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

  echo "<h2>Welcome to the system, ". $_SESSION['username'] . " !</h2>";

  $user = $_SESSION['username'];

  $sql_add_chapter = "INSERT INTO chapter (chapter_id, username) VALUES (NULL, '$user')";

  $xml=simplexml_load_file("lessons/unit1.xml") or die("Error: Cannot create object");

  $result = mysqli_query($conn, $sql_add_chapter);
  if ($result) {

      echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

  }


  for ($i=0; $i < count($xml->chapter->chapter_name); $i++ ){

    echo "Chapter Name: ", $xml->chapter->chapter_name[$i] ,  "<br>";
    echo "Chapter Content: ", $xml->chapter->content[$i] ,  "<br>";



  }

}




mysqli_close($conn);
?>

</body>
</html>
