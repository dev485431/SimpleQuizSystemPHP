<?php

class QuizService
{
    const SQL_SELECT_QUIZZES = "SELECT * FROM quizzes";
    const SQL_LIMIT_OFFSET = " LIMIT ? OFFSET ?";
    const SQL_BY_QUIZ_ID = " WHERE quizId=?";
    const SQL_ADD_QUIZ = "INSERT INTO quizzes (quizId, title, description, isEnabled, categoryId) VALUES (null,?,?,?,?)";
    const SQL_GET_NUMBER_OF_QUESTIONS = 'SELECT COUNT(*) FROM questions WHERE quizId=?';
    const SQL_EDIT_QUIZ = "UPDATE quizzes SET title=?, description=?, isEnabled=?, categoryId=? WHERE quizId=?";

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function getQuizzesByPageNumber($pageNumber, $itemsPerPage)
    {
        $quizzes = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_QUIZZES . self::SQL_LIMIT_OFFSET)) {
            $stmt->bind_param("ii", $itemsPerPage, DbUtils::calculateSqlPageOffset($pageNumber, $itemsPerPage));
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

    public function getNumberOfQuizQuestions($quizId)
    {
        $questionsCount = null;
        if ($stmt = $this->mysqli->prepare(self::SQL_GET_NUMBER_OF_QUESTIONS)) {
            $stmt->bind_param("i", $quizId);
            $stmt->execute();
            $stmt->bind_result($questionsCount);
            $stmt->fetch();
            $stmt->close();
        }
        return $questionsCount;
    }

    public function editQuiz(Quiz $quiz)
    {
        $affectedRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_EDIT_QUIZ)) {
            $stmt->bind_param("ssiii", $quiz->getTitle(), $quiz->getDescription(), $quiz->getIsEnabled(),
                $quiz->getCategoryId(), $quiz->getQuizId());
            $stmt->execute();
            $affectedRows = $this->mysqli->affected_rows;
            $stmt->close();
        }
        return ($affectedRows === 0) ? false : true;
    }

}
