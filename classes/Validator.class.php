<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author FS-ESPRIMO
 */
class Validator extends Objet implements ValidatorsInterface {
    
    protected static $ok=TRUE;

    public function validate($field) {
        if(!empty($this->errorMsg)) {
            Validator::$ok=FALSE;
        }
    }
    
    public static function getOk() {
        return Validator::$ok;
    }
    
    public static function setOk($value) {
        Validator::$ok=$value;
    }
}

?>
