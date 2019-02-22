<?php

$value = json_decode(file_get_contents("php://input"));
$start = $value->start;
$end = $value->end;

$results = json_decode(file_get_contents("http://postpack.web/reports/couriers.php?start=".$start."&end=".$end));

echo json_encode($results);

