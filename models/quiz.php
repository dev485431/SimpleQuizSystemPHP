<?php

class Quiz
{

    private $quizId;
    private $title;
    private $questions;

    public function __construct($title, $questions)
    {
        $this->title = $title;
        $this->questions = $questions;
    }

    public static function createQuizWithId($quizId, $title, $questions)
    {
        $q = new Quiz($title, $questions);
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

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }


}