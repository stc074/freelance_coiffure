<?php
$page=0;
if(isset($_GET["page"])) {
    $page=  addslashes(htmlspecialchars($_GET["page"]));
}

function myAutoLoader($class) {
    include 'classes/'.$class.'.class.php';
}

spl_autoload_register("myAutoLoader");

//
$tags=new Tags();
$tags->getGets();
$tags->initTags();