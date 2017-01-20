<?php

class Question
{
    private $questionId;
    private $question;
    private $answers = array();
    private $quizId;

    public function __construct($question, $answers, $quizId)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->quizId = $quizId;
    }

    public static function createQuestionWithId($questionId, $question, $answers, $quizId)
    {
        $q = new Question($question, $answers, $quizId);
        $q->setQuestionId($questionId);
        return $q;
    }

    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getQuizId()
    {
        return $this->quizId;
    }

    public function setQuizId($quizId)
    {
        $this->quizId = $quizId;
    }
    
}