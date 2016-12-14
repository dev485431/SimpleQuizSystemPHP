<?php
if (isset($_SESSION['returnStatus']) && isset($_SESSION['returnMessage']) && !empty($_SESSION['returnStatus']) &&
    !empty($_SESSION['returnMessage'])
) {

    $returnStatus = $_SESSION['returnStatus'];
    $returnMessage = $_SESSION['returnMessage'];

    switch ($returnStatus) {
        case 'success':
            echo "<div class='alert alert-success' role='alert'>
            $returnMessage
            </div>";
            break;

        case 'warning':
            echo "<div class='alert alert-warning' role='alert'>
            $returnMessage
            </div>";
            break;

        case 'error':
            echo "<div class='alert alert-danger' role='alert'>
            $returnMessage
            </div>";
            break;
    }
    unset($_SESSION['returnStatus']);
    unset($_SESSION['returnMessage']);
}

?>
