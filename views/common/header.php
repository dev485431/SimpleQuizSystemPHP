<div class="page-header">

    <h1>
        <a href="./"><?php echo Config::PAGE_TITLE; ?></a>
    </h1>


    <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        ?>

        <div>
            Logged as:
            <strong>
                <?php
                echo $_SESSION['username'];
                if (isset($_SESSION['userRole']) && ($_SESSION['userRole']) == "admin") {
                    ?>
                    (admin)
                    <?php
                }
                ?>
            </strong> |
            <a href="?controller=security&action=logOut">Log out</a>
        </div>

        <?php
    } else {
        ?>

        <p>
            Please
            <a href="?controller=security&action=signIn">Sign in</a>
            or
            <a href="?controller=security&action=signUp">Sign up</a>
        </p>

        <?php
    }
    ?>

</div>
