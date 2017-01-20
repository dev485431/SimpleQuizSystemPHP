<?php

class QuizController
{

    private $quizService;
    private $categoryService;
    private $formValidation;

    public function __construct()
    {
        $this->quizService = new QuizService();
        $this->categoryService = new CategoryService();
        $this->formValidation = new FormValidation();
    }

    public function showAllQuizzes()
    {
        $pageNumber = Config::PAGINATION_START_PAGE;
        $numberOfPages = DbUtils::calculateNumberOfPages($this->quizService->getAllQuizzesCount(), Config::PAGINATION_ITEMS_PER_PAGE);
        if (ValidationUtils::isSetAsInt($_GET['page']) && $_GET['page'] >= Config::PAGINATION_START_PAGE && $_GET['page'] <= $numberOfPages
        ) {
            $pageNumber = $_GET['page'];
        }
        $quizService = $this->quizService;
        $quizzes = $this->quizService->getQuizzesByPageNumber($pageNumber);
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

    public function addQuiz()
    {
        $categories = $this->categoryService->getAllCategories();

        if (isset($_POST['quizTile']) || isset($_POST['quizCategoryId']) || isset($_POST['quizDescription'])) {
            $quizTitle = $_POST['quizTile'];
            $quizCategoryId = $_POST['quizCategoryId'];
            $quizDescription = $_POST['quizDescription'];

            if ($this->formValidation->validateAddQuizForm($quizTitle, $quizDescription, $quizCategoryId)) {
                $newQuiz = new Quiz($quizTitle, $quizDescription, Config::DEFAULT_QUIZ_ENABLED, $quizCategoryId);

                if ($this->quizService->addQuiz($newQuiz)) {
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.added.quiz'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.adding.quiz'));
                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }
        require_once('views/quiz/add_quiz.php');
    }

    public function startQuiz($quizId)
    {

    }

}

?>
