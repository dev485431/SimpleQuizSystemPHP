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

    #Status and messages
    const STATUS_SUCCESS = 'success';
    const STATUS_WARNING = 'warning';
    const STATUS_ERROR = 'error';

}

?>
