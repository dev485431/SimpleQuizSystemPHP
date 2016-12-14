<?php

class Messages
{
    const ERR_NO_MESSAGE = 'ERR: There is no message specified for this key';
    const MESSAGES = array(
        'error.username.password.empty' => 'Username and password cannot be empty',
        'success.added.user' => 'New user added successfully',
        'error.adding.user' => 'Unable to add new user. Try again later.',
        'error.already.signed.in' => 'You are already signed in',
        'error.username.taken' => 'This username is already taken'
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
