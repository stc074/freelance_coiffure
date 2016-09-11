<?php

/**
 * Description of TitleValidator
 *
 * @author FS-ESPRIMO
 */
class LibelleValidator extends Validator implements ValidatorsInterface {
    
    private $MIN_LENGTH=2;
    private $MAX_LENGTH=200;
    
    public function validate($libelle) {
        if(empty($libelle)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($libelle)<$this->MIN_LENGTH) {
            $this->errorMsg.="Champ trop court ($this->MIN_LENGTH Car. mini).<br/>";
        } elseif(strlen($libelle)>$this->MAX_LENGTH) {
            $this->errorMsg.="Champ trop long ($this->MAX_LENGTH Car. maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
