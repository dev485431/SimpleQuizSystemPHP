<h2>Adding question</h2>

<div>
    <strong>Quiz name:</strong> <?php echo $quiz->getTitle(); ?>

</div><br><br>

<form action="?controller=question&action=addQuestion" method="post">
    <input type="hidden" name="quizId" value="<?php echo $quiz->getQuizId(); ?>">

    <div class="form-group">
        <label for="content">
            Question
        </label>
        <input class="form-control" type="text" id="content" name="content" placeholder="Question"
               value=""/>
    </div>

    <?php
    for ($i = 1; $i <= Config::DEFAULT_QUESTIONS_PER_ANSWER; $i++) {
        ?>
        <div class="form-group">
            <label for="answer<?php echo '_' . $i; ?>">
                Answer <?php echo $i; ?>
            </label>
            <input class="form-control" type="text" id="answer<?php echo '_' . $i; ?>"
                   name="answer<?php echo '_' . $i; ?>" placeholder="Answer <?php echo $i; ?>"/>
        </div>

        <?php
    }
    ?>


    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Add question"/>
    </div>
</form>