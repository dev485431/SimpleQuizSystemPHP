<?php
require_once('views/common/session_auth.php');
?>

<h2>Question <?php echo $questionNumber ?>: </h2>

<div>
    <h1><?php echo $question->getQuestion(); ?></h1>
</div>

Which answer is correct?<br>
<form action="?controller=quiz&action=doQuiz&quizId=<?php echo $_GET['quizId']; ?>&questionNumber=<?php echo $questionNumber + 1; ?>"
      method="post">
    <div>
        <?php
        foreach ($question->getAnswers() as $answer) {
            ?>

            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="answer" id="answer"
                           value="<?php echo $answer->getAnswerId(); ?>">
                    <?php echo $answer->getAnswer(); ?>
                </label>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Next question"/>
    </div>
</form>
