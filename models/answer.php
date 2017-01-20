<?php

class Answer
{

    private $answerId;
    private $answer;
    private $isCorrect;

    public function __construct($answer, $isCorrect)
    {
        $this->answer = $answer;
        $this->isCorrect = $isCorrect;
    }

    public static function createAnswerWithId($answerId, $answer, $isCorrect)
    {
        $a = new Answer($answer, $isCorrect);
        $a->setAnswerId($answerId);
        return $a;
    }

    public function getAnswerId()
    {
        return $this->answerId;
    }

    public function setAnswerId($answerId)
    {
        $this->answerId = $answerId;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;
    }


}