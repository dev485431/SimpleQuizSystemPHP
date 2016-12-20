<?php

class QuizController
{

    private $quizService;

    public function __construct()
    {
        $this->quizService = new QuizService();
    }

    public function showAllQuizzes()
    {
        $allQuizzes = $this->quizService->getAllQuizzes();
        require_once('views/quizzes/all_quizzes.php');
    }


}

?>