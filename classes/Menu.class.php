<?php
/**
 * Description of Menu
 *
 * @author FS-ESPRIMO
 */
class Menu extends Objet {
    
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
    public function dispMenuAdmin() {
        ?>
<div id="menu2">
    <ul class="menu2">
        <?php
        $query="SELECT id,libelle FROM table_menu ORDER BY tstp ASC";
        $sth=$this->dbh->prepare($query);
        $sth->execute();
        while($row=$sth->fetchObject()) {
            $idMenu=$row->id;
            $libelle=  str_replace('\\', '', $row->libelle);
            ?>
        <li><a href="edit-menu-<?php echo $idMenu; ?>.html" class="parent"><span><?php echo $libelle; ?></span></a>
            <div>
                <ul>
                    <?php
                    $query2="SELECT id,libelle FROM table_sub_menu WHERE id_menu=? ORDER BY tstp ASC";
                    $sth2=$this->dbh->prepare($query2);
                    $array=array($idMenu);
                    $sth2->execute($array);
                    while($row2=$sth2->fetchObject()) {
                        $idSubMenu=$row2->id;
                        $libelle=  str_replace('\\', '', $row2->libelle);
                        ?>
                    <li><a href="edit-sub-menu-<?php echo $idSubMenu; ?>.html"><span><?php echo $libelle; ?></span></a></li>
                    <?php
                    }
                    ?>
                    <li><a href="edit-sub-menu.html"><span>Ajouter</span></a></li>
                </ul>
            </div>
        </li>
        <?php
        }
        ?>
        <li class="last"><a href="edit-menu.html">Ajouter</a></li>
    </ul>
</div>
<?php
    }
}

?>
