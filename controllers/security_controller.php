<?php

class SecurityController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function logIn()
    {

    }

    public function logOut()
    {
        session_destroy();
        RedirectionUtils::redirectTo(Config::APP_ROOT);
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
                MessagesUtils::setMessage(Messages::STATUS_ERROR, Messages::get('error.username.password.empty'));
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
            } else if (!ValidationUtils::matchesPattern(ValidationUtils::REGEXP_USERNAME, $username)) {
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

                if ($this->userService->addUser($newUser)) {
                    $_SESSION['username'] = $newUser->getUsername();
                    $_SESSION['role'] = $newUser->getRole();
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

    private function isUserAlreadySignedIn()
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }
}
