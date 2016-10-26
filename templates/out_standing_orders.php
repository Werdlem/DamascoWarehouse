<?php require_once './DAL/PDOConnection.php';
//require_once '../DAL/PDOConnection.php';
$productDal = new products();

$orders = $productDal->select_orders();

foreach ($orders as $result){
	echo $result['order_id'] .'&nbsp';
	echo htmlspecialchars($result['sku']) . '<br />';
	
	}