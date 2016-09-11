<h2>Ajouter des photos</h2>
<p>Choisissez une galerie et utilisez le formulaire pour lui ajouter des photo ou des images.</p>
<p>Important les images doivent avoir un rapport de 4/3 (3/4 pour un portrait).</p>
<?php
$gal=new Galleries();
$upload=new UploadPhotoGallery();
$upload->getGets();
$upload->verifFormAdd();
?>
<div id="form">
    <form action="add-photos-<?php echo $upload->getIDGallery(); ?>.html#form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Datas::$MAX_UPLOAD_IMAGE; ?>" />
        <fieldset>
            <legend>Choix de la galerie</legend>
            <label for="idGalerie">Choisissez une galerie : </label>
            <?php
            $gal->dispListAddPhoto($upload->getIdGallery());
            ?>
        </fieldset>
        <p></p>
        <?php
        if($upload->getIdGallery()!=0) {
            if($upload->getTest()==1) { 
                ?>
        <p></p>
        <div class="info">
            <p>Fichier enregistré !</p>
        </div>
        <p></p>
        <?php
            }
            ?>
        <fieldset>
            <legend>Ajouter une photo</legend>
            <label for="photo">Fichier de votre photo : </label>
            <input type="file" name="photo" id="photo" />
            <?php
            $error=$upload->getValidator('upload')->getErrorMsg();
            if(!empty($error)) {
                ?>
            <p></p>
            <div class="error">
                <p><?php echo $error; ?></p>
            </div>
            <p></p>
            <?php
            }
            ?>
            <p></p>
            <input type="submit" value="Ajouter la photo" name="subm" />
            <p></p>
        </fieldset>
        <?php
        }
        ?>
    </form>
    <p></p>
    <?php
    if($upload->getIdGallery()!=0) {
        ?>
    <div><a href="#" title="VOIR CETTE GALERIE3" onclick="javascript:openGallery(<?php echo $upload->getIdGallery(); ?>);">VOIR CETTE GALERIE</a></div>
    <?php
    }
    ?>
</div>