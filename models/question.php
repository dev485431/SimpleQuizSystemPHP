<?php

class Question
{
    private $questionId;
    private $question;
    private $answers = array();

    public function __construct($content, $answers)
    {
        $this->question = $content;
        $this->answers = $answers;
    }

    public static function createQuizWithId($questionId, $content, $answers)
    {
        $q = new Question($content, $answers);
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


}