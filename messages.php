<?php

class Messages
{
    #Statuses for messages
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';
    const STATUS_ERROR = 'error';

    const ERR_NO_MESSAGE = 'APPLICATION ERROR: There is no message specified for this key';
    const MESSAGES = array(
        'error.username.password.empty' => 'Username and password cannot be empty',
        'success.added.user' => 'New user added successfully',
        'error.adding.user' => 'Unable to add new user. Try again later.',
        'error.already.signed.in' => 'You are already signed in',
        'error.username.taken' => 'This username is already taken',
        'error.username.wrong.pattern' => 'Username can contain only letters, numbers, underscores and dashes',
        'error.username.wrong.length' => 'Username length must be between ' . Config::MIN_USERNAME_LENGTH . ' and ' .
            Config::MAX_USERNAME_LENGTH . ' characters'
    );

    public static function get($key)
    {
        if (array_key_exists($key, self::MESSAGES)) {
            return self::MESSAGES[$key];
        } else {
            return self::ERR_NO_MESSAGE;
        }
    }
}

?>
