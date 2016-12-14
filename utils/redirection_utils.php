<?php

class RedirectionUtils
{
    public static function redirectTo($location)
    {
        header('Location: ' . $location);
    }

    public static function refreshPage($seconds)
    {
        header('Refresh:' . $seconds);
    }

}
