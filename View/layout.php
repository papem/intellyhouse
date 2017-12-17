<?php require_once ('Controller/routes_header.php');?>
<!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8" />
            <?php
            if (!empty($page_title)) { echo "<title>" . $page_title . "</title>\n";}  ?>
            <link rel="stylesheet" href="View/style.css" />
        </head>

        <header>
            <?php require_once ('pages/header.php'); ?>
        </header>

        <body>
            <?php require_once ('Controller/routes.php'); ?>
        </body>

        <footer>
            <?php require_once ('pages/footer.php')?>
        </footer>

    </html>