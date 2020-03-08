<?php 

require_once ('../DAL/cartons.php');

$dal = new carton();
$data = json_decode(file_get_contents("php://input"));
$sku = $data->sku;
$fetch = $dal->getSku($sku);
echo json_encode($fetch);

