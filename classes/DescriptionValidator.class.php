<?php

/**
 * Description of TitleValidator
 *
 * @author FS-ESPRIMO
 */
class DescriptionValidator extends Validator implements ValidatorsInterface {
    
    private $MIN_LENGTH=20;
    private $MAX_LENGTH=500;
    
    public function validate($description) {
        if(empty($description)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($description)<$this->MIN_LENGTH) {
            $this->errorMsg.="Champ trop court ($this->MIN_LENGTH Car. mini).<br/>";
        } elseif(strlen($description)>$this->MAX_LENGTH) {
            $this->errorMsg.="Champ trop long ($this->MAX_LENGTH Car. maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
