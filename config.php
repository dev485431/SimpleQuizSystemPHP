<?php

class Config
{

    const APP_ROOT = '/php_mvc/';
    const PAGE_TITLE = 'Quiz World';

    #Database config
    const MYSQL_HOST = 'localhost';
    const MYSQL_PORT = '3306';
    const MYSQL_DB_NAME = 'tk_php_quiz_world';
    const MYSQL_USER = 'root';
    const MYSQL_PASS = '';

    #Registration
    const DEFAULT_ROLE = 'user';
    const MIN_USERNAME_LENGTH = 3;
    const MAX_USERNAME_LENGTH = 20;
    const MIN_PASS_LENGTH = 8;
    const MAX_PASS_LENGTH = 25;

    #Quiz settings
    const DEFAULT_QUIZ_ENABLED = true;
    const QUIZ_NAME_MIN = 1;
    const QUIZ_NAME_MAX = 25;
    const QUIZ_DESCRIPTION_MIN = 1;
    const QUIZ_DESCRIPTION_MAX = 75;
    const QUIZ_QUESTIONS_MIN = 3;
    const QUIZ_QUESTIONS_MAX = 15;
    const QUIZ_ANSWERS_MIN = 2;
    const QUIZ_ANSWERS_MAX = 5;

    #Pagination settings
    const PAGINATION_ITEMS_PER_PAGE = 7;
    const PAGINATION_START_PAGE = 1;
    const PAGINATION_ORDER = 'ASC';
    const PAGINATION_QUIZZES_ORDER_BY = '';

    #Ranking
    const RANKING_DEFAULT_LIMIT = 10;

    #Questions and answers
    const QUESTION_LENGTH_MIN = 1;
    const QUESTION_LENGTH_MAX = 250;
    const ANSWER_LENGTH_MIN = 1;
    const ANSWER_LENGTH_MAX = 250;
    const DEFAULT_START_QUESTION_NUM = 1;

    #Categories
    const CATEGORY_NAME_MIN = 1;
    const CATEGORY_NAME_MAX = 250;
    const CATEGORY_DESCRIPTION_MIN = 1;
    const CATEGORY_DESCRIPTION_MAX = 250;


}

?>
