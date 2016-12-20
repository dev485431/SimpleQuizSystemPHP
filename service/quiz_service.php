<?php

class QuizService
{
    const SQL_SELECT_ALL_QUIZZES = "SELECT * FROM quizzes";
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function getAllQuizzes()
    {
        $allQuizzes = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_ALL_QUIZZES)) {
            $stmt->execute();
            while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                array_push($allQuizzes, $row);
            }
            $stmt->close();
        }
        return $allQuizzes;
    }
}
