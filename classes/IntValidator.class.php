<?php

/**
 * Description of IntValidator
 *
 * @author FS-ESPRIMO
 */
class IntValidator extends Validator {
   
    public function validateInt($value, $min, $max, $lengthMax) {
        if(empty($value)) {
            $this->errorMsg.="Champ vide.<br/>";
        } elseif(strlen($value)>$lengthMax) {
            $this->errorMsg.="Champ trop long ($lengthMax Car. maxi).<br/>";
        } elseif(!preg_match("#^\-{0,1}[0-9]{1,10}$#", $value)) {
            $this->errorMsg.="Chamlp non valide.<br/>";
        } elseif($value<$min) {
            $this->errorMsg.="Champ trop petit ($min Mini).<br/>";
        } elseif($value>$max) {
            $this->errorMsg.="Champ trop grand ($max maxi).<br/>";
        }
        parent::validate("");
    }
}

?>
