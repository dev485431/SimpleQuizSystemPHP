<?php

class Messages
{
    #Statuses for messages
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';
    const STATUS_ERROR = 'error';

    const ERR_NO_MESSAGE = 'APPLICATION ERROR: There is no message specified for this key';
    const MESSAGES = array(
        'success.added.user' => 'New user added successfully',
        'error.wrong.username.password' => 'Wrong username or password',
        'success.log.in' => 'You were successfully logged in',
        'error.username.password.empty' => 'Username and password cannot be empty',
        'error.adding.user' => 'Unable to add new user. Try again later.',
        'error.already.signed.in' => 'You are already signed in',
        'error.username.taken' => 'This username is already taken',
        'error.username.wrong.length' => 'Username length must be between ' . Config::MIN_USERNAME_LENGTH . ' and ' .
            Config::MAX_USERNAME_LENGTH . ' characters',
        'error.username.wrong.pattern' => 'Username can contain only letters, numbers, underscores and dashes',
        'error.password.wrong.length' => 'Password length must be between ' . Config::MIN_PASS_LENGTH . ' and ' .
            Config::MAX_PASS_LENGTH . ' characters',
        'error.password.wrong.pattern' => 'Password must contain at least one lowercase character, uppercase character, digit and special character',

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
