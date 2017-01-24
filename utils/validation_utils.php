<?php

class ValidationUtils
{

    const REGEXP_ALPHANUM_DASH_UNDERSCORE = '/^[A-Za-z0-9 _\-]+$/';
    const REGEXP_ALPHANUM_DASH_UNDERSCORE_SPACE = '/^[A-Za-z0-9 _\-]+$/';
    const REGEXP_PASSWORD = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

    public static function isEmpty($s)
    {
        return empty($s) || trim($s) == "";
    }

    public static function matchesPattern($pattern, $subject)
    {
        return preg_match($pattern, $subject);
    }

    public static function hasCorrectLength($minLength, $maxLength, $subject)
    {
        $subjectLength = strlen($subject);
        return $subjectLength >= $minLength && $subjectLength <= $maxLength;
    }

    public static function isSetAsInt(&$var)
    {
        return isset($var) && !self::isEmpty($var) && filter_var($var, FILTER_VALIDATE_INT);
    }

}
