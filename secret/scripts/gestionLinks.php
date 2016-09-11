<h2>Gestion des liens</h2>
<p>Vous pouvez modifier ou effacer des liens et leur ordre d'aparition</p>
<?php
$footers=new Footers();
$footer=new Footer();
$footer->getGets();
$footer->testDelLink();
$footer->testChangePos();
$footer->verifFormUpdateLink();
?>
<div id="form">
    <form action="gestion-links-<?php echo $footer->getId(); ?>.html#form" method="POST">
        <fieldset>
            <legend>Colonnes</legend>
            <label for="idFooter">Choisissez uen colonne :</label>
            <?php
            $footers->dispListGestLinks($footer->getId());
            ?>
        </fieldset>
    </form>
    <p></p>
    <?php
    if($footer->getId()!=0) {
        $footer->dispFormsLinks();
    }
    ?>
</div>