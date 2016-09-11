<h2>Titre du site</h2>
<p>Pour changer le titre, utilisez le formulaire ci-dessous.</p>
<?php
$title=new Title();
$title->initTitle();
$title->verifFormUpdate();
?>
<p></p>
<div class="info">
    <p>Dernière modification : <?php echo $title->getDateTxt(); ?>.</p>
</div>
<p></p>
<div id="form">
    <?php
    if($title->getTest()==1) {
        ?>
    <p></p>
    <div class="info">
        <p>Modifications enregistrées !</p>
    </div>
    <p></p>
    <?php
    }
    ?>
    <form action="change-title.html#form" method="POST">
        <fieldset>
            <legend>Titre</legend>
            <label for="title">Titre actuel :</label>
            <br/>
            <?php
            $error=$title->getValidator("mainTitle")->getErrorMsg();
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
            <input type="text" name="title" id="title" value="<?php echo $title->getTitle(); ?>" size="40" maxlength="100" />
            <br/>
            <br/>
            <input type="submit" value="Modifier" name="subm" />
            <br/>
        </fieldset>
    </form>
</div>