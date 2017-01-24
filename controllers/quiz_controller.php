<?php

class QuizController
{

    private $quizService;
    private $categoryService;
    private $questionService;
    private $scoreService;
    private $formValidation;

    public function __construct()
    {
        $this->quizService = new QuizService();
        $this->categoryService = new CategoryService();
        $this->questionService = new QuestionService();
        $this->scoreService = new ScoreService();
        $this->formValidation = new FormValidation();
    }

    public function showAllQuizzes()
    {
        $scoreService = $this->scoreService;
        $categoryService = $this->categoryService;
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

        if (isset($_POST['quizTile']) || isset($_POST['quizCategoryId']) || isset($_POST['quizDescription']) || isset
            ($_POST['quizIsEnabled'])
        ) {
            $quizTitle = $_POST['quizTile'];
            $quizCategoryId = $_POST['quizCategoryId'];
            $quizDescription = $_POST['quizDescription'];
            $quizIsEnabled = isset($_POST['quizIsEnabled']) ? true : false;

            if ($this->formValidation->validateQuizForm($quizTitle, $quizDescription, $quizCategoryId)) {
                $newQuiz = new Quiz($quizTitle, $quizDescription, $quizIsEnabled, $quizCategoryId);

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

    public function doQuiz()
    {
        $quizId = null;
        if (ValidationUtils::isSetAsInt($_GET['quizId'])) {
            $quizId = $_GET['quizId'];
        } else {
            call('pages', 'error');
        }

        $numberOfQuestions = $this->quizService->getNumberOfQuizQuestions($quizId);
        $questionNumber = ValidationUtils::isSetAsInt($_GET['questionNumber']) && $_GET['questionNumber'] >= 1 ? $_GET['questionNumber'] : Config::DEFAULT_START_QUESTION_NUM;
        if ($questionNumber == Config::DEFAULT_START_QUESTION_NUM) {
            $_SESSION['currentScore'] = 0;
        }

        if (isset($_POST['answer']) && !ValidationUtils::isEmpty($_POST['answer'])) {
            $selectedAnswerId = $_POST['answer'];
            $previousQuestion = $this->questionService->getQuestionByNumberAndQuizId($questionNumber - 1, $quizId);
            foreach ($previousQuestion->getAnswers() as $answer) {
                if ($selectedAnswerId == $answer->getAnswerId() && $answer->getIsCorrect() == true) {
                    $_SESSION['currentScore'] += 1;
                }
            }
        }

        if ($questionNumber > $numberOfQuestions) {
            $quiz = $this->quizService->getQuizById($quizId);
            $this->scoreService->saveUserScore($_SESSION['userId'], $quizId, $_SESSION['currentScore']);
            require_once('views/quiz/quiz_congrats.php');
            $_SESSION['currentScore'] = 0;
            exit();
        }

        $question = $this->questionService->getQuestionByNumberAndQuizId($questionNumber, $quizId);
        require_once('views/quiz/quiz_question.php');
    }

    public function editQuiz()
    {
        $quizId = null;
        if (ValidationUtils::isSetAsInt($_GET['quizId'])) {
            $quizId = $_GET['quizId'];
        } else {
            call('pages', 'error');
        }
        $editedQuiz = $this->quizService->getQuizById($quizId);
        $categories = $this->categoryService->getAllCategories();

        if (isset($_POST['quizTile']) || isset($_POST['quizCategoryId']) || isset($_POST['quizDescription']) || isset
            ($_POST['quizIsEnabled'])
        ) {
            $quizTitle = $_POST['quizTile'];
            $quizCategoryId = $_POST['quizCategoryId'];
            $quizDescription = $_POST['quizDescription'];
            $quizIsEnabled = isset($_POST['quizIsEnabled']) ? true : false;

            if ($this->formValidation->validateQuizForm($quizTitle, $quizDescription, $quizCategoryId)) {
                $updatedQuiz = Quiz::createQuizWithId($quizId, $quizTitle, $quizDescription, $quizIsEnabled, $quizCategoryId);

                if ($this->quizService->editQuiz($updatedQuiz)) {
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.edited.quiz'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.editing.quiz'));
                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }

        require_once('views/quiz/edit_quiz.php');
    }

}

?>
