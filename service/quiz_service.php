<?php

class QuizService
{
    const SQL_SELECT_QUIZZES = "SELECT * FROM quizzes";
    const SQL_LIMIT_OFFSET = " LIMIT ? OFFSET ?";
    const SQL_BY_QUIZ_ID = " WHERE quizId=?";
    const SQL_ADD_QUIZ = "INSERT INTO quizzes (quizId, title, description, isEnabled, categoryId) VALUES (null,?,?,?,?)";
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function getQuizzesByPageNumber($pageNumber)
    {
        $quizzes = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_QUIZZES . self::SQL_LIMIT_OFFSET)) {
            $itemsPerPage = Config::PAGINATION_ITEMS_PER_PAGE;
            $stmt->bind_param("ii", $itemsPerPage, DbUtils::calculateSqlOffset($pageNumber));
            $stmt->execute();
            $stmt->bind_result($quizId, $title, $description, $isEnabled, $categoryId);
            while ($stmt->fetch()) {
                array_push($quizzes, Quiz::createQuizWithId($quizId, $title, $description, $isEnabled, $categoryId));
            }
            $stmt->close();
        }
        return $quizzes;
    }

    public function getAllQuizzesCount()
    {
        $allQuizzesCount = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_QUIZZES)) {
            $stmt->execute();
            $stmt->store_result();
            $allQuizzesCount = $stmt->num_rows;
            $stmt->close();
        }
        return $allQuizzesCount;
    }

    public function getQuizById($quizId)
    {
        $quiz = null;
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_QUIZZES . self::SQL_BY_QUIZ_ID)) {
            $stmt->bind_param("i", $quizId);
            $stmt->execute();
            $stmt->bind_result($quizId, $title, $description, $isEnabled, $categoryId);
            $stmt->fetch();
            $quiz = Quiz::createQuizWithId($quizId, $title, $description, $isEnabled, $categoryId);
            $stmt->close();
        }
        return $quiz;
    }

    public function addQuiz(Quiz $quiz)
    {
        $affectedRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_ADD_QUIZ)) {
            $stmt->bind_param("ssii", $quiz->getTitle(), $quiz->getDescription(), $quiz->getIsEnabled(), $quiz->getCategoryId());
            $stmt->execute();
            $affectedRows = $this->mysqli->affected_rows;
            $stmt->close();
        }
        return ($affectedRows === 0) ? false : true;
    }

}
