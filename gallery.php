<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

function myAutoLoader($class) {
    include 'classes/'.$class.'.class.php';
}

spl_autoload_register("myAutoLoader");

$gallery=new Gallery(TRUE);
$gallery->dispGallery();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="/css/galleryStyle.css" type="text/css" />
        <title><?php $gallery->getLibelle(); ?></title>
        <script type="text/javascript" src="/datas/slidingZoom/scripts/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="/datas/slidingZoom/scripts/jquery.slidingGallery-1.2.min.js"></script>
        <script type="text/javascript" src="scripts/scripts.js"></script>
        <script type="text/javascript">
                $(function() {
            $('div.gallery img').slidingGallery();
        });
</script>
    </head>
    <body>
        <div class="quit"><a href="#" title="FERMER CETTTE FENËTRE" onclick="javascript:closeGallery();">QUITTER</a></div>
        <?php
        $error=$gallery->getErrorMsg();
        if(!empty($error)) {
            ?>
        <p></p>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
        <p></p>
        <?php
        } else {
            echo $gallery->getDivGallery();
        }
        ?>
    </body>
</html>
