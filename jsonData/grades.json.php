<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getGrades();
echo json_encode($fetch);

