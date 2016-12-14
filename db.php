<?php

require_once 'config.php';

class Db
{
    public static function getConnection()
    {
        $mysql = new mysqli(Config::MYSQL_HOST, Config::MYSQL_USER, Config::MYSQL_PASS, Config::MYSQL_DB_NAME, Config::MYSQL_PORT);
        if ($mysql->connect_errno) {
            printf("Unable to connect to the database: %s\n", $mysql->connect_error);
            exit();
        }
        $mysql->set_charset("utf8");
        return $mysql;
    }

}
