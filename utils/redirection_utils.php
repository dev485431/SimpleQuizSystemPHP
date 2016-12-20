<?php

class RedirectionUtils
{

    const URL_PATH_MAIN_MENU = '?controller=pages&action=mainMenu';
    const REFRESH_TIME_ZERO = 0;

    public static function redirectTo($location)
    {
        header('Location: ' . $location);
    }

    public static function refreshPage($seconds)
    {
        header('Refresh:' . $seconds);
    }

}
