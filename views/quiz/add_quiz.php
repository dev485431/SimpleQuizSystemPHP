<h1>Add new quiz</h1>


<form action="?controller=quiz&action=addNewQuiz" method="post">
    <div class="form-group">
        <label for="name">
            Name
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_NAME_MIN; ?>, max <?php echo
            Config::QUIZ_NAME_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="quizName" name="quizName"
               value="<?php if (isset($_POST['quizName']))
                   echo $_POST['quizName']; ?>"/>
    </div>

    <div class="form-group">
        <label for="quizCategoryId">Category</label>
        <select class="form-control" id="quizCategoryId" name="quizCategoryId">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>

    <div class="form-group">
        <label for="quizDescription">Description
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_DESCRIPTION_MIN; ?>, max <?php echo
            Config::QUIZ_DESCRIPTION_MAX; ?>)
        </small>
        <textarea class="form-control" rows="5" id="quizDescription"
                  name="quizDescription"><?php if (isset($_POST['quizDescription'])) echo $_POST['quizDescription']; ?></textarea>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Next step"/>
    </div>
</form>
