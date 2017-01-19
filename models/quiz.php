<?php

class Quiz
{

    private $quizId;
    private $title;
    private $description;
    private $isEnabled;
    private $categoryId;

    public function __construct($title, $description, $isEnabled, $categoryId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->isEnabled = $isEnabled;
        $this->categoryId = $categoryId;
    }

    public static function createQuizWithId($quizId, $title, $description, $isEnabled, $categoryId)
    {
        $q = new Quiz($title, $description, $isEnabled, $categoryId);
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

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

}