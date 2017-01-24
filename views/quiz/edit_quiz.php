<?php
require_once('views/common/session_auth.php');
?>

<h1>Edit quiz</h1>
<div class="text-center">
    <h3>Current details:</h3>
    <h4>Quiz name:</h4>
    <div>
        <?php echo $editedQuiz->getTitle() ?>
    </div>
    <h4>Quiz category:</h4>
    <div>
        <?php
        foreach ($categories as $cat) {
            if ($cat->getCategoryId() == $editedQuiz->getCategoryId()) echo $cat->getName();
        }
        ?>
    </div>
    <h4>Quiz description:</h4>
    <div><?php echo $editedQuiz->getDescription() ?></div>
</div>

<form action="?controller=quiz&action=editQuiz&quizId=<?php echo $editedQuiz->getQuizId() ?>" method="post">
    <div class="form-group">
        <label for="name">
            Name
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_NAME_MIN; ?>, max <?php echo
            Config::QUIZ_NAME_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="quizTile" name="quizTile"
               value="<?php echo $editedQuiz->getTitle() ?>"/>
    </div>

    <div class="form-group">
        <label for="quizCategoryId">Category</label>
        <select class="form-control" id="quizCategoryId" name="quizCategoryId">
            <?php
            foreach ($categories as $cat) {
                $selected = ($cat->getCategoryId() == $editedQuiz->getCategoryId()) ? 'selected' : '';
                echo '<option value="' . $cat->getCategoryId() . '" ' . $selected . '>' .
                    $cat->getName() . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="quizDescription">Description
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_DESCRIPTION_MIN; ?>, max <?php echo
            Config::QUIZ_DESCRIPTION_MAX; ?>)
        </small>
        <textarea class="form-control" rows="5" id="quizDescription"
                  name="quizDescription"><?php echo $editedQuiz->getDescription() ?></textarea>
    </div>

    <div class="form-group">
        <label for="quizIsEnabled">Is enabled?</label>
        <input type="checkbox" id="quizIsEnabled"
               name="quizIsEnabled" <?php if ($editedQuiz->getIsEnabled()) echo 'checked' ?>><br>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Save"/>
    </div>
</form>
