<?php
$page=new Page();
$page->setNumPage(4);
$page->initInfosPage();
$map=new Map();
$map->initZoom();
echo $page->getContent();
?>
<div id="map"></div>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', initializeMap(<?php echo $map->getLatitude(); ?>, <?php echo $map->getLongitude(); ?>, <?php echo $map->getZoom(); ?>));
</script>
