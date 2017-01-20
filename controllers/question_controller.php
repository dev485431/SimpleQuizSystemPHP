<?php

class QuestionController
{

    private $questionService;
    private $quizService;
    private $formValidation;

    public function __construct()
    {
        $this->questionService = new QuestionService();
        $this->quizService = new QuizService();
        $this->formValidation = new FormValidation();
    }

    public function addQuestion()
    {
        if (isset($_GET['quizId']) && ValidationUtils::isSetAsInt($_GET['quizId'])) {
            $quizId = $_GET['quizId'];
            $quiz = $this->quizService->getQuizById($quizId);
        } else {
            call('pages', 'error');
        }

        if (isset($_POST['question']) && isset($_POST['answer1']) && isset($_POST['answer2']) && isset($_POST['answer3']) && isset($_POST['correctAnswer'])) {
            $question = $_POST['question'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];
            $answer3 = $_POST['answer3'];
            $correctAnswer = $_POST['correctAnswer'];

            if ($this->formValidation->validateAddQuestionForm($question, $answer1, $answer2, $answer3, $correctAnswer)) {
                $answers = array($answer1, $answer2, $answer3);
                $a = null;
                for ($i = 0; $i < sizeof($answers); $i++) {
                    if ($i != $correctAnswer) {
                        $a = new Answer($answers[$i], false);
                    } else {
                        $a = new Answer($answers[$i], true);
                    }
                    $answers[$i] = $a;
                }
                $newQuestion = new Question($question, $answers);
                if ($this->questionService->addQuestion($newQuestion)) {
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.added.question'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
//                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.adding.question'));
//                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }

        require_once('views/questions/add_question.php');
    }

}
