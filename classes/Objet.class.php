<?php
class Objet {
    
    protected $dbh=NULL;
    protected $errorMsg="";
    protected $test=0;
    protected $message="";




    function __construct() {
        if (!defined("HOSTNAME")) {
            define("HOSTNAME", "sql-1");
        }
        if (!defined("DBNAME")) {
            define("DBNAME", "hardibopj1_base");
        }
        if (!defined("DBUSER")) {
            define("DBUSER", "hardibopj1");
        }
        if (!defined("DBPASS")) {
            define("DBPASS", "Go11ROnCAhVX");
        }
    }
    
    function __destruct() {
        if($this->dbh!=NULL) {
            $this->dbh=NULL;
        }
    }

    protected function dbConnect() {
        try {
            $this->dbh=new PDO('mysql:host='.HOSTNAME.';dbname='.DBNAME, DBUSER, DBPASS);
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données : ".$e->getMessage()."<br/>";
    }
    }
    
    protected function codeHTML($texte) {
        $texte=  str_replace('<script', '&lt;script', $texte);
        $texte=  str_replace('<%', '&lt;%', $texte);
        $texte=  str_replace('<?', '&lt;?', $texte);
        $texte=  addslashes($texte);
        return $texte;
    }
    
    protected function codeURL($titre, $id) {
        return urlencode("page-".$id."-".strtolower(str_replace((' '), '-', $titre)).".html");
    }

    protected function convBool($bool) {
        if($bool) {
            return 1;
        } else {
            return 0;
        }
    }
    
    protected function convBoolInt($int) {
        if(empty($int)) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function isEmail($email) {
        return preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email);
    }
    
    protected function tooLong($txt, $len) {
        return (strlen($txt)>$len);
    }
    
    protected function getSha1($nb) {
        $code="";
        for($i=0; $i<$nb; $i++) {
            
        }
    }
        
    public function testChangePos($table, $arrayField=NULL) {
        if(isset($_GET["idUp"])||isset($_GET["idDown"])) {
            $up=TRUE;
            $id1=0;
            if(isset($_GET["idUp"])) {
                $id1=  addslashes(htmlspecialchars($_GET["idUp"]));
            } elseif(isset($_GET["idDown"])) {
                $up=FALSE;
                $id1=  addslashes(htmlspecialchars($_GET["idDown"]));
            }
            //
            $arrayCond=array();
            $condition="";
            $i=1;
            if($arrayField!=NULL) {
                foreach($arrayField as $key=>$value) {
                    $condition.=" AND $key=?";
                    $arrayCond[$i]=$value;
                    $i++;
                }
            }
            //
            $query="SELECT tstp FROM ".$table." WHERE id=?$condition LIMIT 0,1";
            //echo $query;
            $sth=$this->dbh->prepare($query);
            $array=array($id1);
            $arrayFinal=array_merge((array)$array, (array)$arrayCond);
            $sth->execute($arrayFinal);
            $row=$sth->fetchObject();
            if($row!=NULL) {
                //echo 'ok';
                $tstp1=$row->tstp;
                //
                if($up) {
                    $query="SELECT id,tstp FROM ".$table." WHERE tstp<?$condition ORDER BY tstp DESC LIMIT 0,1";
                } else {
                    $query="SELECT id,tstp FROM ".$table." WHERE tstp>?$condition ORDER BY tstp ASC LIMIT 0,1";
                }
                $sth=$this->dbh->prepare($query);
                $array=array($tstp1);
                $arrayFinal=array_merge($array, $arrayCond);
                $sth->execute($arrayFinal);
                $row=$sth->fetchObject();
                if($row!=NULL) {
                    $id2=$row->id;
                    $tstp2=$row->tstp;
                    //
                    $query="UPDATE ".$table." SET tstp=? WHERE id=?$condition";
                    $sth=$this->dbh->prepare($query);
                    $array=array(
                        $tstp1,
                        $id2
                    );
                    $arrayFinal=array_merge($array, $arrayCond);
                    $sth->execute($arrayFinal);
                    //
                    $array=array(
                        $tstp2,
                        $id1
                    );
                    $arrayFinal=array_merge($array, $arrayCond);
                    $sth->execute($arrayFinal);
                }
            }
        }
    }
    
    protected function deleteSQL($table, $fieldName, $fieldValue) {
            $query="DELETE FROM ".$table." WHERE ".$fieldName."=?";
            $sth=$this->dbh->prepare($query);
            $array=array($fieldValue);
            $sth->execute($array);
    }

    protected function updateSQL($table, $arrayFields, $arrayCond) {
        $query="UPDATE $table SET ";
        $array=array();
        $i=0;
        foreach($arrayFields as $key=>$value) {
            $query.="$key=?,";
            $array[$i]=$value;
            $i++;
        }
        $query=  substr($query, 0, strlen($query)-1)." WHERE ";
        //
        foreach($arrayCond as $key=>$value) {
            $query.="$key=? AND";
            $array[$i]=$value;
            $i++;
        }
        $query=  substr($query, 0, strlen($query)-4);
        //
        $sth=$this->dbh->prepare($query);
        $sth->execute($array);
    }

    public function getErrorMsg() {
        return str_replace('\\', '', $this->errorMsg);
    }
    
    public function setErrorMsg($message) {
        $this->errorMsg.=$message;
    }
    
    public function getMessage() {
        return str_replace('\\', '', $this->message);
    }
    
    public function getTest() {
        return $this->test;
    }
    
    
    
    protected function blank() {
        $this->errorMsg="";
        $this->test=0;
    }
}

?>
