<?php


class TopScore
{
    private $score;
    private $username;
    private $title;

    public function __construct($score, $username, $title)
    {
        $this->score = $score;
        $this->username = $username;
        $this->title = $title;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
}