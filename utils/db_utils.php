<?php

class DbUtils
{
    const ONE = 1;

    public static function calculateSqlPageOffset($pageNumber, $pageSize)
    {
        return ($pageNumber - self::ONE) * $pageSize;
    }

    public static function calculateNumberOfPages($numberOfItems, $pageSize)
    {
        return ceil($numberOfItems / $pageSize);
    }

    public static function calculateSqlQuestionOffset($questionNumber)
    {
        return $questionNumber - self::ONE;
    }

}