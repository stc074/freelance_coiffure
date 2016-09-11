<?php

/**
 * Description of Footer
 *
 * @author FS-ESPRIMO
 */
class Footer extends Objet {
    
    private $id=0;
    private $idFooter=0;
    private $idPage=0;
    private $url="";
    private $libelle="";
    private $idLink=0;
    //
    private $simpleIdValidator=NULL;
    private $urlLinkValidator=NULL;
    private $inputTextValidator=NULL;
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->simpleIdValidator=new SimpleIdValidator();
        $this->urlLinkValidator=new UrlLinkValidator();
        $this->inputTextValidator=new InputTextValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function verifFormAddLink() {
        if(isset($_POST["subm"])) {
        $this->getPostsAddLink();
        $this->verifPostsAddLink();
        if(Validator::getOk()) {
            $this->addLink();
        }
        }
    }
    
    private function getPostsAddLink() {
        $this->idFooter=  addslashes(htmlspecialchars($_POST["idFooter"]));
        $this->idPage=addslashes(htmlspecialchars($_POST["idPage"]));
        $this->url=  addslashes(htmlspecialchars($_POST["url"]));
        $this->libelle=  addslashes(htmlspecialchars($_POST["libelle"]));
    }
    
    private function verifPostsAddLink() {
        Validator::setOk(TRUE);
        $this->simpleIdValidator->validate($this->idFooter);
        $this->urlLinkValidator->validateUrl($this->idPage, $this->url);
        $this->inputTextValidator->validateInputText($this->libelle, 5, 100);
    }
    
    private function addLink() {
        $url="";
        if(!empty($this->url)) {
            $url=$this->url;
        } else {
            switch($this->idPage) {
                case 1:
                    $url='accueil.html';
                    break;
                case 2:
                    $url='prestations.html';
                    break;
                case 3:
                    $url='tarifs.html';
                    break;
                case 4:
                    $url='galeries.html';
                    break;
                case 5:
                    $url='carte.html';
                    break;
            }
        }
        $query="INSERT INTO table_links_footer (id_footer,url,libelle,tstp) VALUES (?,?,?,?)";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->idFooter,
            $url,
            $this->libelle,
            time()
        );
        $sth->execute($array);
        $this->blank();
        $this->test=1;
    }
    
    protected function blank() {
        parent::blank();
        $this->idPage=0;
        $this->url="";
        $this->libelle="";
    }

        public function getValidator($validator) {
        switch($validator) {
            case 'simpleId':
                return $this->simpleIdValidator;
                break;
            case 'urlLink':
                return $this->urlLinkValidator;
                break;
            case 'inputText':
                return $this->inputTextValidator;
                break;
        }
        return new Validator();
    }
    
    public function dispFormsLinks() {
        $query="SELECT id,url,libelle FROM table_links_footer WHERE id_footer=? ORDER BY tstp ASC";
        $sth=$this->dbh->prepare($query);
        $array=array($this->id);
        $sth->execute($array);
        $errorId=$this->simpleIdValidator->getErrorMsg();
        if(!empty($errorId)) { ?>
<p></p>
<div class="error">
    <p>Veuillez choisir une colonne SVP.</p>
</div>
<p></p>
<?php
        }
        $errorUrl=$this->urlLinkValidator->getErrorMsg();
        $errorLibelle=$this->inputTextValidator->getErrorMsg();
        while($row=$sth->fetchObject()) {
            $id=$row->id;
            $url=  str_replace('\\', '', $row->url);
            $libelle=  str_replace('\\', '', $row->libelle);
            ?>
<div id="form<?php echo $id; ?>">
    <div class="up" onclick="javascript:window.location.href='up-link-<?php echo $this->id; ?>-<?php echo $id; ?>.html';"></div>
    <form action="gestion-links-<?php echo $this->id; ?>.html#form<?php echo $id; ?>.html" method="POST">
        <input type="hidden" name="idLink" value="<?php echo $id; ?>" />
        <fieldset>
            <legend><?php echo $libelle; ?></legend>
            <?php
            if(!empty($errorUrl)) {
                ?>
            <p></p>
            <div class="error">
                <p><?php echo $errorUrl; ?></p>
            </div>
            <p></p>
            <?php
            }
            $this->dispListPages();
            ?>
            <br/>
            <br/>
            <label for="url<?php echo $id; ?>">Ou URL : </label>
            <input type="text" name="url" id="url<?php echo $id; ?>" value="<?php echo $url; ?>" size="40" maxlength="200" />
            <br/>
            <br/>
            <?php
            if(!empty($errorLibelle)) {
                ?>
            <p></p>
            <div class="error">
                <p><?php echo $errorLibelle; ?></p>
            </div>
            <p></p>
            <?php
            }
            ?>
            <label for="libelle<?php echo $id; ?>">Texte du lien :</label>
            <input type="text" name="libelle" id="libelle<?php echo $id; ?>" value="<?php echo $libelle; ?>" size="40" maxlength="100" />
            <br/>
            <br/>
            <input type="submit" value="Effacer" name="submDel" />
            <span>&nbsp;&nbsp;</span>
            <input type="submit" value="Modifier" name="submModif" />
            <br/>
            
        </fieldset>
    </form>
    <div class="down" onclick="javascript:window.location.href='down-link-<?php echo $this->id; ?>-<?php echo $id; ?>.html';"></div>
</div>
<?php
        }
    }
    
    public function dispListPages() {
        ?>
<label for="idPage">Page existante : </label>
<select name="idPage" id="idPage">
    <option value="0"<?php if($this->idPage==0) { echo 'selected="selected"'; } ?>>Choisissez</option>
    <option value="1"<?php if($this->idPage==1) { echo 'selected="selected"'; } ?>>Page d'accueil</option>
    <option value="2"<?php if($this->idPage==2) { echo 'selected="selected"'; } ?>>Page prestations</option>
    <option value="3"<?php if($this->idPage==3) { echo 'selected="selected"'; } ?>>Päge tarifs</option>
    <option value="4"<?php if($this->idPage==4) { echo 'selected="selected"'; } ?>>Page galeries</option>
    <option value="5"<?php if($this->idPage==5) { echo 'selected="selected"'; } ?>>Page carte</option>
</select>
<?php
    }
    
    public function verifFormUpdateLink() {
        if(isset($_POST["submModif"])) {
        $this->getPostsUpdateLink();
        $this->verifPostsUpdateLink();
        if(Validator::getOk()) {
            $this->updateLink();
        }
        }
    }
    
    private function getPostsUpdateLink() {
        $this->idLink=  addslashes(htmlspecialchars($_POST["idLink"]));
        $this->idPage=  addslashes(htmlspecialchars($_POST["idPage"]));
        $this->url=  addslashes(htmlspecialchars($_POST["url"]));
        $this->libelle=  addslashes(htmlspecialchars($_POST["libelle"]));
    }
    
    private function verifPostsUpdateLink() {
        Validator::setOk(TRUE);
        $this->simpleIdValidator->validate($this->id);
        $this->urlLinkValidator->validateUrl($this->idPage, $this->url);
        $this->inputTextValidator->validateInputText($this->libelle, 5, 100);
    }
    
    private function updateLink() {
        $url="";
        if(!empty($this->url)) {
            $url=$this->url;
        } elseif(!empty($this->idPage)) {
            switch($this->idPage) {
                case 1:
                    $url="accueil.html";
                    break;
                case 2:
                    $url="prestations.html";
                    break;
                case 3:
                    $url="tarifs.html";
                    break;
                case 4:
                    $url="galeries.html";
                    break;
                case 5:
                    $url="carte.html";
                    break;
            }
        }
            //
            $query="UPDATE table_links_footer SET url=?, libelle=? WHERE id=?";
            $sth=$this->dbh->prepare($query);
            $array=array(
                $url,
                $this->libelle,
                $this->idLink
            );
            $sth->execute($array);
    }
    
    public function testDelLink() {
        if(isset($_POST["submDel"], $_POST["idLink"])) {
            $idLink=  addslashes(htmlspecialchars($_POST["idLink"]));
            //
            $query="DELETE FROM table_links_footer WHERE id=? AND id_footer=?";
            $sth=$this->dbh->prepare($query);
            $array=array(
                $idLink,
                $this->id
            );
            $sth->execute($array);
        }
    }
    
    public function testChangePos() {
        parent::testChangePos("table_links_footer", array("id_footer"=>$this->id));
    }
    
    public function getGets() {
        if(isset($_GET["idFooter"])) {
            $this->id=  addslashes(htmlspecialchars($_GET["idFooter"]));
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getIdFooter() {
        return $this->idFooter;
    }
    
    public function getIdPage() {
        return str_replace('\\', '', $this->idPage);
    }
    
    public function getUrl() {
        return str_replace('\\', '', $this->url);
    }
    
    public function getLibelle() {
        return str_replace('\\', '', $this->libelle);
    }
    
}

?>
