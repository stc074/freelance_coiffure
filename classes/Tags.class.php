<?php
class Tags extends Objet {
    
    private $title="Freelance Coiffure";
    private $description="Freelance Coiffure";
    //
    private $page=0;
    private $numPage=1;
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function initTags() {
        switch($this->page) {
            case 0:
                switch($this->numPage) {
                    case 1:
                        $this->getPageTags("table_home_page");
                        break;
                    case 2:
                        $this->getPageTags("table_prestation_page");
                        break;
                    case 3:
                        $this->getPageTags("table_tarifs_page");
                        break;
                }
                break;
            case 1:
                $this->title="Freelance coiffure Annecy - Galeries de photos";
                $this->description="Freelance coiffure sur Annecy et sa région - Galeries de photos.";
                break;
            case 2:
                $this->getPageTags("table_carte_page");
                break;
        }
    }
    
    private function getPageTags($table) {
        $query="SELECT title,description FROM $table LIMIT 0,1";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $row=$sth->fetchObject();
        if($row!=NULL) {
            $this->title=$row->title;
            $this->description=$row->description;
        }
    }
    
    public function getGets() {
        if(isset($_GET["page"])) {
            $this->page=  addslashes(htmlspecialchars($_GET["page"]));
        }
        if(isset($_GET["numPage"])) {
            $this->numPage=  addslashes(htmlspecialchars($_GET["numPage"]));
        }
    }
    
    public function getTitle() {
        return str_replace('\\', '', $this->title);
    }
    
    public function getDescription() {
        return str_replace('\\', '', $this->description);
    }
}

?>
