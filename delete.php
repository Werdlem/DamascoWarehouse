<?php
include_once('DAL/PDOConnection.php');
$productDal = new products();

if(isset($_GET['delete'])){
    $productDal->Delete($_GET['delete']);
    header("Status: 200");
    header("Location: aisles.php?Aisle=2");
}
if (isset($_GET['delete_product'])){
	$productDal->ProductDelete($_GET['delete_product']);
	header("Status: 200");
	header("Location: product_delete.php");
	}