<?php 

require_once ('../DAL/cartons.php');


$dal = new carton();
$fetch = $dal->getFinish();
echo json_encode($fetch);

