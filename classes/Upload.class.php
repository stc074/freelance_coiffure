<?php

/**
 * Description of Upload
 *
 * @author FS-ESPRIMO
 */
class Upload extends Objet {
    
    protected $fieldName="";
    protected $uploadValidator;

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->uploadValidator=new UploadValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    protected function verifSingleFile($maxSize, $maxSizeTxt, $arrayExtensions) {
        $this->uploadValidator->validateImg($this->fieldName, $maxSize, $maxSizeTxt, $arrayExtensions);
    }
    
}

?>
