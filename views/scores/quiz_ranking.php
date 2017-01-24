<?php
require_once('views/common/session_auth.php');
?>

<div class="row text-center">
    <h2>Ranking</h2>
    <h3>Top scores for every quiz</h3>
</div><br><br>


<?php

if (empty($quizzes)) {
    ?>

    <div class="row text-center">There are no quizzes!</div>

    <?php
} else {
    ?>

    <div class="row text-center">
        <div class="col-9 col-sm-6"><strong>QUIZ</strong></div>
        <div class="col-5 col-sm-2"><strong>TOP SCORE</strong></div>
        <div class="col-5 col-sm-2"><strong>USERNAME</strong></div>
    </div><br>

    <?php
    foreach ($quizzes as $quiz) {
        $topScore = $scoreService->getTopScoreByQuizId($quiz->getQuizId());
        ?>

        <div class="row text-center">
            <div class="col-9 col-sm-6"><?php echo $quiz->getTitle() ?></div>
            <div class="col-5 col-sm-2">
                <?php if ($topScore->getScore()) {
                    echo $topScore->getScore();
                } else {
                    echo 'n/a';
                } ?>
            </div>
            <div class="col-5 col-sm-2">
                <?php if ($topScore->getUsername()) {
                    echo $topScore->getUsername();
                } else {
                    echo 'n/a';
                } ?>
            </div>
        </div>

        <?php
    }
}
?>


<br><br>
<div class="row">
    <div class="col-xs-1">

        <?php
        if ($pageNumber != 1) {
            ?>
            <a class="btn btn-default"
               href="?controller=score&action=showRanking&page=<?php echo $pageNumber - 1 ?>">
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
                   href="?controller=score&action=showRanking&page=<?php echo $i ?>">
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
               href="?controller=score&action=showRanking&page=<?php echo $pageNumber + 1 ?>">
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



<br><br>
<p class="text-center">
    <a href='?controller=quiz&action=showAllQuizzes'
       class="btn btn-default">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        Go back
    </a>
</p>

