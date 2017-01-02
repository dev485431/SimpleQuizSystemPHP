<h1>Add new quiz
    <small> - step 1</small>
</h1>

<form action="?controller=quiz&action=addNewQuiz&step=2" method="post">
    <div class="form-group">
        <label for="name">
            Name
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_NAME_MIN; ?>, max <?php echo
            Config::QUIZ_NAME_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="name" name="name" value="<?php if (isset($_GET['name']))
            echo urldecode($_GET['name']); ?>"/>
    </div>

    <div class="form-group">
        <label for="questionsNumber">
            Number of questions
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_QUESTIONS_MIN; ?>, max <?php echo
            Config::QUIZ_QUESTIONS_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="questionsNumber" name="questionsNumber"
               value="<?php if (isset($_GET['questionsNumber']))
                   echo urldecode($_GET['questionsNumber']); ?>"/>
    </div>

    <div class="form-group">
        <label for="answersNumber">
            Number of answers for each question
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_ANSWERS_MIN; ?>, max <?php echo
            Config::QUIZ_ANSWERS_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="answersNumber" name="answersNumber"
               value="<?php if (isset($_GET['answersNumber']))
                   echo urldecode($_GET['answersNumber']); ?>"/>
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUIZ_DESCRIPTION_MIN; ?>, max <?php echo
            Config::QUIZ_DESCRIPTION_MAX; ?>)
        </small>
        <textarea class="form-control" rows="5" id="description"
                  name="description"><?php if (isset($_GET['description'])) echo urldecode($_GET['description']); ?></textarea>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Next step"/>
    </div>
</form>
