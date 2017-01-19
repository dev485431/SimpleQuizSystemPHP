<?php

class Question
{
    private $questionId;
    private $content;
    private $answers = array();

    public function __construct($content, $answers)
    {
        $this->content = $content;
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

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
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