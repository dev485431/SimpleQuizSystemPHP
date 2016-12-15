<?php

class ValidationUtils
{

    const REGEXP_USERNAME = '/^[A-Za-z0-9_\-]+$/';
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

}
