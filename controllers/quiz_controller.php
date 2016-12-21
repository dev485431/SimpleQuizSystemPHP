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
        if (isset($_GET['page']) && !empty($_GET['page']) && filter_var($_GET['page'], FILTER_VALIDATE_INT)
            && $_GET['page'] >= Config::PAGINATION_START_PAGE && $_GET['page'] <= $numberOfPages
        ) {
            $pageNumber = $_GET['page'];
        }
        $quizzes = $this->quizService->getAllQuizzes($pageNumber);
        require_once('views/quizzes/all_quizzes.php');
    }
}

?>