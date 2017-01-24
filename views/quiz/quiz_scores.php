<div class="row text-center">
    <h2>Top 10 quiz scores</h2>
</div><br><br>


<?php

if (empty($topScores)) {
    ?>

    <div class="row text-center">There are no scores for this quiz yet!</div>

    <?php
} else {
    ?>

    <div class="row text-center">
        <div class="col-6 col-sm-3"><strong>SCORES</strong></div>
        <div class="col-6 col-sm-3"><strong>USERNAME</strong></div>
        <div class="col-6 col-sm-3"><strong>QUIZ TITLE</strong></div>
    </div><br>

    <?php
    foreach ($topScores as $topScore) {
        ?>

        <div class="row text-center">
            <div class="col-6 col-sm-3"><?php echo $topScore->getScore() ?></div>
            <div class="col-6 col-sm-3"><?php echo $topScore->getUsername() ?></div>
            <div class="col-6 col-sm-3"><?php echo $topScore->getTitle() ?></div>
        </div>

        <?php
    }
}
?>


<br><br>
<p class="text-center">
    <a href='?controller=quiz&action=showAllQuizzes'
       class="btn btn-default">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        Go back
    </a>
</p>

