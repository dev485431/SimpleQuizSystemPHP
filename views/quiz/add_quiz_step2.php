<h1>Add new quiz
    <small> - step 2</small>
</h1>

<h4 class="text-info">Name:</h4>
<p><?php if (isset($_POST['name'])) echo $_POST['name']; ?></p>

<h4 class="text-info">Number of questions:</h4>
<p><?php if (isset($_POST['questionsNumber'])) echo $_POST['questionsNumber']; ?></p>

<h4 class="text-info">Number of answers for each question:</h4>
<p><?php if (isset($_POST['answersNumber'])) echo $_POST['answersNumber']; ?></p>

<h4 class="text-info">Category:</h4>
<p><?php if (isset($_POST['category'])) echo $_POST['category']; ?></p>

<h4 class="text-info">Description:</h4>
<p><?php if (isset($_POST['description'])) echo $_POST['description']; ?></p>
<hr>

<form action="?controller=quiz&action=addNewQuiz&step=3" method="post">
    <input type="hidden" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
    <input type="hidden" name="questionsNumber"
           value="<?php if (isset($_POST['questionsNumber'])) echo $_POST['questionsNumber']; ?>">
    <input type="hidden" name="answersNumber"
           value="<?php if (isset($_POST['answersNumber'])) echo $_POST['answersNumber']; ?>">
    <input type="hidden" name="category" value="<?php if (isset($_POST['category'])) echo $_POST['category']; ?>">
    <input type="hidden" name="description"
           value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>">

    <?php
    for ($i = 1; $i <= $_POST['questionsNumber']; $i++) {
        ?>

        <div class="form-group">
            <label for="question_<?php echo $i; ?>">
                Question <?php echo $i; ?>
            </label>
            <input class="form-control" type="text" id="question_<?php echo $i; ?>"
                   name="question_<?php echo $i; ?>"
                   value=""/>
        </div>
        <?php
        for ($j = 1; $j <= $_POST['answersNumber']; $j++) {
            ?>

            <label for="question_<?php echo $i; ?>_answer_<?php echo $j; ?>"></label>
            <div class="input-group">
                <span class="input-group-addon">Answer <?php echo $j; ?></span>
                <input type="text" class="form-control" id="question_<?php echo $i; ?>_answer_<?php echo $j; ?>"
                       name="question_<?php echo $i; ?>_answer_<?php echo $j; ?>"
                       aria-describedby="basic-addon3">
            </div>

            <?php
        }
        ?>

        <hr>
        <?php
    }
    ?>

    <div class="text-center">
        <?php
        $backUrlToStep1 = '?controller=quiz&action=addNewQuiz&step=1&name=' . urlencode($_POST['name']) . '&description=' .
            urlencode($_POST['description']) . '&questionsNumber=' . urlencode($_POST['questionsNumber'])
            . '&answersNumber=' . urlencode($_POST['answersNumber']) . '&category=' . urlencode($_POST['category']);
        $backUrlToStep1 = htmlentities($backUrlToStep1);
        echo '<a href="' . $backUrlToStep1 . '" class="btn btn-default">Back</a>';
        ?>
        <input class="btn btn-primary" type="submit" value="Next step"/>
    </div>

</form>
