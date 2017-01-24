<?php
$controllers = array('pages' => ['home', 'error', 'mainMenu'],
    'security' => ['signUp', 'signIn', 'logOut'],
    'quiz' => ['showAllQuizzes', 'showQuizDetails', 'addQuiz', 'doQuiz', 'editQuiz'],
    'question' => ['addQuestion'],
    'category' => ['addCategory'],
    'score' => ['quizScores', 'showRanking']
);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}

function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'security':
            require_once('models/user.php');
            require_once('service/user_service.php');
            require_once('utils/validation_utils.php');
            $controller = new SecurityController();
            break;
        case 'quiz':
            require_once('models/quiz.php');
            require_once('models/category.php');
            require_once('models/question.php');
            require_once('models/answer.php');
            require_once('service/quiz_service.php');
            require_once('service/category_service.php');
            require_once('service/question_service.php');
            require_once('service/score_service.php');
            require_once('validation/form_validation.php');
            require_once('utils/validation_utils.php');
            $controller = new QuizController();
            break;
        case 'question':
            require_once('models/quiz.php');
            require_once('models/question.php');
            require_once('models/answer.php');
            require_once('service/question_service.php');
            require_once('service/quiz_service.php');
            require_once('validation/form_validation.php');
            require_once('utils/validation_utils.php');
            $controller = new QuestionController();
            break;
        case 'category':
            require_once('models/category.php');
            require_once('service/category_service.php');
            require_once('validation/form_validation.php');
            require_once('utils/validation_utils.php');
            $controller = new CategoryController();
            break;
        case 'score':
            require_once('models/top_score.php');
            require_once('models/quiz.php');
            require_once('service/score_service.php');
            require_once('service/quiz_service.php');
            require_once('utils/validation_utils.php');
            $controller = new ScoreController();
            break;
    }

    $controller->{$action}();
}

?>
