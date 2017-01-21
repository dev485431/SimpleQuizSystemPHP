<?php

class SecurityController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function signIn()
    {
        if ($this->isUserAlreadySignedIn()) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.already.signed.in'));
            RedirectionUtils::redirectTo(Config::APP_ROOT);
        } else if (isset($_POST['username']) || isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (ValidationUtils::isEmpty($username) || ValidationUtils::isEmpty($password)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else {
                $user = $this->userService->authorizeUser($username, $password);
                if ($user) {
                    $_SESSION['username'] = $user->getUsername();
                    $_SESSION['userRole'] = $user->getRole();
                    $_SESSION['userId'] = $user->getUserId();
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.log.in'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT . RedirectionUtils::URL_PATH_MAIN_MENU);
                } else {
                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.wrong.username.password'));
                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }
        require_once('views/security/signin.php');
    }

    public function signUp()
    {
        if ($this->isUserAlreadySignedIn()) {
            MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.already.signed.in'));
            RedirectionUtils::redirectTo(Config::APP_ROOT);
        } else if (isset($_POST['username']) || isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (ValidationUtils::isEmpty($username) || ValidationUtils::isEmpty($password)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.empty.form.fields'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::hasCorrectLength(Config::MIN_USERNAME_LENGTH, Config::MAX_USERNAME_LENGTH,
                $username)
            ) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.username.wrong.length'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::hasCorrectLength(Config::MIN_PASS_LENGTH, Config::MAX_PASS_LENGTH,
                $password)
            ) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.password.wrong.length'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_ALPHANUM_DASH_UNDERSCORE, $username)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.username.wrong.pattern'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_PASSWORD, $password)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.password.wrong.pattern'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else if ($this->userService->usernameExists($username)) {
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.username.taken'));
                RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
            } else {
                $newUser = new User($username, $password, Config::DEFAULT_ROLE);

                $userId = null;
                if ($userId = $this->userService->addUser($newUser)) {
                    $_SESSION['username'] = $newUser->getUsername();
                    $_SESSION['userRole'] = $newUser->getRole();
                    $_SESSION['userId'] = $userId;
                    MessagesUtils::setMessage(Messages::STATUS_SUCCESS, Messages::get('success.added.user'));
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
                    MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.adding.user'));
                    RedirectionUtils::refreshPage(RedirectionUtils::REFRESH_TIME_ZERO);
                }
            }
        }
        require_once('views/security/signup.php');
    }

    public function logOut()
    {
        session_destroy();
        RedirectionUtils::redirectTo(Config::APP_ROOT);
    }

    private function isUserAlreadySignedIn()
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }
}
