 <?php
require_once "DAL/settings.php";
 require_once 'lib/swift_required.php'; 
 
 if (isset($_GET['sku'])){
	 require_once 'DAL/PDOConnection.php';
	 $sheetboardOrder = new products();
	 $sku = $_GET['sku'];
	 $sku = $sheetboardOrder->GetProducts($sku);
	 foreach ($sku as $result)
	 $sku_id = $result['sku_id'];
	 //date_default_timezone_set('UTC');
	$today = date('Y-m-d');
				
				$sheetboardOrder->sku_order($today, $sku_id);
	 
	 }
  
 if (isset($_GET['sku_order'])){
	 require_once 'DAL/PDOConnection.php'; 
 $productDal = new products();	 
	 $sku = $_GET['sku_order'];	 
	 date_default_timezone_set('UTC');
	$today = date('Y-m-d');
   
		$productDal->sku_order($today, $sku);
	 
	 }
	 else
	 {
		 if(isset($_GET['product'])){
 require_once 'DAL/PDOConnection.php'; 
 $productDal = new products();
 
 $product = $_GET['product'];
 $id = $_GET['id'];

 
 date_default_timezone_set('UTC');
	$today = date('d-m-Y');
    $productDal->order($_GET['product'], $today);
		$productDal->order_history($id, $today);
	 }
	 }
 
 	echo "<div class='panel panel-success'>
<div class='panel-heading' style='text-align:center;'><h3>Order Success!</h3></div>
<div class='panel-body'>
				Your order of ".$sku. " has been successfully sent, have a nice day :-D"			
	
		
 ?>
			