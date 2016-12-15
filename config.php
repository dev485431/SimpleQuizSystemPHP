<?php

class Config
{

    const APP_ROOT = '/php_mvc/';
    const PAGE_TITLE = 'Php Quiz World';

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

}

?>
