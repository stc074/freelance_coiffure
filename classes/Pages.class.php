<?php

/**
 * Description of Pages
 *
 * @author FS-ESPRIMO
 */
class Pages extends Objet {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function dispListNumPages($numPage=0) {
        ?>
<select name="numPage" onchange="javascript:window.location.href='edit-page-'+this.value+'.html#form';">
    <option value="0"<?php if($numPage==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
    <option value="1"<?php if($numPage==1) { echo ' selected="selected"'; } ?>>Accueil</option>
    <option value="2"<?php if($numPage==2) { echo ' selected="selected"'; } ?>>Prestations</option>
    <option value="3"<?php if($numPage==3) { echo ' selected="selected"'; } ?>>Tarifs</option>
    <option value="4"<?php if($numPage==4) { echo ' selected="selected"'; } ?>>Présentation de la carte</option>
</select>
<?php
    }
}

?>
