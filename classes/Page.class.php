<?php
/**
 * Description of Page
 *
 * @author FS-ESPRIMO
 */
class Page extends Objet {
    
    protected $id=0;
    private $libelle="";
    protected $content="";
    protected $title="";
    protected $description="";
    protected $dateTxt="";
    private $numPage=0;
    //
    private $libelleValidator;
    protected $contentValidator;
    protected $titleValidator;
    protected $descriptionValidator;
    private $numPageValidator;


    public function __construct() {
       parent::__construct();
       $this->dbConnect();
       $this->contentValidator=new ContentValidator();
       $this->titleValidator=new TitleValidator();
       $this->descriptionValidator=new DescriptionValidator();
       $this->numPageValidator=new NumPageValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    
    public function verifFormUpdate() {
        if(isset($_POST["subm"])) {
            $this->getPostsUpdate();
            $this->verifPostsUpdate();
            if(Validator::getOk()) {
                $this->updatePage();
            }
        }
    }
    
    private function getPostsUpdate() {
        $this->numPage=  addslashes(htmlspecialchars($_POST["numPage"]));
        $this->content=$this->codeHTML($_POST["content"]);
        $this->title=  addslashes(htmlspecialchars($_POST["title"]));
        $this->description=  addslashes(htmlspecialchars($_POST["description"]));
    }
    
    private function verifPostsUpdate() {
        Validator::setOk(TRUE);
        $this->contentValidator->validate($this->content);
        $this->titleValidator->validate($this->title);
        $this->descriptionValidator->validate($this->description);
        $this->numPageValidator->validate($this->numPage);
    }
    
    private function updatePage() {
        if(!empty($this->numPage)) {
            $table="";
            switch ($this->numPage) {
                case 1:
                    $table="table_home_page";
                    break;;
                case 2:
                    $table="table_prestation_page";
                    break;
                case 3:
                    $table="table_tarifs_page";
                    break;
                case 4:
                    $table="table_carte_page";
                    break;
            }
            if(!empty($table)) {
                $query="UPDATE ".$table." SET content=?,title=?,description=?,tstp=? WHERE id=?";
                $sth=$this->dbh->prepare($query);
                $array=array(
                    $this->content,
                    $this->title,
                    $this->description,
                    time(),
                    $this->id
                );
                $sth->execute($array);
                $this->message="Modifications enregistrées !";
                $this->test=1;
            }
        }
    }
    
    public function initInfosPage() {
        if(!empty($this->numPage)) {
            $table="";
        switch($this->numPage) {
            case 1:
                $table="table_home_page";
                break;
            case 2:
                $table="table_prestation_page";
                break;
            case 3:
                $table="table_tarifs_page";
                break;
            case 4:
                $table="table_carte_page";
                break;
        }
        if(!empty($table)) {
            $query="SELECT id,content,title,description,tstp FROM ".$table." LIMIT 0,1";
            $sth=$this->dbh->prepare($query);
            $sth->execute();
            $row=$sth->fetchObject();
            if($row!=NULL) {
                $this->id=$row->id;
                $this->content=$row->content;
                $this->title=$row->title;
                $this->description=$row->description;
                $this->dateTxt="le ".date("d-m-Y", $row->tstp);
            }
        }
        }
    }
    
    public function getGetNumPage() {
        $this->numPage=1;
        if(isset($_GET["numPage"])) {
            $this->numPage=  addslashes(htmlspecialchars($_GET["numPage"]));
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLibelle() {
        return str_replace('\\', '', $this->libelle);
    }
    
    public function getContent() {
        return str_replace('\\', '', $this->content);
    }
    
    public function getTitle() {
        return str_replace('\\', '', $this->title);
    }
    
    public function getDescription() {
        return str_replace('\\', '', $this->description);
    }
    
    public function getDateTxt() {
        return str_replace('\\', '', $this->dateTxt);
    }
    
    public function getValidator($validator) {
        switch ($validator) {
            case 'libelle':
                return $this->libelleValidator;
                break;
            case 'content':
                return $this->contentValidator;
                break;
            case 'title':
                return $this->titleValidator;
                break;
            case 'description':
                return $this->descriptionValidator;
                break;
            case 'numPage':
                return $this->numPageValidator;
                break;
        }
        return NULL;
    }
    
    public function getNumPage() {
        return $this->numPage;
    }
    
    public function setNumPage($numPage) {
        $this->numPage=$numPage;
    }
}

