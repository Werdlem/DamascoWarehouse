<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$fetch = $dal->getCategories();
echo json_encode($fetch);

