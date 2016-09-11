<h2>Gestion des galeries</h2>
<p>Vous pouvez modifier, effacer vos galeries et décider de leur ordre d'apparition sur le site.</p>
<?php
$galleries=new Galleries();
$galleries->testFormUpdate();
$galleries->testChangePos();
$galleries->testDeleteGallery();
?>
<div id="form">
        <?php
        $galleries->dispFormsGestion();
        ?>
</div>