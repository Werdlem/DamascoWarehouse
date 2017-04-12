<?php
include 'production_home.php';
				require_once './DAL/PDOConnection.php';


if(isset($_GET['sku'])){
	$search_sku = $_GET['sku'];
		if (!isset($_GET['days']))
			{
				$days = 120;
			}
		else
		{
			$days = $_GET['days'];
		}
	}
if(isset($_POST['search_sku'])){
	
	if ($_POST['search_sku'] == ''){
		die('<br /><div class="alert alert-danger" role="alert">Please enter a product SKU.');	
		}		
		else{		
	$search_sku = $_POST['search_sku'];
	$days = 120;
	}
}

	$productDal = new products();
	$sku = $productDal->get_goods_out_products($search_sku, $days);

echo '<h1> SKU: '.strtoupper($search_sku).'</h1>';
foreach ($sku as $result){ 
	$ave = floor($result['ave']);
	$total = number_format((float)$ave*($days/30));
}

echo'
<div class="panel panel-success" style="width: 35%">
<div class="panel-heading">
Filter Monthly Average
</div>
<div class="panel-body">
<p style="color: red"><strong>Ave per Month: '.$ave.' *</p></strong> 
<p style="color: green"><strong> Total over '.$days.' days: '.$total.'</p></strong> 
<p><a href="?action=production_activity&sku='.$search_sku.'&days=30">1 Month </a>|
<a href="?action=production_activity&sku='.$search_sku.'&days=60">2 Months </a>|
<a href="?action=production_activity&sku='.$search_sku.'&days=90">3 Months </a>|
<a href="?action=production_activity&sku='.$search_sku.'&days=120">4 months</a> |
<a href="?action=production_activity&sku='.$search_sku.'&days=365">12 months</a></p>
<p>*Average number units sold per month for the last '.$days.' days</p>
</div>
</div>';

			
		

include 'modules/production_stk_out.php';
'</div>';




