<?php

$value = json_decode(file_get_contents("php://input"));
$start = $value->start;
$end = $value->end;

$start = new DateTime($value->start);
$end = new DateTime($value->end);
$scheduleDate->setTimezone(new DateTimeZone('Europe/London'));
$start = $start ->format('Y-m-d H:i:s');
$end = $start ->format('Y-m-d H:i:s');

$results = json_decode(file_get_contents("http://postpack.web/reports/couriers.php?start=".$start."&end=".$end));

echo json_encode($results);

