<?php

class QuizService
{
    const SQL_SELECT_ALL_QUIZZES = "SELECT * FROM quizzes";
    const SQL_LIMIT_OFFSET = " LIMIT ? OFFSET ?";
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function getAllQuizzes($pageNumber)
    {
        $quizzes = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_ALL_QUIZZES . self::SQL_LIMIT_OFFSET)) {
            $itemsPerPage = Config::PAGINATION_ITEMS_PER_PAGE;
            $stmt->bind_param("ii", $itemsPerPage, DbUtils::calculateSqlOffset($pageNumber));
            $stmt->execute();
            $stmt->bind_result($quizId, $title, $description, $isEnabled);
            while ($stmt->fetch()) {
                array_push($quizzes, Quiz::createQuizWithId($quizId, $title, $description, $isEnabled));
            }
            $stmt->close();
        }
        return $quizzes;
    }

    public function getAllQuizzesCount()
    {
        $allQuizzesCount = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_ALL_QUIZZES)) {
            $stmt->execute();
            $stmt->store_result();
            $allQuizzesCount = $stmt->num_rows;
            $stmt->close();
        }
        return $allQuizzesCount;
    }


}
