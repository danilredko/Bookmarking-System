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


          echo "<h1 style='text-align: center;'>" . $chapter_name . "</h1>";
          echo "<hr>";

          if(mysqli_num_rows($list_of_chapter_content) > 0){

            while ($row = mysqli_fetch_assoc($list_of_chapter_content)) {

                echo "<div class='url_container'" ,  " >";
                echo "<h3>", $row['content_name'], "</h3>";
                echo "<p style='text-align:left;'>", $row['content_text'], "</p>";
                echo "<hr>";
                echo "</div>";

        }


        echo "<h1 style='text-align: center;'> QUIZ </h1>";


        $sql_to_load_quiz = "SELECT * FROM quiz_question WHERE chapter_id='$chapter_id'";

        $list_of_questions = mysqli_query($conn, $sql_to_load_quiz);
        $row_num = 0;
        $right_answers = array();
        if(mysqli_num_rows($list_of_questions) > 0){



          while ($row = mysqli_fetch_assoc($list_of_questions)) {

              echo "<div class='url_container'>";
              echo "<h2>", $row['question'], "</h2>";
              echo "</div>";
              echo "<hr>";


              echo "<div style ='text-align:left;' class='url_container'" ,  " id  = question" .$row_num.    ">";
              $choice = 'choice'. "$row_num";
              $id = 0;
              $id_string = "$row_num"."$id";
              echo "<input type='radio' name=" , $choice, " id = ", $id_string , ">";
              echo "<label id=label", "$id_string >",  $row['option1'] , "</label>";
              echo "<hr>";

              $id= $id + 1;
              $id_string = "$row_num"."$id";
              echo "<input type='radio' name=" , $choice, " id = ", $id_string , ">";
              echo "<label id=label", "$id_string >",  $row['option2'] , "</label>";
              echo "<hr>";



              $id= $id + 1;
              $id_string = "$row_num"."$id";
              echo "<input type='radio' name=" , $choice, " id = ", $id_string , ">";
              echo "<label id=label", "$id_string >",  $row['option3'] , "</label>";
              echo "<hr>";

              $id= $id + 1;
              $id_string = "$row_num"."$id";
              echo "<input type='radio' name=" , $choice, " id = ", $id_string , ">";
              echo "<label id=label", "$id_string >",  $row['option4'] , "</label>";
              echo "<hr>";


              echo "</div>";

              $row_num = $row_num + 1;
              $right_answer = $row['right_option'];
              array_push($right_answers, $right_answer);

      }


      $str_to_pass = json_encode($right_answers);

      echo "<button onclick='CheckQuiz($str_to_pass)'> CHECK </button>";




      }




        }else{

            echo "No content";
        }


    }











  }


    mysqli_close($conn);

    ?>


  </body>


</html>
