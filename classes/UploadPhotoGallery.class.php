<?php


/**
 * Description of UploadPhotoGallery
 *
 * @author FS-ESPRIMO
 */
class UploadPhotoGallery extends UploadImage {
    
    private $id=0;
    private $idGallery=0;
    private $simpleIdValidator;
    private $maxSizeTxt="2 Méga";
    
    public function __construct() {
        parent::__construct();
        $this->simpleIdValidator=new SimpleIdValidator();
        $this->fieldName="photo";
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function verifFormAdd() {
        if(isset($_POST["subm"])) {
            $this->getPostAdd();
            Validator::setOk(TRUE);
            $this->verifPostAdd();
            $this->verifUploadPhoto();
            if(Validator::getOk()) {
                $this->addPhoto();
            }
        }
    }
    
    private function getPostAdd() {
        $this->idGallery=  addslashes(htmlspecialchars($_POST["idGalerie"]));
    }
    
    private function verifPostAdd() {
        $this->simpleIdValidator->validate($this->idGallery);
    }
    
    private function verifUploadPhoto() {
        parent::verifSingleFile(Datas::$MAX_UPLOAD_IMAGE, $this->maxSizeTxt);
    }
    
    private function addPhoto() {
        $extension=  strtolower(strrchr($_FILES[$this->fieldName]["name"], "."));
        //
        $query="INSERT INTO table_images_galeries (id_galerie, extension, tstp) VALUES (?, ?, ?)";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->idGallery,
            $extension,
            time()
        );
        $sth->execute($array);
        $this->id=$this->dbh->lastInsertId();
        $filename="../imagesGallery/img".$this->id.$extension;
        parent::uploadFile($filename);
        $img=new Image();
        $img->init($filename, $extension);
        $portrait=0;
        if($img->getHauteurSource()>=$img->getLargeurSource()) {
            $portrait=1;
        }
        //
        $query="UPDATE table_images_galeries SET portrait=? WHERE id=?";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $portrait,
            $this->id
        );
        $sth->execute($array);
        
        $filenameDest="../imagesGallery/imgMini".$this->id.$extension;
        parent::miniHeight($filename, $filenameDest, $extension, Datas::$HEIGHT_MINI);
        $this->test=1;
    }

    public function getGets() {
        if(isset($_GET["idGalerie"])) {
            $this->idGallery=  addslashes(htmlspecialchars($_GET["idGalerie"]));
        }
    }
    
    public function getValidator($validator) {
        switch ($validator) {
            case 'simpleId':
                return $this->simpleIdValidator;
                break;
            case 'upload':
                return $this->uploadValidator;
                echo 'okValidator';
                break;
        }
        return new Validator();
    }
    
    public function getIdGallery() {
        return $this->idGallery;
    }
}

?>
