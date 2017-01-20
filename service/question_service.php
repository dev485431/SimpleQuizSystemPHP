<?php

class QuestionService
{

    const SQL_INSERT_QUESTION = 'INSERT INTO questions (questionId, question) VALUES (null,?)';
    const SQL_INSERT_ANSWER = 'INSERT INTO answers (answerId, answer, isCorrect) VALUES (null,?,?)';
    const SQL_INSERT_QUESTION_ANSWERS = 'INSERT INTO questions_answers (id, questionId, answerId) VALUES (null,?,?)';

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
            $stmt->bind_param("s", $question->getQuestion());
            if (!$stmt->execute()) $insertsSuccess = false;
            $affectedRowsQuestion = $this->mysqli->affected_rows;
            $questionId = $this->mysqli->insert_id;
            $stmt->close();
        }

        $answerId = null;
        $affectedRowsAnswers = 0;
        $affectedRowsQuestionAnswers = 0;
        foreach ($question->getAnswers() as $answer) {
            if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_ANSWER)) {
                $stmt->bind_param("si", $answer->getAnswer(), $answer->getIsCorrect());
                if (!$stmt->execute()) $insertsSuccess = false;
                $affectedRowsAnswers += $this->mysqli->affected_rows;
                $answerId = $this->mysqli->insert_id;
                $stmt->close();
            }

            if ($stmt = $this->mysqli->prepare(self::SQL_INSERT_QUESTION_ANSWERS)) {
                $stmt->bind_param("ii", $questionId, $answerId);
                if (!$stmt->execute()) $insertsSuccess = false;
                $affectedRowsQuestionAnswers = $this->mysqli->affected_rows;
                $stmt->close();
            }
        }
        if ($insertsSuccess) {
            $this->mysqli->commit();
        } else {
            $this->mysqli->rollback();
        }
        return ($affectedRowsQuestion === 0 || $affectedRowsAnswers === 0 || $affectedRowsQuestionAnswers === 0) ?
            false : true;
    }

}