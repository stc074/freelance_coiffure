<h2>Ordre des photos</h2>
<p>Choisissez une galerie et déterminez l'ordre d'apparition des photos grâce aux flêches.</p>
<?php
$galleries=new Galleries();
$gallery=new Gallery();
$gallery->getGets();
$gallery->initInfos();
$gallery->testPosPhotos();
$gallery->testDelPhoto();
?>
<div id="form">
    <form action="ordre-photos.html#form" method="POST">
        <fieldset>
            <legend>Vos galeries</legend>
            <label for="idGallery">Sélectionnez une galerie : </label>
            <?php
            $galleries->dispListOrdre($gallery->getId());
            ?>
        </fieldset>
    </form>
    <p></p>
    <?php
    if($gallery->getId()!=0) {
        ?>
    <div><p><a href="#" title="VISUALISER CETTE GALERIE" onclick="javascript:openGallery(<?php echo $gallery->getId(); ?>);">VISUALISEZ "<?php echo $gallery->getLibelle(); ?>"</a></p></div>
    <p></p>
    <?php
    $gallery->dispPhotos();
    ?>
    <?php
    }
    ?>
</div>