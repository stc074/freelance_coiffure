<?php


/**
 * Description of UrlLinkValidator
 *
 * @author FS-ESPRIMO
 */
class UrlLinkValidator extends Validator {
    
    private $MAX_LENGTH=200;
    
    public function validateUrl($id, $url) {
        if(empty($id)&&empty($url)) {
            $this->errorMsg.="Vous devez: soit choisir une page, soit saisir une URL";
        } elseif(strlen($url)>$this->MAX_LENGTH) {
            $this->errorMsg.="URL trop longue ($this->MAX_LENGTH Car. maxi).<br/>";
        }
    }
}

?>
