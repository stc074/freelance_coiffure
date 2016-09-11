<?php

/**
 * Description of Footers
 *
 * @author FS-ESPRIMO
 */
class Footers extends Objet {
    
    private $inputTextValidator=NULL;
    private $id=0;
    private $title="";
    private $arrayCols;
    private $arrayTitles;

    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->inputTextValidator=new InputTextValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function dispInputsTitle() {
        $query="SELECT id,title FROM table_footers ORDER BY tstp";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $nb=0;
        $error=$this->inputTextValidator->getErrorMsg();
        while($row=$sth->fetchObject()) {
            $nb++;
            $id=$row->id;
            $title=  str_replace('\\', '', $row->title);
            ?>
<div id="form<?php echo $id; ?>">
    <?php
    if($this->id==$id&&!empty($error)) {
        ?>
    <div class="error">
        <p><?php echo $error; ?></p>
    </div>
    <?php
    }
    ?>
<div class="up" onclick="javascript:window.location.href='up-title-footer-<?php echo $id; ?>.html';"></div>
                        <form action="change-title-footer.html#form<?php echo $id; ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
<fieldset>
    <legend>Colonne n°<?php echo $nb; ?></legend>
    <label for="title<?php echo $id; ?>">Titre : </label>
    <input type="text" name="title" id="title<?php echo $id; ?>" value="<?php echo $title; ?>" size="40" maxlength="100" />
    <input type="submit" value="Modifier" name="submModif" />
</fieldset>
</form>
<div class="down" onclick="javascript:window.location.href='down-title-footer-<?php echo $id; ?>.html';"></div>
</div>
<p></p>
<?php
        }
    }
    
    public function verifFormUpdateTitle() {
        if(isset($_POST["submModif"], $_POST["id"], $_POST["title"])) {
            $this->getPostsUpdateTitle();
            $this->verifPostsUpdateTitle();
            if(Validator::getOk()) {
                $this->updateTitle();
            }
        }
    }
    
    private function getPostsUpdateTitle() {
        $this->id=  addslashes(htmlspecialchars($_POST["id"]));
        $this->title=  addslashes(htmlspecialchars($_POST["title"]));
    }
    
    private function verifPostsUpdateTitle() {
        Validator::setOk(TRUE);
        $this->inputTextValidator->validateInputText($this->title, 3, 100);
    }
    
    private function updateTitle() {
        parent::updateSQL("table_footers", array("title"=>$this->title), array("id"=>$this->id));
    }
    
    public function testChangePos($table='', $arrayField=NULL) {
        parent::testChangePos("table_footers");
    }
    
    public function dispListAddLink($idFooter=0) {
        ?>
<select name="idFooter" id="idFooter">
    <option value="0"<?php if($idFooter==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
    <?php
    $query="SELECT id,title FROM table_footers ORDER BY tstp";
    $sth=$this->dbh->prepare($query);
    $sth->execute();
    while($row=$sth->fetchObject()) {
        $id=$row->id;
        $title=  str_replace('\\', '', $row->title);
        ?>
    <option value="<?php echo $id; ?>"<?php if($id==$idFooter) { echo ' selected="selected"'; } ?>><?php echo $title; ?></option>
    <?php
    }
    ?>
</select>
<?php
    }
    
    public function initFooters() {
        $this->arrayCols=array();
        $this->arrayTitles=array();
        //
        $query="SELECT id,title FROM table_footers ORDER BY tstp";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $i=0;
        while($row=$sth->fetchObject()) {
            $idFooter=$row->id;
            $title=  str_replace('\\', '', $row->title);
            array_push($this->arrayTitles, $title);
            //
            $this->arrayCols[$i]=array();
            //
            $query2="SELECT url, libelle FROM table_links_footer WHERE id_footer=? ORDER BY tstp ASC";
            $sth2=$this->dbh->prepare($query2);
            $array2=array($idFooter);
            $sth2->execute($array2);
            $j=0;
            while($row2=$sth2->fetchObject()) {
                $this->arrayCols[$i][$j]=array();
                $url=  str_replace('\\', '', $row2->url);
                $libelle=  str_replace('\\', '', $row2->libelle);
                array_push($this->arrayCols[$i][$j], $url);
                array_push($this->arrayCols[$i][$j], $libelle);
                $j++;
            }
            $i++;
        }
        //var_dump($this->arrayCols);
    }
    
    public function dispListGestLinks($idFooter=0) {
        ?>
<select name="idFooter" id="idFooter" onchange="javascript:window.location.href='gestion-links-'+this.value+'.html#form';">
    <option value="0"<?php if($idFooter==0) { echo ' selected="selected"'; } ?>>Choisissez</option>
    <?php
    $query="SELECT id,title FROM  table_footers ORDER BY tstp ASC";
    $sth=$this->dbh->prepare($query);
    $sth->execute();
    while($row=$sth->fetchObject()) {
        $id=$row->id;
        $title=  str_replace('\\', '', $row->title);
        ?>
    <option value="<?php echo $id; ?>"<?php if($id==$idFooter) { echo ' selected="selected"'; } ?>><?php echo $title; ?></option>
    <?php
    }
    ?>
</select>
<?php
    }
    
    public function getValidator($validator) {
        switch($validator) {
            case 'inputText':
                return $this->inputTextValidator;
                break;
        }
        return new InputTextValidator();
    }
    
    public function getTitle() {
        return str_replace('\\', '', $this->title);
    }
    
    public function getArrayCols($i) {
        return $this->arrayCols[$i];
    }
    
    public function getArrayTitles($i) {
        return $this->arrayTitles[$i];
    }
}

?>
