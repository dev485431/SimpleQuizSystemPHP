
<?php

foreach ($questions as $question) {

    echo 'Id: ' . $question->getquestionId() . '<br>';
    echo 'Question: ' . $question->getQuestion() . '<br>';

    foreach ($question->getAnswers() as $answer) {
        echo 'Answer: ' . $answer->getAnswer();
    }

}
