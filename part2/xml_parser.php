
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

  $xml=simplexml_load_file("lessons/Web Basics.xml") or die("Error: Cannot create object");

  $chapter_name  =  $xml->title;

  $sql_add_chapter = "INSERT INTO chapter (chapter_id, username, chapter_name) VALUES (NULL, '$user', '$chapter_name')";

  $result = mysqli_query($conn, $sql_add_chapter);


  if ($result) {

      echo " New record created successfully ";

      $sql_to_get_chapter_id = "SELECT chapter_id FROM chapter WHERE chapter_name='$chapter_name' AND username='$user'";
      $result_chapter_id = mysqli_query($conn, $sql_to_get_chapter_id);

      if($result_chapter_id){

          $chapter_id = mysqli_fetch_array($result_chapter_id)['chapter_id'];



          for ($i=0; $i < count($xml->chapter->chapter_name); $i++ ){

            // echo "Chapter Name: ", $xml->chapter->chapter_name[$i] ,  "<br>";
            // echo "Chapter Content: ", $xml->chapter->content[$i] ,  "<br>";
            // echo "Chapter ID:", $chapter_id, "<br>";
            $content_text = $xml->chapter->content[$i];
            $content_name = $xml->chapter->chapter_name[$i];
            $sql_to_add_content = "INSERT INTO content(content_id, content_text, chapter_id, content_name) VALUES (NULL, '$content_text', '$chapter_id', '$content_name')";
            $result_adding_content = mysqli_query($conn, $sql_to_add_content);

            if ($result_adding_content){
              echo 'zae';

            }else{

              echo "Error: " . $sql_to_add_content . "<br>" . mysqli_error($conn);
            }

          };


      for($i = 0; $i < count($xml->quiz->questions->question); $i++){


        $text_of_question = $xml->quiz->questions->question[$i]->text_of_question;
        $option1 = $xml->quiz->questions->question[$i]->possible_answer1;
        $option2 = $xml->quiz->questions->question[$i]->possible_answer2;
        $option3 = $xml->quiz->questions->question[$i]->possible_answer3;
        $option4 = $xml->quiz->questions->question[$i]->possible_answer4;
        $right_answer = $xml->quiz->questions->question[$i]->right_answer;

        $sql_to_add_quiz = "INSERT INTO quiz_question(question_id, chapter_id, question,option1, option2, option3, option4, right_option) VALUES(
        NULL,
        '$chapter_id',
        '$text_of_question',
        '$option1',
        '$option2',
        '$option3',
        '$option4',
        '$right_answer' )";

        $result_adding_quiz = mysqli_query($conn, $sql_to_add_quiz);

        if ($result_adding_quiz){
          echo 'zae';

        }else{

          echo "Error: " . $sql_to_add_quiz . "<br>" . mysqli_error($conn);
        }



      };


      }else{

        echo "Error: " . $sql_to_get_chapter_id . "<br>" . mysqli_error($conn);

      }



  header('Location: homepage.php');
  } else {

    echo "Error: " . $sql_add_chapter . "<br>" . mysqli_error($conn);

  }



}



mysqli_close($conn);
?>

</body>
</html>
