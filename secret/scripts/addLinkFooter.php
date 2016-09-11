<h2>Ajouter des liens</h2>
<p>Utilisez le formulaire ci-dessous pour ajouter des liens de votre choix.</p>
<?php
$footer=new Footer();
$footer->verifFormAddLink();
$footers=new Footers();
?>
<div id="form">
    <?php
    if($footer->getTest()==1) {
        ?>
    <p></p>
    <div class="info">
        <p>Lien enregistré !</p>
    </div>
    <p></p>
    <?php
    }
    ?>
    <form action="add-link-footer.html" method="POST">
        <fieldset>
            <legend>Colonnes</legend>
            <?php
            $error=$footer->getValidator("simpleId")->getErrorMsg();
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
            <label for="idFooter">Choisissez une colonne :</label>
            <?php
            $footers->dispListAddLink($footer->getIdFooter());
            ?>
        </fieldset>
        <p></p>
        <fieldset>
            <legend>Nouveau Lien</legend>
            <label for="idPage">Sélectionnez, soit une page existante :</label>
            <select name="idPage" id="idPage">
                <option value="0"<?php if($footer->getIdPage()==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
                <option value="1"<?php if($footer->getIdPage()==1) { echo ' selected="selected"'; } ?>>Page d'accueil</option>
                <option value="2"<?php if($footer->getIdPage()==2) { echo ' selected="selected"'; } ?>>Page Prestations</option>
                <option value="3"<?php if($footer->getIdPage()==3) { echo ' selected="selected"'; } ?>>Page Tarifs</option>
                <option value="4"<?php if($footer->getIdPage()==4) { echo ' selected="selected"'; } ?>>Page Galeries</option>
                <option value="5"<?php if($footer->getIdPage()==5) { echo ' selected="selected"'; } ?>>Page Carte</option>
            </select>
            <br/>
            <br/>
            <label for="url">Ou saisissez une nouvelle url (Relative ou absolue) : </label>
            <input type="text" name="url" id="url" value="<?php echo $footer->getUrl(); ?>" size="40" maxlength="200" />
            <?php
            $error=$footer->getValidator("urlLink")->getErrorMsg();
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
            <label for="libelle">Texte du lien : </label>
            <input type="text" name="libelle" id="libelle" value="<?php echo $footer->getLibelle(); ?>" size="40" maxlength="100" />
            <br/>
            <?php
            $error=$footer->getValidator('inputText')->getErrorMsg();
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
        </fieldset>
        <p>
            <br/>
            <input type="submit" value="Enregistrer" name="subm" />
            <br/>
        </p>
    </form>
</div>