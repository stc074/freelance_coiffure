<h2>Ajouter une galerie</h2>
<p>Pour ajouter une galerie, utilisez le formulaire ci-dessous.</p>
<?php
$gallery=new Gallery();
$gallery->verifFormNew();
?>
<div id="form">
    <?php
    if($gallery->getTest()==1) {
        ?>
    <p></p>
    <div class="info">
        <p><?php echo $gallery->getMessage(); ?></p>
    </div>
    <p></p>
    <?php
    }
    ?>
    <form action="add-gallery.html#form" method="POST">
        <fieldset>
            <legend>Libelle de la nouvelle galerie</legend>
            <label for="libelle">Libellé de la nouvelle galerie : </label>
            <input type="text" name="libelle" id="libelle" value="<?php echo $gallery->getLibelle(); ?>" size="40" maxlength="200" />
            <?php
            $error=$gallery->getValidator('libelle')->getErrorMsg();
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
            <br/>
            <input type="submit" value="Enregistrer" name="subm" />
            <br/>
        </fieldset>
    </form>
</div>