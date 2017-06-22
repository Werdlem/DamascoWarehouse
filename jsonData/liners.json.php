<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getLiners();
echo json_encode($fetch);

