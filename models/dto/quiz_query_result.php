<?php

class QuizQueryResult
{

    private $quizzesCount;
    private $quizzes;

    public function getQuizzesCount()
    {
        return $this->quizzesCount;
    }

    public function setQuizzesCount($quizzesCount)
    {
        $this->quizzesCount = $quizzesCount;
    }

    public function getQuizzes()
    {
        return $this->quizzes;
    }

    public function setQuizzes($quizzes)
    {
        $this->quizzes = $quizzes;
    }

}