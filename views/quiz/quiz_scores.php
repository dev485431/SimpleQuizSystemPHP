<div class="row text-center">
    <h2>Top 10 quiz scores</h2>
    <h3><?php if (!empty($topScores)) echo $topScores[0]->getTitle() ?></h3>
</div><br><br>


<?php

if (empty($topScores)) {
    ?>

    <div class="row text-center">There are no scores for this quiz yet!</div>

    <?php
} else {
    ?>

    <div class="row text-center">
        <div class="col-7 col-sm-4"><strong>PLACE</strong></div>
        <div class="col-6 col-sm-3"><strong>SCORE</strong></div>
        <div class="col-6 col-sm-3"><strong>USERNAME</strong></div>
    </div><br>

    <?php
    for ($i = 0; $i < sizeof($topScores); $i++) {
        $topScore = $topScores[$i];
        ?>

        <div class="row text-center">
            <div class="col-7 col-sm-4"><?php echo $i + 1 ?></div>
            <div class="col-6 col-sm-3"><?php echo $topScore->getScore() ?></div>
            <div class="col-6 col-sm-3"><?php echo $topScore->getUsername() ?></div>
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

