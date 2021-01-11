<?php

$value = json_decode(file_get_contents("php://input"));
$start = $value->start;
$end = $value->end;

$start = new DateTime($value->start);
$end = new DateTime($value->end);
$start->setTimezone(new DateTimeZone('Europe/London'));
$end->setTimezone(new DateTimeZone('Europe/London'));
$s = $start->format("Y-m-dH:i:s");
$e =$end->format("Y-m-dH:i:s");

//echo $s;


$results = json_decode(file_get_contents("http://postpack.web/reports/shippers.php?start=".$s."&end=".$e));

echo json_encode($results);

