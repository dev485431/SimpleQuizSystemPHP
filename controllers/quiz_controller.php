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
        $pageNumber = Config::PAGINATION_START_PAGE;
        $numberOfPages = DbUtils::calculateNumberOfPages($this->quizService->getAllQuizzesCount(), Config::PAGINATION_ITEMS_PER_PAGE);
        if (ValidationUtils::isSetAsInt($_GET['page']) && $_GET['page'] >= Config::PAGINATION_START_PAGE && $_GET['page'] <= $numberOfPages
        ) {
            $pageNumber = $_GET['page'];
        }
        $quizzes = $this->quizService->getAllQuizzes($pageNumber);
        require_once('views/quiz/all_quizzes.php');
    }

    public function showQuizDetails()
    {
        $quizId = null;
        if (ValidationUtils::isSetAsInt($_GET['quizId'])) {
            $quizId = $_GET['quizId'];
        } else {
            RedirectionUtils::redirectTo(RedirectionUtils::URL_ERROR);
        }
        $quiz = $this->quizService->getQuizById($quizId);
        require_once('views/quiz/quiz_details.php');
    }

    public function addNewQuiz()
    {
        $step = 1;
        if (ValidationUtils::isSetAsInt($_GET['step'])) {
            $step = $_GET['step'];
        }

        switch ($step) {
            case 1:
                require_once('views/quiz/add_quiz_step1.php');
                break;

            case 2:
                require_once('views/quiz/add_quiz_step2.php');
                break;

            case 3:





                require_once('views/quiz/add_quiz_step3.php');
                break;

            default:
                call('pages', 'error');
        }
    }
}

?>