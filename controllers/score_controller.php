<?php

class ScoreController
{
    private $scoreService;
    private $quizService;

    public function __construct()
    {
        $this->scoreService = new ScoreService();
        $this->quizService = new QuizService();
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
        require_once('views/scores/quiz_scores.php');
    }

    public function showRanking()
    {
        $pageNumber = Config::PAGINATION_START_PAGE;
        $numberOfPages = DbUtils::calculateNumberOfPages($this->quizService->getAllQuizzesCount(), Config::RANKING_ITEMS_PER_PAGE);
        if (ValidationUtils::isSetAsInt($_GET['page']) && $_GET['page'] >= Config::PAGINATION_START_PAGE && $_GET['page'] <= $numberOfPages
        ) {
            $pageNumber = $_GET['page'];
        }
        $quizzes = $this->quizService->getQuizzesByPageNumber($pageNumber, Config::RANKING_ITEMS_PER_PAGE);
        $scoreService = $this->scoreService;
        require_once('views/scores/quiz_ranking.php');
    }

}
