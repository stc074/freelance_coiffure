<h2>Changer le zoom sur Annecy</h2>
<p>Changez le zoom grâce au formulaire ci-dessous, vous pouvez voir le résultat en dessous.</p>
<?php
$map=new Map();
$map->initZoom();
$map->verifFormUpdateZoom();
?>
<div id="form">
    <form action="change-zoom.html#form" method="POST">
        <fieldset>
            <legend>Valeur du zoom</legend>
            <label for="zoom">Valeur du zoom :</label>
            <input type="text" name="zoom" id="zoom" value="<?php echo $map->getZoom(); ?>" size="10" maxlength="10" />
            <input type="submit" value="Modifier" name="submModif" />
            <br/>
            <?php
            $error=$map->getValidator('int')->getErrorMsg();
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
        </fieldset>
    </form>
</div>
<p></p>
<h3>Votre carte :</h3>
<div id="map"></div>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', initializeMap(<?php echo $map->getLatitude(); ?>, <?php echo $map->getLongitude(); ?>, <?php echo $map->getZoom(); ?>));
</script>
