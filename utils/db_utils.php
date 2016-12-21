<?php

class DbUtils
{
    const ONE = 1;

    public static function calculateSqlOffset($pageNumber)
    {
        return ($pageNumber - self::ONE) * Config::PAGINATION_ITEMS_PER_PAGE;
    }

    public static function calculateNumberOfPages($numberOfItems, $pageSize)
    {
        return ceil($numberOfItems / $pageSize);
    }

}