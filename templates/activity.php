<?php
include 'home.php';
//require_once '../DAL/PDOConnection.php';
				require_once './DAL/PDOConnection.php';
if(isset($_GET['sku'])){
	$search_sku = $_GET['sku'];
	}
if(isset($_POST['search_sku'])){
	
	if ($_POST['search_sku'] == ''){
		die('<br /><div class="alert alert-danger" role="alert">Please enter a product SKU.');	
		}
		
		else{		
	$search_sku = $_POST['search_sku'];
	}
}

	$productDal = new products();
	$sku = $productDal->Get_Sku_Total($search_sku);


echo '<h1> SKU: '.strtoupper($search_sku).'</h1>';
  
foreach ($sku as $result){ 

$selection =$result['sku'];

$goods_total = $productDal->Get_Sku_Total($selection, $selection);

foreach ($goods_total as $result){
	
	$sku_total = $result['total_rec']+$result['total_alloc']-$result['total_del_desc1'];
	
echo 
'<p><strong>SKU: </strong>'. htmlspecialchars($result['sku']) .' <a href="?action=update_product&sku='.$result['sku'].'&sku_id='.$result['sku_id'].'">(Edit)</a></p>
<p><strong>Alias 1:</strong> '.$result['alias_1'].'</p>
<p><strong>Alias 2:</strong> '.$result['alias_2'].'</p>
<p><strong>SKU Total:</strong> '.$sku_total.'</p>
<p><strong>Last Order Date:</strong> '. date('d/m/Y', strtotime($result['last_order_date'])).'</p>
<p style="color: green"><strong>SKU Total Goods In:</strong> '.$result['total_rec'].'</p>
<p style="color: red"><strong>Last 30 Days:</strong> '.$result['last30'].'</p>
<p><strong>Associated Product List:</strong> <a href="?action=products&id='.$result['allocation_id'].'">Follow! </p></a>';}
}
			
		
include 'modules/stk_in.php';
include 'modules/stk_out.php';
include 'modules/goods_ammend.php';



'</div>';



