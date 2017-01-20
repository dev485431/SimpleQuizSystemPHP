<?php

class QuestionService
{

    const SQL_INSERT_QUESTION = 'INSERT INTO questions (questionId, question, quizId) VALUES (null,?,?)';
    const SQL_INSERT_ANSWER = 'INSERT INTO answers (answerId, answer, isCorrect, questionId) VALUES (null,?,?,?)';
    const SQL_INSERT_QUESTION_ANSWERS = 'INSERT INTO questions_answers (id, questionId, answerId) VALUES (null,?,?)';
    const SQL_SELECT_QUESTIONS_BY_QUIZ_ID = 'SELECT * FROM questions WHERE quizId=?';

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Db::getConnection();
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function addQuestion(Question $question)
    {
        $insertsSuccess = true;
        $this->mysqli->autocommit(false);

        $questionId = null;
        $affectedRowsQuestion = 0;
        if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_QUESTION)) {
            $stmt->bind_param("si", $question->getQuestion(), $question->getQuizId());
            if (!$stmt->execute()) $insertsSuccess = false;
            $affectedRowsQuestion = $this->mysqli->affected_rows;
            $questionId = $this->mysqli->insert_id;
            $stmt->close();
        }

        $affectedRowsAnswers = 0;
        foreach ($question->getAnswers() as $answer) {
            if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_ANSWER)) {
                $stmt->bind_param("sii", $answer->getAnswer(), $answer->getIsCorrect(), $questionId);
                if (!$stmt->execute()) $insertsSuccess = false;
                $affectedRowsAnswers += $this->mysqli->affected_rows;
                $stmt->close();
            }
        }
        if ($insertsSuccess) {
            $this->mysqli->commit();
        } else {
            $this->mysqli->rollback();
        }
        return ($affectedRowsQuestion === 0 || $affectedRowsAnswers === 0) ?
            false : true;
    }

    public function getQuestionsAndAnswersByQuizId($quizId)
    {

    }

}
