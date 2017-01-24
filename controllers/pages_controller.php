<?php

class PagesController
{
    public function home()
    {
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            call('pages', 'mainMenu');
        } else {
            require_once('views/pages/home.php');
        }
    }

    public function error()
    {
        require_once('views/pages/error.php');
    }

    public function mainMenu()
    {
        require_once('views/pages/main_menu.php');
    }
}


