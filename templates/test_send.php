 <?php
require_once "DAL/settings.php";
 require_once 'lib/swift_required.php'; 
  
 if (isset($_GET['production_product'])){
	 require_once 'DAL/Production_PDOConnection.php';
	 $productionDal = new products();
	 
	 $product = $_GET['production_product'];	 
	 date_default_timezone_set('UTC');
	$today = date('d-m-y');
   
		$productionDal->updateProduct($product, $today);
	 
	 }
	 else
	 {
 
 require_once 'DAL/PDOConnection.php'; 
 $productDal = new products();
 
 $product = $_GET['product'];
 $id = $_GET['id'];

 
 date_default_timezone_set('UTC');
	$today = date('d-m-Y');
    $productDal->order($_GET['product'], $today);
		$productDal->order_history($id, $today);
	 }
 
 
 
 
 	echo "<div class='panel panel-danger'>
<div class='panel-heading' style='text-align:center;'><h3>Order Failure</h3></div>
<div class='panel-body'>
				'Please will you kindly order ".$product;
			
			
		
	 
			
	
		
 ?>
			