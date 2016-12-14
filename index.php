<?php
require_once('config.php');
require_once('messages.php');
require_once('db.php');
require_once('utils/redirection_utils.php');
session_start();

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once('views/layout.php');
?>
