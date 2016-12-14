<?php

class Messages
{
    const MESSAGES = array(
        'no.message.found' => 'ERR: There is no message specified for this key',
        'username.password.empty' => 'Username and password cannot be empty',
        'success.added.user' => 'New user added successfully',
        'error.adding.user' => 'Unable to add new user',
        'error.already.signed.in' => 'You are already signed in',
    );

    public static function get($key)
    {
        if (array_key_exists($key, self::MESSAGES)) {
            return self::MESSAGES[$key];
        } else {
            return self::MESSAGES['no.message.found'];
        }
    }
}

?>