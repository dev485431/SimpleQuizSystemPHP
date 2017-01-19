<?php

class CategoryService
{
    const SQL_SELECT_CATEGORIES = "SELECT * FROM categories";

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function getAllCategories()
    {
        $categories = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_CATEGORIES)) {
            $stmt->execute();
            $stmt->bind_result($categoryId, $name, $description);
            while ($stmt->fetch()) {
                array_push($categories, Category::createCategoryWithId($categoryId, $name, $description));
            }
            $stmt->close();
        }
        return $categories;
    }


}