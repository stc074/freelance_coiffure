<?php

/**
 * Description of SimpleIdValidator
 *
 * @author FS-ESPRIMO
 */
class SimpleIdValidator extends Validator implements ValidatorsInterface {
    
    public function validate($field) {
        if(empty($field)) {
            $this->errorMsg.="Veuillez choisir une option SVP.<br/>";
        }
        parent::validate("");
    }
}

?>
