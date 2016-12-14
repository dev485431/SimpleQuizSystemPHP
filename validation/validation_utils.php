<?php

class ValidationUtils
{

    const REGEXP_ALPHANUMERIC = '/[^a-z_\-0-9]/i';
    const REGEXP_NUMER = '/[^0-9]/';
    const EMAIL = "";

    public static function isEmpty($s)
    {
        return empty($s) || trim($s) == "";
    }

    public static function isAlphanumeric($s)
    {
        return preg_match($s, REGEXP_ALPHANUMERIC);
    }

    public static function isNumeric($n)
    {
        return filter_var($n, FILTER_VALIDATE_INT);
    }

    public static function parseData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}