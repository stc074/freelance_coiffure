<h2>Modifier les titres</h2>
<p>Grâce aux formulaires ci-dessous, vous pouvez changer les titres des 3 colones en pied de page.<br/>
Vous pouvez aussi modifier leur ordre d'apparition (le plus en haut à gauche).</p>
<?php
$footers=new Footers();
$footers->verifFormUpdateTitle();
$footers->testChangePos();
$footers->dispInputsTitle();
