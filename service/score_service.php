<?php

class ScoreService
{
    const SQL_INSERT_USER_SCORE = 'INSERT INTO users_quizzes(id,userId,quizId,score) VALUES (null,?,?,?)';
    const SQL_GET_USER_SCORE_FOR_QUIZ = 'SELECT score FROM users_quizzes WHERE userId=? AND quizId=? ORDER BY score DESC LIMIT 1';
    const SQL_SELECT_TOP_TEN_SCORES = 'SELECT users_quizzes.score, users.username, quizzes.title FROM users INNER JOIN users_quizzes 
ON users.userId=users_quizzes.userId INNER JOIN quizzes on quizzes.quizId=users_quizzes.quizId WHERE users_quizzes.quizId=? ORDER BY users_quizzes.score DESC LIMIT 10';
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function saveUserScore($userId, $quizId, $score)
    {
        $affectedRows = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_USER_SCORE)) {
            $stmt->bind_param("iii", $userId, $quizId, $score);
            $stmt->execute();
            $affectedRows = $this->mysqli->affected_rows;
            $stmt->close();
        }
        return ($affectedRows === 0) ? false : true;
    }

    public function getTopScoreByUserIdAndQuizId($userId, $quizId)
    {
        $score = null;
        if ($stmt = $this->mysqli->prepare(self::SQL_GET_USER_SCORE_FOR_QUIZ)) {
            $stmt->bind_param("ii", $userId, $quizId);
            $stmt->execute();
            $stmt->bind_result($score);
            $stmt->fetch();
            $stmt->close();
        }
        return $score;
    }

    public function getTopQuizScoresByQuizId($quizId)
    {
        $topScores = array();
        if ($stmt = $this->mysqli->prepare(self::SQL_SELECT_TOP_TEN_SCORES)) {
            $stmt->bind_param("i", $quizId);
            $stmt->execute();
            $stmt->bind_result($score, $username, $title);
            while ($stmt->fetch()) {
                array_push($topScores, new TopScore($score, $username, $title));
            }
            $stmt->close();
        }
        return $topScores;
    }
}
