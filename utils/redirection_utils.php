<?php

class RedirectionUtils
{

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
