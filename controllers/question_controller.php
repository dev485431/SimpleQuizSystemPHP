<?php

class QuestionController
{

    private $questionService;
    private $quizService;

    public function __construct()
    {
        $this->questionService = new QuestionService();
        $this->quizService = new QuizService();
    }

    public function addQuestion()
    {
        if (isset($_REQUEST['quizId']) && ValidationUtils::isSetAsInt($_REQUEST['quizId'])) {
            $quizId = $_REQUEST['quizId'];
            $quiz = $this->quizService->getQuizById($quizId);
        } else {
            call('pages', 'error');
        }
        require_once('views/questions/add_question.php');
    }

}
