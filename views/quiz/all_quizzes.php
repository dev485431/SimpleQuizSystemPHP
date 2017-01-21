<?php
require_once('views/common/session_auth.php');
?>

<h2>Quizzes list</h2>

<?php

foreach ($quizzes as $quiz) {

    if ($quiz->getIsEnabled()) {
        ?>

        <h2>
            <a href="?controller=quiz&action=showQuizDetails&quizId=<?php echo $quiz->getQuizId() ?>"><?php echo $quiz->getTitle() ?></a>
        </h2>
        <p class="text-info">Number of questions:
            <mark><?php echo $quizService->getNumberOfQuizQuestions($quiz->getQuizId()); ?></mark>
        </p>
        <p class="text-info">Your top score:
            <mark>
                <?php
                $userScore = $scoreService->getTopScoreByUserIdAndQuizId($_SESSION['userId'], $quiz->getQuizId());
                if (!ValidationUtils::isEmpty($userScore)) {
                    echo $userScore;
                } else {
                    echo 0;
                }
                ?>
            </mark>
        </p>
        <div class="well white-bg-well"><?php echo $quiz->getDescription() ?></div>
        <input type="hidden" name="quizId" value="<?php echo $quiz->getQuizId() ?>"/>

        <div>
            <a href='?controller=quiz&action=doQuiz&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-success">
		<span class="glyphicon glyphicon-play"
              aria-hidden="true"></span>
                Start
            </a>

            <a href='?controller=quiz&action=showQuizDetails&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-primary">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                Details
            </a>

            <a href='?controller=score&action=quizScores&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-warning">
                <span class="glyphicon glyphicon glyphicon-tasks" aria-hidden="true"></span>
                Top 10 scores
            </a>

            <?php
            if (isset($_SESSION['userRole']) && ($_SESSION['userRole']) == "admin") {
                ?>

                |
                <div class="dropdown div-inline">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                        Admin
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="adminDropDown">
                        <li><a href="?controller=question&action=addQuestion&quizId=<?php echo $quiz->getQuizId(); ?>">Add
                                question</a></li>
                    </ul>
                </div>

                <?php
            }
            ?>

        </div>
        <br>

        <?php
    }
}

?>

</br></br>
<div class="row">
    <div class="col-xs-1">

        <?php
        if ($pageNumber != 1) {
            ?>
            <a class="btn btn-default"
               href="?controller=quiz&action=showAllQuizzes&page=<?php echo $pageNumber - 1 ?>">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Previous
            </a>

            <?php
        } else {
            ?>

            <span class="btn btn-default disabled">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			Previous
		    </span>

            <?php
        }
        ?>

    </div>

    <div class="col-xs-10 text-center">

        <?php
        for ($i = 1; $i <= $numberOfPages; $i++) {
            if ($pageNumber == $i) {
                ?>

                <span class="btn btn-default disabled"><?php echo $i ?></span>

                <?php
            } else {
                ?>

                <a class="btn btn-default"
                   href="?controller=quiz&action=showAllQuizzes&page=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
                <?php
            }
        }
        ?>

    </div>


    <div class="col-xs-1 text-right">

        <?php
        if ($pageNumber < $numberOfPages) {
            ?>

            <a class="btn btn-default"
               href="?controller=quiz&action=showAllQuizzes&page=<?php echo $pageNumber + 1 ?>">
                Next
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>

            <?php
        } else {
            ?>

            <span class="btn btn-default disabled">
			Next
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    </span>

            <?php
        }
        ?>


    </div>
</div>