<?php

class ScoreController
{
    private $scoreService;

    public function __construct()
    {
        $this->scoreService = new ScoreService();
    }

    public function quizScores()
    {
        $quizId = null;
        if (ValidationUtils::isSetAsInt($_GET['quizId'])) {
            $quizId = $_GET['quizId'];
        } else {
            call('pages', 'error');
        }

        $topScores = $this->scoreService->getTopQuizScoresByQuizId($quizId);
        require_once('views/quiz/quiz_scores.php');
    }

}