<?php
if(!isset($_SESSION['username']) || !isset($_SESSION['userRole']) || !isset($_SESSION['userId'])) {
    RedirectionUtils::redirectTo(Config::APP_LOGIN);
}


