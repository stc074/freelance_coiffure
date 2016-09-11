<?php
/**
 * Description of Gallery
 *
 * @author FS-ESPRIMO
 */
class Gallery extends Objet {
    
    private $id=0;
    private $libelle="";
    private $libelleValidator;
    private $dossier="imagesGallery/";
    private $dossierAdmin="../imagesGallery/";
    private $divGallery="";
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->libelleValidator=new LibelleValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function verifFormNew() {
        if(isset($_POST["subm"], $_POST["libelle"])) {
            $this->getPostNew();
            Validator::setOk(TRUE);
            $this->verifPostNew();
            if(Validator::getOk()) {
                $this->insertNew();
            }
        }
    }
    
    private function getPostNew() {
        $this->libelle=  addslashes(htmlspecialchars($_POST["libelle"]));
    }
    
    private function verifPostNew() {
        $this->libelleValidator->validate($this->libelle);
    }
    
    private function insertNew() {
        $query="INSERT INTO table_galeries (libelle,tstp) VALUES (?,?)";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->libelle,
            time()
        );
        $sth->execute($array);
        $this->message='Galerie "'.$this->getLibelle().'" enregistrée !';
        $this->blank();
        $this->test=1;
    }
    
    public function dispGallery($admin=TRUE) {
        if(isset($_GET["idGallery"])) {
            $this->id=  addslashes(htmlspecialchars($_GET["idGallery"]));
        }
        if(empty($this->id)) {
            $this->errorMsg.="Galerie inconnue !<br/>";
        } else {
            $dossier=$this->dossier;
            if($admin) {
                $dossier=$this->dossierAdmin;
            }
            $query="SELECT libelle FROM table_galeries WHERE id=? LIMIT 0,1";
            $sth=$this->dbh->prepare($query);
            $array=array($this->id);
            $sth->execute($array);
            $row=$sth->fetchObject();
            if($row!=NULL) {
                $this->libelle=$row->libelle;
            } else {
                $this->errorMsg.="Galerie inconnue !<br/>";
            }
            $this->divGallery='<div class="gallery">';
        $query="SELECT id,extension,comment,portrait FROM table_images_galeries WHERE id_galerie=? ORDER BY tstp ASC";
        $sth=$this->dbh->prepare($query);
        $array=array($this->id);
        $sth->execute($array);
        $flag=TRUE;
        $nb=0;
        while($row=$sth->fetchObject()) {
            $idImg=$row->id;
            $extension=$row->extension;
            $comment=  str_replace('\\', '', $row->comment);
            $portrait=$row->portrait;
            $filename=$this->dossier."img".$idImg.$extension;
            $filename2=$dossier."img".$idImg.$extension;
            if(file_exists($filename)) {
                $nb++;
            $this->divGallery.='
    <img src="'.$filename2.'" alt="'.$comment.'"';
            if($flag) {
                $flag=FALSE;
                $this->divGallery.=' class="start"';
            }
            if($portrait==1) {
                $this->divGallery.=' layout="portrait"';
            }
            $this->divGallery.=' />';
            }
        }
        if(empty($nb)) {
            $this->errorMsg.="Galerie vide, désolé.<br/>";
        }
        $this->divGallery.='
</div>';
        }
    }
    
    public function initInfos() {
        if(!empty($this->id)) {
        $query="SELECT libelle FROM table_galeries WHERE id=? LIMIT 0,1";
        $sth=$this->dbh->prepare($query);
        $array=array($this->id);
        $sth->execute($array);
        $row=$sth->fetchObject();
        if($row!=NULL) {
            $this->libelle=$row->libelle;
        }
        }
    }
    
    public function dispPhotos() {
        $query="SELECT id,extension FROM table_images_galeries WHERE id_galerie=? ORDER BY tstp ASC";
        $sth=$this->dbh->prepare($query);
        $array=array($this->id);
        $sth->execute($array);
        while($row=$sth->fetchObject()) {
            $id=$row->id;
            $extension=$row->extension;
            $filename=$this->dossierAdmin."imgMini".$id.$extension;
            if(file_exists($filename)) {
                $img=new Image();
                $img->init($filename, $extension);
                ?>
<div class="up" onclick="javascript:window.location.href='photo-up-<?php echo $this->id; ?>-<?php echo $id; ?>.html';"></div>
<div class="alignCenter">
<div class="screenshot inlineBlock">
        <img src="<?php echo $filename; ?>" width="<?php echo $img->getLargeurSource(); ?>" height="<?php echo $img->getHauteurSource(); ?>" />
    </div>
<div class="inlineBlock cursorPointer" onclick="javascript:window.location.href='delete-photo-<?php echo $this->id; ?>-<?php echo $id; ?>.html';">
    <div class="delete"></div>
    <div class="inlineBlock">&rarr;Éffacer cette photo</div>
</div>
</div>
<div class="down" onclick="javascript:window.location.href='photo-down-<?php echo $this->id; ?>-<?php echo $id; ?>.html';"></div>
<p></p>
<?php
            }
        }
    }
    
    public function testPosPhotos() {
        parent::testChangePos("table_images_galeries", array("id_galerie"=>$this->id));
    }
    
    public function testDelPhoto() {
        if(isset($_GET["idDel"])) {
            $idPhoto=  addslashes(htmlspecialchars($_GET["idDel"]));
            //
            $query="SELECT extension FROM table_images_galeries WHERE id=? LIMIT 0,1";
            $sth=$this->dbh->prepare($query);
            $array=array($idPhoto);
            $sth->execute($array);
            $row=$sth->fetchObject();
            if($row!=NULL) {
                $extension=$row->extension;
                //
                $filename=$this->dossierAdmin."img".$idPhoto.$extension;
                $filenameMini=$this->dossierAdmin."imgMini".$idPhoto.$extension;
                if(file_exists($filename)) {
                    unlink($filename);
                }
                if(file_exists($filenameMini)) {
                    unlink($filenameMini);
                }
                //
                $query="DELETE FROM table_images_galeries WHERE id=?";
                $sth=$this->dbh->prepare($query);
                $array=array($idPhoto);
                $sth->execute($array);
            }
        }
    }
    
    public function getGets() {
        if(isset($_GET["idGallery"])) {
            $this->id=  addslashes(htmlspecialchars($_GET["idGallery"]));
        }
    }
    
    protected function blank() {
        parent::blank();
        $this->libelle="";
    }


    public function getValidator($validator) {
        switch($validator) {
            case 'libelle':
                return $this->libelleValidator;
                break;
        }
        return NULL;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLibelle() {
        return str_replace('\\', '', $this->libelle);
    }
    
    public function getDivGallery() {
        return $this->divGallery;
    }
}

?>
