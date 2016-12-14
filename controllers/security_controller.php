<?php

class SecurityController
{
    const REFRESH_TIME_ZERO = 0;
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
            $_SESSION['returnStatus'] = Config::STATUS_WARNING;
            $_SESSION['returnMessage'] = Messages::get('error.already.signed.in');
            RedirectionUtils::redirectTo(Config::APP_ROOT);
        } else if (isset($_POST['username']) || isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (ValidationUtils::isEmpty($username) || ValidationUtils::isEmpty($password)) {
                $_SESSION['returnStatus'] = Config::STATUS_WARNING;
                $_SESSION['returnMessage'] = Messages::get('error.username.password.empty');
                RedirectionUtils::refreshPage(self::REFRESH_TIME_ZERO);
            } else if ($this->userService->usernameExists($username)) {
                $_SESSION['returnStatus'] = Config::STATUS_WARNING;
                $_SESSION['returnMessage'] = Messages::get('error.username.taken');
                RedirectionUtils::refreshPage(self::REFRESH_TIME_ZERO);
            } else {
                $newUser = new User($username, $password, Config::DEFAULT_ROLE);

                if ($this->userService->addUser($newUser)) {
                    $_SESSION['username'] = $newUser->getUsername();
                    $_SESSION['role'] = $newUser->getRole();
                    $_SESSION['returnStatus'] = Config::STATUS_SUCCESS;
                    $_SESSION['returnMessage'] = Messages::get('success.added.user');
                    RedirectionUtils::redirectTo(Config::APP_ROOT);
                } else {
                    $_SESSION['returnStatus'] = Config::STATUS_ERROR;
                    $_SESSION['returnMessage'] = Messages::get('error.adding.user');
                    RedirectionUtils::refreshPage(self::REFRESH_TIME_ZERO);
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
