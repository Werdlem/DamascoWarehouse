<?php 
require_once ('../DAL/PDOConnection.php');

$dal = new products();
$fetch = $dal->getShred();
echo json_encode($fetch);

