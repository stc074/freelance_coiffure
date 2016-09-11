<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once 'settings.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $tags->getTitle(); ?></title>
        <meta name="description" content="<?php echo $tags->getDescription(); ?>" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/mainStyle.css" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Abel|Satisfy" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="scripts/scripts.js"></script>
        <?php
        switch($page) {
            case 2: ?>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBnUFZ6bmY7rZymmza6KMzy2cDKeq4oaYo&sensor=false"></script>
        <?php
        break;
        }
        ?>
<meta name="google-site-verification" content="mbDn-WtdUfVQbNrJhOqUgSaKGgOg5_RN_1oD2Jk5a4o" />
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once 'scripts/top.php';
            ?>
            <div id="page">
                <div class="post">
            <?php
            switch($page) {
                case 0:
                include_once 'scripts/page.php';
                    break;
                case 1:
                    include_once 'scripts/galleries.php';
                    break;
                case 2:
                    include_once 'scripts/carte.php';
                    break;
            }
            ?>
                </div>
            </div>
        </div>
            <?php
            include_once 'scripts/footer.php';
            ?>
    </body>
</html>
