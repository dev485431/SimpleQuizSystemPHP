<?php

class Quiz
{

    private $quizId;
    private $title;
    private $description;
    private $isEnabled;

    public function __construct($title, $description, $isEnabled)
    {
        $this->title = $title;
        $this->description = $description;
        $this->isEnabled = $isEnabled;
    }

    public static function createQuizWithId($quizId, $title, $description, $isEnabled)
    {
        $q = new Quiz($title, $description, $isEnabled);
        $q->setQuizId($quizId);
        return $q;
    }

    public function getQuizId()
    {
        return $this->quizId;
    }

    public function setQuizId($quizId)
    {
        $this->quizId = $quizId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }


}