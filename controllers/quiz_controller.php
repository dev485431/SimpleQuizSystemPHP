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
        if (isset($_POST['quizName']) || isset($_POST['quizCategoryId']) || isset($_POST['quizDescription'])) {
            $quizName = $_POST['quizName'];
            $quizCategoryId = $_POST['quizCategoryId'];
            $quizDescription = $_POST['quizDescription'];

            if (ValidationUtils::isEmpty($quizName) || ValidationUtils::isEmpty($quizCategoryId) || ValidationUtils::isEmpty
                ($quizDescription)
            ) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::hasCorrectLength(Config::QUIZ_NAME_MIN, Config::QUIZ_NAME_MAX,
                $quizName)
            ) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.name.wrong.length'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::hasCorrectLength(Config::QUIZ_DESCRIPTION_MIN, Config::QUIZ_DESCRIPTION_MAX,
                $quizDescription)
            ) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.description.wrong.length'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_ALPHANUM_DASH_UNDERSCORE, $quizName)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.name.wrong.pattern'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_ALPHANUM_DASH_UNDERSCORE, $quizDescription)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.description.wrong.pattern'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::isSetAsInt($quizCategoryId)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.quiz.category.not.integer'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            }
            // DOES CATEGORY ID EXIST IN DB
            // DOES THE QUIZ NAME EXIST IN DB?

        }
        require_once('views/quiz/add_quiz.php');
    }
}

?>