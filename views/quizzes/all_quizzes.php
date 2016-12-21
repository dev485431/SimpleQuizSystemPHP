<h2>Quizzes list</h2>

<?php

foreach ($quizzes as $quiz) {

    if ($quiz->getIsEnabled()) {
        ?>

        <h2>
            <a href="?controller=quiz&action=quizDetails&quizId=<?php echo $quiz->getQuizId() ?>"><?php echo $quiz->getTitle() ?></a>
        </h2>
        <p class="text-info">You score:
            <mark>0.0</mark>
        </p>
        <p>
            <div class="well white-bg-well"><p class="text-info"><?php echo $quiz->getDescription() ?></p></div>
        </p>
        <input type="hidden" name="quizId" value="<?php echo $quiz->getQuizId() ?>"/>

        <p>
            <a href='?controller=quiz&action=quizStart&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-success">
		<span class="glyphicon glyphicon-play"
              aria-hidden="true"></span>
                Start
            </a>
            <a href='?controller=quiz&action=quizDetails&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-primary">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                Details
            </a>
            <a href='?controller=score&action=quizScores&quizId=<?php echo $quiz->getQuizId() ?>'
               class="btn btn-danger">
                <span class="glyphicon glyphicon glyphicon-tasks" aria-hidden="true"></span>
                Top scores
            </a>
        </p>
        </br>

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