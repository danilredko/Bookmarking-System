
function CheckQuiz(right_answers){



  console.log(right_answers);

  total = 0;


  if (!!document.getElementById('score_element')) {
        document.getElementById('score_element').remove();
      }

  var number_of_question = right_answers.length;
  var number_of_options = 4;

  for (i = 0; i<number_of_question; i++){


        for (j = 0; j < number_of_options; j++){


            if (document.getElementById(i+""+j).checked){
              console.log("label"+i+""+j);
              console.log(document.getElementById("label"+i+""+j).textContent);
              console.log(right_answers[i]);


              if(document.getElementById("label"+i+""+j).textContent == right_answers[i] ){


                document.getElementById("question"+i).style.backgroundColor = 'green';

                total = total + 1;


              }else{
                document.getElementById("question"+i).style.backgroundColor = 'red';

              }



            }

        }





      };

      console.log('end');

      var score = (total / number_of_question)*100;

      score = parseInt(score);

      var total_element = document.createElement('h1');
      total_element.setAttribute('id', 'score_element');
      total_element.textContent = "SCORE: "+score+" %";
      document.body.appendChild(total_element);


  };
