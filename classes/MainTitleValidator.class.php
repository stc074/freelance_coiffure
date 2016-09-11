<?php

/**
 * Description of MainTitleValidator
 *
 * @author FS-ESPRIMO
 */
class MainTitleValidator extends Validator implements ValidatorsInterface {
    
    private $MIN_LENGTH=8;
    private $MAX_LENGTH=100;
   
    public function validate($field) {
        if(empty($field)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($field)<$this->MIN_LENGTH) {
            $this->errorMsg.="Champ trop court ($this->MIN_LENGTH Car. mini).<br/>";
        } elseif(strlen($field)>$this->MAX_LENGTH) {
            $this->errorMsg.="Champ trop long ($this->MAX_LENGTH Car. maxi).<br/>";
        }
    }
}

?>
