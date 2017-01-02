<?php
$controllers = array('pages' => ['home', 'error', 'mainMenu'],
    'security' => ['signUp', 'signIn', 'logOut'],
    'quiz' => ['showAllQuizzes', 'showQuizDetails', 'addNewQuiz']);

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
            require_once('service/quiz_service.php');
            require_once('utils/validation_utils.php');
            $controller = new QuizController();
            break;
    }

    $controller->{$action}();
}

?>
