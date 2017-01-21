<?php
require_once('views/common/session_auth.php');
?>

<h1>Add category</h1>

<form action="?controller=category&action=addCategory" method="post">

    <div class="form-group">
        <label for="name">
            Name
        </label>
        <small class="form-text text-muted">(min <?php echo Config::CATEGORY_NAME_MIN; ?>, max <?php echo
            Config::CATEGORY_NAME_MAX; ?>)
        </small>
        <input class="form-control" type="text" id="name" name="name" placeholder="Name"
               value=""/>
    </div>

    <div class="form-group">
        <label for="description">
            Description
        </label>
        <small class="form-text text-muted">(min <?php echo Config::CATEGORY_DESCRIPTION_MIN; ?>, max <?php echo
            Config::CATEGORY_DESCRIPTION_MAX; ?>)
        </small>
        <textarea class="form-control" rows="5" id="description"
                  name="description" placeholder="Description"></textarea>
    </div>

    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Add category"/>
    </div>
</form>
