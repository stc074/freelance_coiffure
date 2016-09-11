<?php
/**
 * Description of UploadValidator
 *
 * @author FS-ESPRIMO
 */
class UploadValidator extends Validator implements ValidatorsInterfaceImg {
    
    
    public function validateImg($field, $maxSize, $maxSizeTxt, $arrayExtensions) {
        if(isset($_FILES[$field])) {
        switch($_FILES[$field]["error"]) {
            case UPLOAD_ERR_NO_FILE:
                $this->errorMsg.="Aucun fichier selectionné.<br/>";
                break;
            case UPLOAD_ERR_INI_SIZE:
                $this->errorMsg.="Fichier trop gros pour cette configuration.<br/>";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $this->errorMsg.="Fichier trop gros ($maxSizeTxt Maxi).<br/>";
                break;
            case UPLOAD_ERR_PARTIAL:
                $this->errorMsg.="Fichier partiellement transféré.<br/>";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $this->errorMsg.="Le dossier temporaire nécessaire à l'upload est manquant.<br/>";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $this->errorMsg.="Échec de l'écriture du fichier.<br/>";
                break;
            case UPLOAD_ERR_EXTENSION:
                $this->errorMsg.="Une extension PHP a arrêté l'envoi de fichier.<br/>";
                break;
        }
        if(empty($this->errorMsg)) {
            if($_FILES[$field]["size"]>$maxSize) {
                $this->errorMsg.="Le fichier est trop volumineux ($maxSizeTxt Maxi).<br/>";
            }
            $extension= strtolower(strrchr($_FILES[$field]["name"], "."));
            if(!in_array($extension, $arrayExtensions)) {
                $this->errorMsg.="Mauvais format de fichier (";
                foreach($arrayExtensions as $ext) {
                    $this->errorMsg.=strtoupper(str_replace('.', '', $ext)).", ";
                }
                $this->errorMsg=substr($this->errorMsg, 0, strlen($this->errorMsg)-2);
                $this->errorMsg.=").<br/>";
            }    
        }
        } else {
            $this->errorMsg.="Erreur de formulaire.<br/>";
        }
        parent::validate("");
    }
}

?>
