<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once 'settings.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ADMINISTRATION</title>
        <meta name="description" content="" />
        <link rel="stylesheet" href="../css/style2.css" type="text/css" />
        <link rel="stylesheet" href="../css/adminStyle.css" type="text/css" />
        <link rel="stylesheet" href="../datas/menu/menu.css" type="text/css" />
        <script type="text/javascript" src="../datas/menu/jquery.js"></script>
        <script type="text/javascript" src="../datas/menu/menu.js"></script>
        <script type="text/javascript" src="scripts/scripts.js"></script>
        <?php
        switch($page) {
            case 1:
                case 2: ?>
        <script type="text/javascript" src="../datas/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="../datas/ckfinder/ckfinder.js"></script>
        <?php
        break;
    case 10: ?>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBnUFZ6bmY7rZymmza6KMzy2cDKeq4oaYo&sensor=false"></script>
        <?php
        break;
        }
        ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once 'scripts/top.php';
            ?>
            <div id="page">
            <?php
            switch($page) {
                case 0:
                include_once 'scripts/home.php';
                    break;
                case 1:
                    include_once 'scripts/editPage.php';
                    break;
                case 2:
                    include_once 'scripts/changeTitle.php';
                    break;
                case 3:
                    include_once 'scripts/addGallery.php';
                    break;
                case 4:
                    include_once 'scripts/addPhotos.php';
                    break;
                case 5:
                    include_once 'scripts/gestionGallery.php';
                    break;
                case 6:
                    include_once 'scripts/ordrePhotos.php';
                    break;
                case 7:
                    include_once 'scripts/changeTitleFooter.php';
                    break;
                case 8:
                    include_once 'scripts/addLinkFooter.php';
                    break;
                case 9:
                    include_once 'scripts/gestionLinks.php';
                    break;
                case 10:
                    include_once 'scripts/changeZoom.php';
                    break;
                case 11:
                    include_once 'scripts/descriptionMap.php';
                    break;
            }
            ?>
            </div>
	<div id="featured-content">
	</div>
            <?php
            include_once '../scripts/footer.php';
            ?>
        </div>
    </body>
</html>
