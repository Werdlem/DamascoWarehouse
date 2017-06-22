<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getFlutes();
echo json_encode($fetch);

