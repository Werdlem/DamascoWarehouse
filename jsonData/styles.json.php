<?php 
require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getStyles();
echo json_encode($fetch);

