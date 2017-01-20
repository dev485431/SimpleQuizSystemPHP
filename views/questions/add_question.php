<h2>Adding question</h2>

<div>
    <strong>Quiz name:</strong> <?php echo $quiz->getTitle(); ?><br><br>
    <strong>Quiz description:</strong> <?php echo $quiz->getDescription(); ?>
</div><br><br>

<form action="?controller=question&action=addQuestion&quizId=<?php echo $quiz->getQuizId(); ?>" method="post">

    <div class="form-group">
        <label for="question">
            Question
        </label>
        <small class="form-text text-muted">(min <?php echo Config::QUESTION_LENGTH_MIN; ?>, max <?php echo
            Config::QUESTION_LENGTH_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="question" name="question" placeholder="Question"
               value=""/>
    </div>

    <div class="form-group">
        <label for="answer1">
            Answer 1
        </label>
        <small class="form-text text-muted">(min <?php echo Config::ANSWER_LENGTH_MIN; ?>, max <?php echo
            Config::ANSWER_LENGTH_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="answer1"
               name="answer1" placeholder="Answer 1"/>
    </div>

    <div class="form-group">
        <label for="answer2">
            Answer 2
        </label>
        <small class="form-text text-muted">(min <?php echo Config::ANSWER_LENGTH_MIN; ?>, max <?php echo
            Config::ANSWER_LENGTH_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="answer2"
               name="answer2" placeholder="Answer 2"/>
    </div>

    <div class="form-group">
        <label for="answer3">
            Answer 3
        </label>
        <small class="form-text text-muted">(min <?php echo Config::ANSWER_LENGTH_MIN; ?>, max <?php echo
            Config::ANSWER_LENGTH_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="answer3"
               name="answer3" placeholder="Answer 3"/>
    </div>

    <div class="form-group">
        <label for="correctAnswer">
            Which answer is correct?
        </label>
        <select class="form-control" id="correctAnswer" name="correctAnswer">
            <option value="0">Answer 1</option>
            <option value="1">Answer 2</option>
            <option value="2">Answer 3</option>
        </select>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Add question"/>
    </div>
</form>