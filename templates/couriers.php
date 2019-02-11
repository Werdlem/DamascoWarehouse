<?php
//header("content-type: text/plain");

$start = '2019-02-08';
$end = '2019-02-08';

$rows = json_decode(file_get_contents("http://postpack.web/reports/couriers.php?start=".$start."&end=".$end));

foreach ($rows as $row) {
	echo "<h3>".strtoupper($row->courier). "</h1><p>Consignments: ".$row->count."<p>Packages:".$row->labels."<p>";
}