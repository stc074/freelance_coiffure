<?php


/**
 * Description of Map
 *
 * @author FS-ESPRIMO
 */
class Map extends Objet {
    
    private $latitude=45.8992470;
    private $longitude=6.1293840;
    //
    private $idZoom=0;
    private $zoom=0;
    //
    private $intValidator=NULL;
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->intValidator=new IntValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function initZoom() {
        $query="SELECT id,zoom FROM table_zoom_carte LIMIT 0,1";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $row=$sth->fetchObject();
        if($row!=NULL) {
            $this->idZoom=$row->id;
            $this->zoom=$row->zoom;
        }
    }
    
    public function verifFormUpdateZoom() {
        if(isset($_POST["submModif"], $_POST["zoom"])) {
            $this->getPostUpdateZoom();
            $this->verifPostUpdateZoom();
            if(Validator::getOk()) {
                $this->updateZoom();
            }
        }
    }
    
    private function getPostUpdateZoom() {
        $this->zoom=  addslashes(htmlspecialchars($_POST["zoom"]));
    }
    
    private function verifPostUpdateZoom() {
        Validator::setOk(TRUE);
        $this->intValidator->validateInt($this->zoom, 0, 1000, 10);
    }
    
    private function updateZoom() {
        parent::updateSQL("table_zoom_carte", array("zoom"=>$this->getZoom()), array("id"=>$this->getIdZoom()));
    }
    
    public function getValidator($validator) {
        switch ($validator) {
            case 'int':
                return $this->intValidator;
                break;
        }
        return new Validator();
    }
    
    public function getIdZoom() {
        return $this->idZoom;
    }
    
    public function getZoom() {
        return str_replace('\\', '', $this->zoom);
    }
    
    public function getLatitude() {
        return $this->latitude;
    }
    
    public function getLongitude() {
        return $this->longitude;
    }
}

?>
