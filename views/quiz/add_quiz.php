<?php
require_once('views/common/session_auth.php');
?>

<h1>Add new quiz</h1>


<form action="?controller=quiz&action=addQuiz" method="post">
    <div class="form-group">
        <label for="name">
            Name
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_NAME_MIN; ?>, max <?php echo
            Config::QUIZ_NAME_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="quizTile" name="quizTile"
               value="<?php if (isset($_POST['quizTile']))
                   echo $_POST['quizTile']; ?>" placeholder="Name"/>
    </div>

    <div class="form-group">
        <label for="quizCategoryId">Category</label>
        <select class="form-control" id="quizCategoryId" name="quizCategoryId">
            <?php
            foreach ($categories as $cat) {
                echo '<option value="' . $cat->getCategoryId() . '">' . $cat->getName() . '</option>';
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
                  name="quizDescription"
                  placeholder="Description"><?php if (isset($_POST['quizDescription'])) echo $_POST['quizDescription'];
            ?></textarea>
    </div>

    <div class="form-group">
        <label for="quizIsEnabled">Is enabled?</label>
        <input type="checkbox" id="quizIsEnabled"
               name="quizIsEnabled"><br>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Add quiz"/>
    </div>
</form>
