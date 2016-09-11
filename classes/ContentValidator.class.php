<?php

/**
 * Description of ContentValidator
 *
 * @author FS-ESPRIMO
 */
class ContentValidator extends Validator implements ValidatorsInterface {
    
    private $MIN_LENGTH=30;
    private $MAX_LENGTH=5000;
    
    public function validate($content){
        if(empty($content)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($content)<$this->MIN_LENGTH) {
            $this->errorMsg.="Champ trop court ($this->MIN_LENGTH Car. mini).<br/>";
        } elseif(strlen($content)>$this->MAX_LENGTH) {
            $this->errorMsg.="Champ trop long ($this->MAX_LENGTH Car. maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
