<?php

/**
 * Description of Title
 *
 * @author FS-ESPRIMO
 */
class Title extends Objet {
    
    private $id=0;
    private $title="";
    private $dateTxt="";
    private $mainTitleValidator;
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
        $this->mainTitleValidator=new MainTitleValidator();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function initTitle() {
        $query="SELECT id, title, tstp FROM table_title LIMIT 0,1";
        $sth=  $this->dbh->prepare($query);
        $sth->execute();
        $row=$sth->fetchObject();
        if($row!=NULL) {
            $this->id=$row->id;
            $this->title=$row->title;
            $this->dateTxt="le ".date("d-m-Y", $row->tstp);
        }
    }
    
    public function verifFormUpdate() {
        if(isset($_POST["subm"], $_POST["title"])) {
            $this->getPostUpdate();
            Validator::setOk(TRUE);
            $this->verifPostUpdate();
            if(Validator::getOk()) {
                $this->updateTitle();
            }
        }
    }
    
    private function getPostUpdate() {
        $this->title=  addslashes(htmlspecialchars($_POST["title"]));
    }
    
    private function verifPostUpdate() {
        $this->mainTitleValidator->validate($this->title);
    }
    
    private function updateTitle() {
        $query="UPDATE table_title SET title=?,tstp=? WHERE id=?";
        $sth=$this->dbh->prepare($query);
        $array=array(
            $this->title,
            time(),
            $this->id
        );
        $sth->execute($array);
        $this->test=1;
    }
    
    public function getValidator($validator) {
        switch ($validator) {
            case 'mainTitle':
                return $this->mainTitleValidator;
                break;
        }
        return NULL;
    }


    public function getTitle() {
        return str_replace('\\', '', $this->title);
    }
    
    public function getDateTxt() {
        return str_replace('\\', '', $this->dateTxt);
    }
}

?>
