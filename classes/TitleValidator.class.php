<?php

/**
 * Description of TitleValidator
 *
 * @author FS-ESPRIMO
 */
class TitleValidator extends Validator implements ValidatorsInterface {
    
    private $MIN_LENGTH=10;
    private $MAX_LENGTH=200;
    
    public function validate($title) {
        if(empty($title)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($title)<$this->MIN_LENGTH) {
            $this->errorMsg.="Champ trop court ($this->MIN_LENGTH Car. mini).<br/>";
        } elseif(strlen($title)>$this->MAX_LENGTH) {
            $this->errorMsg.="Champ trop long ($this->MAX_LENGTH Car. maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
