<?php
require_once("../includes/config.inc.php");
require_once("../includes/PageDataAccess.inc.php");

$pda = new PageDataAccess(getDBLink());

echo("ACTIVE PAGES<br>");

$activePages = $pda->getPageList();
var_dump($activePages);

echo("<br>ALL PAGES<br>");
$allPages = $pda->getPageList(false);
var_dump($allPages);

echo("<br>SINGLE PAGE</br>");
$page = $pda->getPageById(1);
var_dump($page);



echo("<br><b>SINGLE PAGE W/ ERRORS..<b><br>");

try {
    $page = $pda-> getPageBYId("blah"); #test to see if php is rlly not case sensitive. Crazy!
    var_dump($page);
} catch (Exception $e) {
    echo("Yes!!! The handleError() function be working slayy. It threw an exception!");
}

?>