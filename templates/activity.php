<?php
include 'home.php';
				require_once './DAL/PDOConnection.php';


if(isset($_GET['sku'])){
	$search_sku = $_GET['sku'];
	$sku_id = $_GET['sku_id'];
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
	$sku = $productDal->_get_products($search_sku, $search_sku);

echo '<h1> SKU: '.strtoupper($search_sku).'</h1>';
  
foreach ($sku as $result){ 

	$alias_3 = $result['alias_3'];
$selection =$result['sku'];
$sku_id = $result['sku_id'];
// assign (null) to empty wild card string returned should alias wild be and empty string
		if ($result['alias_wild']==''){
		$sku_wildcard = '(null)';
	}
	else{
		$sku_wildcard = $result['alias_wild'];
	}
	// end
$goods_total = $productDal->Get_Sku_Total_Ave($selection, $sku_wildcard, $days,$sku_id);

foreach ($goods_total as $result){
	
	$sku_total = $result['total_rec']+$result['total_alloc']-$result['total_del_desc1'];
	$_goods_in = number_format((float)$result['total_rec']);
	$_ave = number_format((float)$result['last120']);

echo 
'<p><strong>SKU: </strong>'. htmlspecialchars($result['sku']) .' <a href="?action=update_product&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'">(Edit)</a></p>
<p><strong>Description:</strong> '.$result['description'].'</p>
<p><strong>Alias 1:</strong> '.$result['alias_1'].'</p>
<p><strong>Alias 2:</strong> '.$result['alias_2'].'</p>
<p><strong>Wild Card:</strong> '.$result['alias_wild'].'</p>
<p><strong>SKU Total:</strong> '.$sku_total.'</p>
<p><strong>Last Order Date:</strong> '. date('d/m/Y', strtotime($result['last_order_date'])).'</p>
<div class="panel panel-warning" style="width: 35%">
<div class="panel-heading">
Filter Monthly Average
</div>
<div class="panel-body">
<p style="color: red"><strong>Ave per Month: '.$_ave.'*</p></strong> 
<p><a href="?action=activity&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'&days=30">1 Month </a>|
<a href="?action=activity&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'&days=60">2 Months </a>|
<a href="?action=activity&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'&days=90">3 Months </a>|
<a href="?action=activity&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'&days=120">4 months</a> |
<a href="?action=activity&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'&days=365">12 months</a></p>
<p>*Average number units sold per month for the last '.$days.' days</p>
</div>
</div>

<p><strong>Associated Product List:</strong> <a href="?action=products&id='.$result['allocation_id'].'">Follow! </p></a>';}
}
			
		
include 'modules/stk_in.php';
include 'modules/stk_out.php';
include 'modules/goods_ammend.php';



'</div>';



