<?php
/**
 * Description of UploadImage
 *
 * @author FS-ESPRIMO
 */
class UploadImage extends Upload {
    
    protected $arrayExtensionsImage=array('.jpg', '.jpeg', '.png', '.gif');


    public function __construct() {
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    protected function verifSingleFile($maxSize, $maxSizeTxt) {
        parent::verifSingleFile($maxSize, $maxSizeTxt, $this->arrayExtensionsImage);
    }
    
    protected function uploadFile($filename) {
        $img=new Image();
        $img->init($_FILES[$this->fieldName]["tmp_name"], strtolower(strrchr($_FILES[$this->fieldName]["name"], ".")));
        $imageSizes=  getimagesize($_FILES[$this->fieldName]["tmp_name"]);
        $width=$imageSizes[0];
        $height=$imageSizes[1];
        if($width>Datas::$MAX_WIDTH_PHOTO) {
            $img->resizeWidth(Datas::$MAX_WIDTH_PHOTO, $_FILES[$this->fieldName]["tmp_name"]);
        }
        if($height>Datas::$MAX_HEIGHT_PHOTO) {
            $img->resizeHeight(Datas::$MAX_HEIGHT_PHOTO, $_FILES[$this->fieldName]["tmp_name"]);
        }
        $result=  move_uploaded_file($_FILES[$this->fieldName]["tmp_name"], $filename);
        if(!$result) {
            $this->uploadValidator->setErrorMsg("Erreur lors de l'upload du fichier");
            Validator::setOk(FALSE);
        }
    }
    
    protected function miniHeight($filenameSrc, $filenameDest, $extension, $height) {
        $img=new Image();
        $img->init($filenameSrc, $extension);
        $img->resizeHeight($height, $filenameDest);
    }
    
 }

?>
