<?php

//error_reporting(E_ALL);
//ini_set("display_errors",1);
// sem treba dat settings aby bolo DBQ do dbq
require '../settings.php';





$out=array();
$out[] = array("Service Type", "Metadata Count");

$q=dbq("SELECT type, metadata FROM view_metadata");


while ($r = mysql_fetch_assoc($q) ) {

//$out[$r['location']] = $r['count'];
$out[] = array(strtoupper($r['type']), 0 + $r['metadata']);

}

//print "<pre>";
print json_encode($out,JSON_PRETTY_PRINT);
//print "</pre>";
//print_r ($out);
	
?>