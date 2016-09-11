<?php

/**
 * Description of HomePage
 *
 * @author FS-ESPRIMO
 */
class HomePage extends Page {
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function initInfos() {
        $query="SELECT id,content,title,description,tstp FROM table_home_page LIMIT 0,1";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        $row=$sth->fetchObject();
        if($row!=NULL) {
            $this->id=$row->id;
            $this->content=$row->content;
            $this->title=$row->title;
            $this->description=$row->description;
            $this->dateTxt="le ".date("d/m/Y", $row->tstp);
        }
    }
    
    public function verifFormInsert() {
        if(isset($_POST["subm"])) {
            $this->getPostsInsert();
            $this->verifPostsInsert();
            if(Validator::getOk()) {
                $this->updateHomePage();
            }
        }
    }
    
    private function getPostsInsert() {
        $this->content=$this->codeHTML($_POST["content"]);
        $this->title=  addslashes(htmlspecialchars($_POST["title"]));
        $this->description=  addslashes(htmlspecialchars($_POST["description"]));
    }
    
    private function verifPostsInsert() {
        $this->contentValidator->validate($this->content);
        $this->titleValidator->validate($this->title);
        $this->descriptionValidator->validate($this->description);
    }
    
    private function updateHomePage() {
        $query="UPDATE table_home_page SET content=?,title=?,description=?,tstp=? WHERE id=?";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->content,
            $this->title,
            $this->description,
            time(),
            $this->id
        );
        $sth->execute($array);
        $img=new Image();
        $img->resizeAll($this->getContent());
    }
    
}

?>
