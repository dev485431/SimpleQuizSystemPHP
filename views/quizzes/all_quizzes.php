<h2>Quizzes list</h2>

<?php

foreach ($quizzes as $quiz) {

    if ($quiz->getIsEnabled()) {
        echo 'Id: ' . $quiz->getQuizId() . '</br>';
        echo 'Title: ' . $quiz->getTitle() . '</br>';
        echo 'Desc: ' . $quiz->getDescription() . '</br>';
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