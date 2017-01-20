<?php

class DbUtils
{
    const ONE = 1;

    public static function calculateSqlPageOffset($pageNumber)
    {
        return ($pageNumber - self::ONE) * Config::PAGINATION_ITEMS_PER_PAGE;
    }

    public static function calculateNumberOfPages($numberOfItems, $pageSize)
    {
        return ceil($numberOfItems / $pageSize);
    }

    public static function calculateSqlQuestionOffset($questionNumber)
    {
        return ($questionNumber - self::ONE) * Config::DEFAULT_QUESTIONS_PER_PAGE;
    }

}