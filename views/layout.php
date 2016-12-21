<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="static/favicon.ico">
    <link href="static/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="static/css/custom.css" rel="stylesheet"/>
    <title><?php echo Config::PAGE_TITLE; ?></title>
</head>
<body>

<div class="container">
    <?php require_once 'views/common/header.php'; ?>
    <?php require_once 'views/common/messages.php'; ?>
    <div class="well">

        <?php require_once('routes.php'); ?>

    </div>
    <?php require_once 'views/common/footer.php'; ?>
</div>

<script src="static/js/jquery-3.1.1.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
</body>
</html>