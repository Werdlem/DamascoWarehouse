<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getCartons();
echo json_encode($fetch, JSON_PARTIAL_OUTPUT_ON_ERROR);
