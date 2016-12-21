<?php

foreach ($quizzes as $quiz) {

    if ($quiz->getIsEnabled()) {
        echo 'Id: ' . $quiz->getQuizId() . '</br>';
        echo 'Title: ' . $quiz->getTitle() . '</br>';
        echo 'Desc: ' . $quiz->getDescription() . '</br>';
    }
    echo $numberOfPages;
}

