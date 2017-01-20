<?php

$db = new SQLite3('/usr/share/pycsw/tests/suites/cite/data/ogcwxs.db');
//header('Content-Type: application/json');

//$query = "SELECT keywords FROM records WHERE keywords LIKE '%$text%' ORDER BY keywords ASC LIMIT 5";
$query1 = "SELECT distinct keyword as 'TAG', COUNT(*) as 'COUNT', type FROM keywords WHERE type='sos' GROUP BY keyword HAVING COUNT BETWEEN 0 AND 15000 ORDER BY COUNT DESC LIMIT 20";
$result1 = $db->query($query1);
$json = '[';
$first = true;
while($row = $result1->fetchArray())
{
	$keyword = ltrim($row['TAG']);
	$count = $row['COUNT'];
	$type = $row['type'];
	$identifier = $row['identifier'];
	$link = str_replace('&amp;', '&', $row['mdlink']);
	$linkDecode = urldecode($link);
	//echo $link;
	//$query = http_build_query($link);
		if (!$first) { $json .=  ','; } else { $first = false; }

			
			//$json .= '{text:"'.$keyword.'", weight: '.$count.', link: "'.$link.'"}';
			$json .= '{"tag":"'.$keyword.' ('.$count.')","count":'.$count.',"type":"'.$type.'"}';
}

$json .= ']';
echo $json;
?>