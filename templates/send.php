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
	$product = htmlspecialchars($result['sku']);
	$qty = $result['pack_qty'];
				
				$sheetboardOrder->sku_order($today, $sku_id);
	 
	 }
	 if (isset($_GET['sku_order'])){
	 require_once 'DAL/PDOConnection.php'; 
 $productDal = new products();	 
	 $sku = $_GET['sku_order'];	
	 $product = $_GET['sku_order'];
	 $qty = $_GET['qty']; 
	 $sku_id = $_GET['id']
	 date_default_timezone_set('UTC');
	$today = date('Y-m-d');

	 }
	   
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
		

    
	//Create the transport
			//$transport = Swift_MailTransport::newInstance(SMTP_HOST, SMTP_PORT);
			$transport = Swift_MailTransport::newInstance('smtp.gmail.com', 465);
			$mailer = Swift_Mailer::newInstance($transport);			
			$message = Swift_Message::newInstance('Please Order')
			->setSubject('Product Order: ' .$product)
			->setFrom($EMAIL_ORDERS_FROM)
			->setCc($EMAIL_ORDERS_CC)
			->setTo($EMAIL_ORDERS_TO)
			
			//Order Body//
			
			->setBody('<html>'.
                '<head>Hello<br /><br /></head>'.
                '<body>'.
                'Please will you kindly order '. $qty . '(qty) <a href="http://postpackstock.web/index.php?action=activity&sku=' .$product.'&sku_id='.$sku_id.
                '">'.$product.'</a><br /><br />Kind Regards<br /><br />'.
                'PostPack'.
                '</body>' .
                '</html>',
                'text/html'
            );
			
			//$numSent = $mailer->send($message);
			//printf("Send %d messages\n", $numSent);
			
			$result = $mailer->send($message);
			if ($result > 0)
			{
				$productDal->sku_order($today, $sku);
				
				echo "<div class='panel panel-success'>
<div class='panel-heading' style='text-align:center;'><h3>Order Success!</h3></div>
<div class='panel-body'>
				Your order of ".$product . " has been successfully sent, have a nice day :-D"
				?>
				
				<button onclick='goBack()'>Go Back</button>

				<script>
						function goBack() {
   						 window.history.back();
				}
						</script>
				</div></div>
			<?php
            }
            else{
				
				echo "<div class='panel panel-danger'>
<div class='panel-heading' style='text-align:center;'><h3>Order Failure</h3></div>
<div class='panel-body'>
				<p>Your order of <strong style='red'><a href='?action=activity&sku=". $product ."'> ".$product." </strong> was not sent, please call the office with your order.</p>
				</div></div>";
				
				}
 ?>
			
