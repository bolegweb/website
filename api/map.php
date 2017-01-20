<?php

//error_reporting(E_ALL);
//ini_set("display_errors",1);
// sem treba dat settings aby bolo DBQ do dbq
require '../settings.php';





$out=array();
$out[] = array("Country", "Number of Active OGC Services");

//$q=dbq("SELECT `location`, count(location) as count FROM services WHERE `location` != '' AND `status` = 1 GROUP BY `location` ORDER BY `location` ASC");

$q=dbq("SELECT `location`, count(location) as count FROM services WHERE `location` != '' AND `version` != '' GROUP BY `location` ORDER BY `location` ASC");


while ($r = mysql_fetch_assoc($q) ) {

//$out[$r['location']] = $r['count'];
$out[] = array($r['location'], 0 + $r['count']);

}

//print "<pre>";
print json_encode($out,JSON_PRETTY_PRINT);
//print "</pre>";
//print_r ($out);
	
?>