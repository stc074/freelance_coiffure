<?php

/**
 * Description of Galleries
 *
 * @author FS-ESPRIMO
 */
class Galleries extends Objet {
    
    private $idGallery=0;
    private $libelle="";
    private $libelleValidator=NULL;
    private $dossierAdmin="../imagesGallery/";
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->libelleValidator=new LibelleValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function dispListAddPhoto($idGalerie=0) {
        ?>
<select name="idGalerie" id="idGalerie" onchange="javascript:window.location.href='add-photos-'+this.value+'.html#form';">
    <option value="0"<?php if($idGalerie==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
    <?php
    $query="SELECT id,libelle FROM table_galeries ORDER BY tstp ASC";
    $sth=$this->dbh->prepare($query);
    $sth->execute();
    while($row=$sth->fetchObject()) {
        $id=$row->id;
        $libelle=  str_replace('\\', '', $row->libelle);
        ?>
    <option value="<?php echo $id; ?>"<?php if($id==$idGalerie) { echo ' selected="selected"'; } ?>><?php echo $libelle; ?></option>
    <?php
    }
    ?>
</select>
<?php
    }
    
    public function dispFormsGestion() {
        $query="SELECT id,libelle FROM table_galeries ORDER BY tstp ASC";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $error=$this->libelleValidator->getErrorMsg();
        while($row=$sth->fetchObject()) {
            $id=$row->id;
            $libelle=  str_replace('\\', '', $row->libelle);
            ?>
<div id="form<?php echo $id; ?>">
    <?php
    if($this->idGallery==$id&&!empty($error)) {
        ?>
    <div class="error">
        <p><?php echo $error; ?></p>
    </div>
    <p></p>
    <?php
    }
    ?>
<div class="up" onclick="javascript:window.location.href='up-gallery-<?php echo $id; ?>.html';"></div>
                        <form action="gestion-gallery.html#form<?php echo $id; ?>" method="POST">
                            <input type="hidden" name="idGallery" value="<?php echo $id; ?>" />
                            <fieldset>
                                <legend><?php echo $libelle; ?></legend>
                                <div class="inlineBlock">
                                <label for="libelle<?php echo $id; ?>">Libelle : </label>
                                <input type="text" name="libelle" id="libelle<?php echo $id; ?>" value="<?php echo $libelle; ?>" size="40" maxlength="200" />
                                <input type="submit" value="Modifier" name="submModif" />
                                </div>
                                <div class="inlineBlock cursorPointer" onclick="javascript:window.location.href='delete-gallery-<?php echo $id; ?>.html';">
                                <div class="delete"></div>
                                <div class="inlineBlock">Éffacer cette galerie</div>
                                </div>
                            </fieldset>
</form>
<div class="down" onclick="javascript:window.location.href='down-gallery-<?php echo $id; ?>.html';"></div>
</div>
<p></p>
<?php
        }
    }
    public function testFormUpdate() {
        if(isset($_POST["submModif"], $_POST["libelle"], $_POST["idGallery"])) {
            $this->getPostsUpdate();
            $this->verifPostsUpdate();
            if(Validator::getOk()) {
                $this->updateGallery();
            }
        }
    }
    
    private function getPostsUpdate() {
        $this->idGallery=  addslashes(htmlspecialchars($_POST["idGallery"]));
        $this->libelle=  addslashes(htmlspecialchars($_POST["libelle"]));
    }
    
    private function verifPostsUpdate() {
        Validator::setOk(TRUE);
        $this->libelleValidator->validate($this->libelle);
    }
    
    private function updateGallery() {
        $query="UPDATE table_galeries SET libelle=? WHERE id=?";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->libelle,
            $this->idGallery
        );
        $sth->execute($array);
    }
    
    public function testChangePos() {
        parent::testChangePos("table_galeries");
    }
    
    public function testDeleteGallery() {
        if(isset($_GET["idDel"])) {
            $this->idGallery=  addslashes(htmlspecialchars($_GET["idDel"]));
            //
            $query="SELECT id,extension FROM table_images_galeries WHERE id_galerie=?";
            $sth=$this->dbh->prepare($query);
            $array=array($this->idGallery);
            $sth->execute($array);
            while($row=$sth->fetchObject()) {
                $id=$row->id;
                $extension=$row->extension;
                $filename=$this->dossierAdmin."img".$id.$extension;
                $filenameMini=$this->dossierAdmin."imgMini".$id.$extension;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                if(file_exists($filenameMini)) {
                    unlink($filenameMini);
                }
            }
            //
            $this->deleteSQL("table_images_galeries", "id_galerie", $this->idGallery);
            //
            $this->deleteSQL("table_galeries", "id", $this->idGallery);
        }
    }
    
    public function dispListOrdre($idGallery=0) {
        ?>
<select name="idGallery" onchange="javascript:window.location.href='ordre-photos-'+this.value+'.html#form';">
    <option value="0"<?php if($idGallery==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
    <?php
    $query="SELECT id,libelle FROM table_galeries ORDER BY tstp";
    $sth=$this->dbh->prepare($query);
    $sth->execute();
    while($row=$sth->fetchObject()) {
        $id=$row->id;
        $libelle=  str_replace('\\', '', $row->libelle);
        ?>
    <option value="<?php echo $id; ?>"<?php if($id==$idGallery) { echo ' selected="selected"'; } ?>><?php echo $libelle; ?></option>
    <?php
    }
    ?>
</select>
<?php
    }
    
    public function dispGalleries() {
        ?>
<ul class="galleries">
    <?php
    $query="SELECT id,libelle FROM table_galeries ORDER BY tstp ASC";
    $sth=$this->dbh->prepare($query);
    $sth->execute();
    while($row=$sth->fetchObject()) {
        $id=$row->id;
        $libelle=  str_replace('\\', '', $row->libelle);
        ?>
    <li><a href="#" title="VISIONNER '<?php echo $libelle; ?>'" onclick="javascript:openGallery(<?php echo $id; ?>);"><?php echo strtoupper($libelle); ?></a></li>
    <?php
    }
    ?>
</ul>
<?php
    }
}

?>
