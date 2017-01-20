<?php

class CategoryService
{
    const SQL_SELECT_CATEGORIES = 'SELECT * FROM categories';
    const SQL_INSERT_CATEGORY = 'INSERT INTO categories (categoryId, name, description) VALUES (null,?,?)';
    const SQL_SELECT_CATEGORY_BY_NAME = "SELECT * FROM categories WHERE name=?";

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

    public function addCategory(Category $category)
    {
        $affectedRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_CATEGORY)) {
            $stmt->bind_param("ss", $category->getName(), $category->getDescription());
            $stmt->execute();
            $affectedRows = $this->mysqli->affected_rows;
            $stmt->close();
        }
        return ($affectedRows === 0) ? false : true;
    }

    public function categoryNameExists($categoryName)
    {
        $numRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_CATEGORY_BY_NAME)) {
            $stmt->bind_param("s", $categoryName);
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->num_rows;
            $stmt->close();
        }
        return ($numRows === 0) ? false : true;
    }

}
