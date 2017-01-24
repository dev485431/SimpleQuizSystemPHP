<?php
require_once('views/common/session_auth.php');
?>

<h2>
    <?php echo $quiz->getTitle() ?>
</h2>
<p class="text-info">You score:
    <mark>0.0</mark>
</p>
<div class="well white-bg-well"><?php echo $quiz->getDescription() ?></div>
<input type="hidden" name="quizId" value="<?php echo $quiz->getQuizId() ?>"/>

<p>
    <a href='?controller=quiz&action=doQuiz&quizId=<?php echo $quiz->getQuizId() ?>'
       class="btn btn-success">
		<span class="glyphicon glyphicon-play"
              aria-hidden="true"></span>
        Start
    </a>
    <a href='?controller=score&action=quizScores&quizId=<?php echo $quiz->getQuizId() ?>'
       class="btn btn-danger">
        <span class="glyphicon glyphicon glyphicon-tasks" aria-hidden="true"></span>
        Top scores
    </a>
</p>

<p class="text-center">
    <a href='?controller=quiz&action=showAllQuizzes'
       class="btn btn-default">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        Go back
    </a>
</p>
