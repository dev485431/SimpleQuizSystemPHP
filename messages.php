<?php

class Messages
{
    #Statuses for messages
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';
    const STATUS_ERROR = 'error';

    const ERR_NO_MESSAGE = 'APPLICATION ERROR: There is no message specified for this key';
    const MESSAGES = array(
        'error.empty.form.fields' => 'Please fill in all the form fields',
        'success.added.user' => 'New user added successfully',
        'error.wrong.username.password' => 'Wrong username or password',
        'success.log.in' => 'You were successfully logged in',
        'error.adding.user' => 'Unable to add new user. Try again later.',
        'error.already.signed.in' => 'You are already signed in',
        'error.username.taken' => 'This username is already taken',
        'error.username.wrong.length' => 'Username length must be between ' . Config::MIN_USERNAME_LENGTH . ' and ' .
            Config::MAX_USERNAME_LENGTH . ' characters',
        'error.username.wrong.pattern' => 'Username can contain only letters, numbers, underscores, dashes and spaces',
        'error.password.wrong.length' => 'Password length must be between ' . Config::MIN_PASS_LENGTH . ' and ' .
            Config::MAX_PASS_LENGTH . ' characters',
        'error.password.wrong.pattern' => 'Password must contain at least one lowercase character, uppercase character, digit and special character',
        'error.quiz.name.wrong.length' => 'Quiz name must be between ' . Config::QUIZ_NAME_MIN . ' and ' .
            Config::QUIZ_NAME_MAX . ' characters',
        'error.quiz.description.wrong.length' => 'Quiz description must be between' . Config::QUIZ_DESCRIPTION_MIN . ' and ' .
            Config::QUIZ_DESCRIPTION_MAX . ' characters',
        'error.quiz.name.wrong.pattern' => 'Quiz name can contain only letters, numbers, underscores, dashes and spaces',
        'error.quiz.description.wrong.pattern' => 'Quiz description can contain only letters, numbers, underscores, dashes and spaces',
        'error.quiz.category.not.integer' => 'Invalid quiz category',
        'success.added.quiz' => 'New quiz was added successfully',
        'error.adding.quiz' => 'Unable to add new quiz. Try again later.',
        'error.question.wrong.length' => 'Question length must be between' . Config::QUESTION_LENGTH_MIN . ' and ' .
            Config::QUESTION_LENGTH_MAX . ' characters',
        'error.answer.wrong.length' => 'Answer length must be between' . Config::ANSWER_LENGTH_MIN . ' and ' .
            Config::ANSWER_LENGTH_MAX . ' characters',
        'success.added.question' => 'New question was added successfully',
        'error.adding.question' => 'Unable to add new question',
        'error.category.name.wrong.length' => 'Category name must be between' . Config::CATEGORY_NAME_MIN . ' and ' .
            Config::CATEGORY_NAME_MAX . ' characters',
        'error.category.desc.wrong.length' => 'Category description must be between' .
            Config::CATEGORY_DESCRIPTION_MIN . ' and ' . Config::CATEGORY_DESCRIPTION_MAX . ' characters',
        'error.category.name.exists' => 'This category name already exists',
        'success.added.category' => 'New category was added successfully',
        'error.adding.category' => 'Unable to add new category',
        'success.edited.quiz' => 'Successfully edited the quiz',
        'error.editing.quiz' => 'Unable to edit the quiz. You need to change some data.',
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
