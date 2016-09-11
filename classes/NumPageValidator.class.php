<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NumPageValidator
 *
 * @author FS-ESPRIMO
 */
class NumPageValidator extends Validator implements ValidatorsInterface {
    
    public function validate($numPage) {
        if(empty($numPage)) {
            $this->errorMsg.="Choisissez une page SVP.";
        } elseif($numPage<1||$numPage>4) {
            $this->errorMsg.="Choisissez une page SVP.";
        }
        parent::validate("");
    }
}

?>
