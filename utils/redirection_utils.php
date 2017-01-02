<?php

class RedirectionUtils
{

    const URL_PATH_MAIN_MENU = '?controller=pages&action=mainMenu';
    const URL_ERROR = '?controller=pages&action=error';
    const REFRESH_TIME_ZERO = 0;

    public static function redirectTo($location)
    {
        header('Location: ' . $location);
        exit();
    }

    public static function refreshPage($seconds)
    {
        header('Refresh:' . $seconds);
        exit();
    }

}
