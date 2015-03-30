<?php 

require_once('DAL/Production_PDOConnection.php');

$productDal = new products();


if (isset($_GET['update_production'])){
	
$customer_id = $_GET['customer_id'];
$product_id = $_GET['product'];


if ($_POST['add'] > 0){
	$id = $_POST['add'];
	$date = date('d-m-Y');
	$product_id = $_GET['product'];
	$qty = $_POST['add'];
	$id = $productDal->stock_In($date, $product_id, $qty);
	}
	else{
		if($_POST['subtract']> 0){
		$id_out = $_POST['subtract'];
	$date = date('d-m-Y');
	$product_id = $_GET['product'];
	$qty_out = $_POST['subtract'];
	$id_out = $productDal->stock_Out($date, $product_id, $qty_out);
		}
	} 
   		
	header("Location: ?action=production_stock&id=".$customer_id."&product=".$product_id);
	}
	
	if(isset($_POST['add_customer'])){
		

$customer = strtoupper($_POST['customer']);

$add_customer = $productDal->AddCustomer($customer);

header("Location: ?action=add_production_stock");
	 }
	 
	 if (isset($_GET['delete_total'])){
		 $id = $_GET['id'];
		 $product = $_GET['product'];
		 $delete = $_GET['line_id'];
		 
		 echo $id; 
		 echo $product;
			echo $delete;
		$delete = $productDal->deleteTotal($delete);
		header('location: ?action=production_stock&id='.$id."&product=".$product);
	 }
	 
	 if (isset($_GET['delete_product'])){
		  $id = $_GET['id'];
		 $delete = $_GET['p_id'];
		 
		 echo $id; 
		 echo $delete;
		 $delete = $productDal->deleteProduct($delete);
		 header('location: ?action=production_stock&id='.$id);		
		 }