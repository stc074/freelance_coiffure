<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputTextValidator
 *
 * @author FS-ESPRIMO
 */
class InputTextValidator extends Validator implements ValidatorsInterfaceText {
    
    public function validateInputText($value, $min, $max) {
        if(empty($value)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($value)<$min) {
            $this->errorMsg.="Champ trop court ($min Car. mini).<br/>";
        } elseif(strlen($value)>$max) {
            $this->errorMsg.="Champ trop long ($max Car. maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
