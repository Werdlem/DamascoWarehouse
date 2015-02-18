<?php
include_once('./DAL/PDOConnection.php');
$productDal = new products();

if(isset($_GET['delete'])){
    $productDal->Delete($_GET['delete']);
    header("Status: 200");
    header("Location: ?action=search");
}
if (isset($_GET['delete_product'])){
	$productDal->ProductDelete($_GET['delete_product']);
	header("Status: 200");
	header("Location: ?action=search");
	}
	
	if (isset($_GET['deleteLocation'])){
	
   		$product = $_GET['product'];
		$product_id = $_GET['product_id'];
		$id = $_POST['X'];
		echo $id;
		$productDal->Delete($id);
	header("Location: ?action=update_product&id=".$product."&p_id=".$product_id."&l_id=".$id);
	}
