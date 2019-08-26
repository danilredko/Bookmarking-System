<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../shared/stylesheet.css">
    <script src='../shared/script_for_part2.js'></script>
  </head>
  <body>


    <button onclick="window.location.href='homepage.php'" >
      Home
    </button>
    <a href="homepage.php" class="button">Home</a>

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

      $user = $_SESSION['username'];

      $chapter_name =  $_REQUEST['q'];

      $sql_to_get_chapter_id = "SELECT chapter_id FROM chapter WHERE chapter_name='$chapter_name' AND username='$user'";
      $result_chapter_id = mysqli_query($conn, $sql_to_get_chapter_id);

      if($result_chapter_id){

          $chapter_id = mysqli_fetch_array($result_chapter_id)['chapter_id'];

          $sql_show_chapter_content = "SELECT content_name, content_text FROM content where chapter_id='$chapter_id'";

          $list_of_chapter_content = mysqli_query($conn, $sql_show_chapter_content);

          echo "";

          if(mysqli_num_rows($list_of_chapter_content) > 0){

            while ($row = mysqli_fetch_assoc($list_of_chapter_content)) {

                echo "<div class='url_container'" ,  " >";
                echo $row['content_name'], "<br>";
                echo $row['content_text'], "<br>";
                echo "</div>";

        }



        }else{

            echo "No content";
        }


    }}






    mysqli_close($conn);

    ?>


  </body>


</html>
