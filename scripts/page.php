<?php
$page=new Page();
$page->getGetNumPage();
$page->initInfosPage();
echo $page->getContent();