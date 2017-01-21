<?php
require_once('views/common/session_auth.php');
?>

<div class="text-center">
    <h2>
        Congratulations!
    </h2>
    <h3>
        You have finished
        <small>
            <mark><?php echo $quiz->getTitle(); ?></mark>
        </small>
    </h3>
    <h3>
        Your score is:
        <mark><?php echo $_SESSION['currentScore']; ?></mark>
    </h3>
    <br><br>
    <a href="<?php echo Config::APP_ROOT; ?>" class="btn btn-info" role="button">Back to main page</a>
</div>