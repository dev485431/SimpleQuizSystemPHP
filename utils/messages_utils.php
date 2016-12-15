<?php

class MessagesUtils
{

    public static function setMessage($status, $content)
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['returnStatus'] = $status;
            $_SESSION['returnMessage'] = $content;
        } else {
            echo 'ERROR: Cannot set message. Session is not started.';
        }

    }
}
