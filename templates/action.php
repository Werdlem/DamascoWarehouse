<?php 

require_once('DAL/PDOConnection.php');



$productDal = new products();

//SET PRODUCT PARENT

if (isset($_GET['setParent'])) {
	$parentId = $_POST['sku_id'];
	$sku = $_POST['sku'];
	$skuId = $_POST['skuId'];

	echo $parentId;
	echo $sku;
	$productDal->setParent($parentId,$sku);
	header("location:?action=update_product&sku=".$sku."&sku_id=".$skuId);
}

if (isset($_GET['saveRelation'])){
	echo 'add Save relation logic here';
	$sku_id = $_GET['sku_id'];

	echo $sku_id;
}

//DELETE CARTON
if (isset($_GET['deleteCarton'])){

	$cartonId = $_GET['id'];
	$productDal->deleteCarton($cartonId);
	header("location:?action=ctn_jobSheet");
}

//PRODUTION LOG ACTIVITY
if (isset($_GET['production_Add'])) {
		$sku_id = $_GET['sku_id'];
		$qty = $_POST['qty'];
		$date = date('Y-m-d');

		$productDal->productionAdd($sku_id, $qty, $date,$qty,  $sku_id);
header("location:?action=production");
	}
//$sheetboardDAL = new sheetboard();

if(isset($_POST['addShred'])){
    //UPDATE SHREDMASTER TABLE
$palletNo = $_POST['palletNo'];
$width = $_POST['width'];
$length = $_POST['length'];
$grade = strtoupper($_POST['grade']);
$flute = $_POST['flute'];
$qty = $_POST['qty'];

$productDal->addShred($palletNo, $width, $length, $grade, $flute, $qty);	
header("location:?action=shredmaster");
}

if (isset($_GET['deleteShred'])){

	$id= $_GET['id'];

	$productDal->deleteShred($id);
	header("location:?action=shredmaster");
}

if(isset($_POST['updates'])){
    //UPDATE PRODUCT FORM SUBMITTED
	$sku_id= $_POST['sku_id'];
	$sku = strtoupper($_POST['sku']);
    $notes = nl2br($_POST['notes']);
	$buffer_qty = $_POST['buffer_qty'];
	$allocation_id = $_POST['allocation_id'];
	$supplier_name = null;
	$description = nl2br($_POST['description']);
	$alias_1 = strtoupper($_POST['alias_1']);
	$alias_2 = strtoupper($_POST['alias_2']);
	$alias_3 = strtoupper($_POST['alias_3']);
	$sku_wildcard = strtoupper($_POST['sku_wildcard']);
	$pack_qty = $_POST['pack_qty'];
	$stock_qty = $_POST['stock_qty'];
	$ave = null;
	//$relation = $_POST['relationship'];
	
	$productDal->UpdateProduct($sku_id, $sku,$notes,$buffer_qty, $allocation_id, $supplier_name,$description, $alias_1, $alias_2, $alias_3,
		$sku_wildcard,$pack_qty, $stock_qty, $ave);
	header("location:?action=update_product&sku=".urlencode($sku)."&sku_id=".$sku_id);
}


if(isset($_POST['add_location'])){
   $result = $_POST['location_name'];
   		$sku = $_POST['sku'];
		$sku_id = $_POST['sku_id'];
        $productDal->Update_Product_Location($sku_id, $result);
		header("location:?action=update_product&sku=".$sku."&sku_id=".$sku_id);
		echo '<div class="alert alert-success" role="alert">Product Successfully updated to Location</div>';	
}

if(isset($_POST['new_location'])){
   $result = strtoupper($_POST['location_name']);
   		$productDal->New_Location($result);
		//header("location:?action=update_product&sku=".$sku."&sku_id=".$sku_id);
		//echo '<div class="alert alert-success" role="alert">Location '.$result.' successfully added</div>';	
}

if(isset($_GET['clear_location'])){	
	$location_id = $_GET['location_id'];
   $productDal->Clear_Location($location_id);
   header("Location: ".$_SERVER['HTTP_REFERER']);
}

if (isset($_GET['delete_sku'])){	
	$sku = $_GET['delete_sku'];
	$productDal->Delete_Sku($sku);
	header("Status: 200");
	header("Location: ?action=search");
	}
	
	if (isset($_GET['deleteLocation'])){
	
   		$sku = $_POST['sku'];
		$sku_id = $_POST['sku_id'];
		$id = $_POST['X'];
		//echo $id;
		$productDal->Remove_Location($id);
	header("Location: ?action=update_product&sku=".$sku."&sku_id=".$sku_id."&location_id=".$id);
	}
	
	if(isset($_POST['add_sku'])){ 
	
$sku = strtoupper($_POST['sku']);
$pack_qty = $_POST['pack_qty'];
$alias_1 = strtoupper($_POST['alias_1']);
$alias_2 = strtoupper($_POST['alias_2']);
$alias_3 = strtoupper($_POST['alias_3']);
$allocation_id = strtoupper($_POST['allocation_id']);
$notes = nl2br($_POST['notes']);
$stock_qty = $_POST['stock_qty'];
$buffer_qty = $_POST['buffer_qty'];
$description = nl2br($_POST['description']);
//$last_ordered = $_POST['last_ordered'];

$productDal->add_sku($sku, $pack_qty, $alias_1, $alias_2, $alias_3, $allocation_id, $description, $stock_qty, $buffer_qty, $notes);
//header('location: ?action=search&doSearch=1&fetch='.$sku);
}

if(isset($_POST['update_location'])){
   $result = $_POST['location_id'];
		$sku_id = $_POST['sku_id'];
		echo $sku_id;
       $productDal->Update_Location($sku_id, $result);
		header("location: ?action=search");	
}

if (isset($_GET['update_sheetboard'])) {
		$sku = $_GET['sku'];
		
		if ($_POST['add'] > 0){
	$add = $_POST['add'];
	$date = date('y-m-d');	
	$qty_in = $_POST['add'];
	$add = $productDal->qty_In($sku, $qty_in, $date, $allocation_id);
	}
	else{
		if($_POST['subtract']> 0){
		$subtract = $_POST['subtract'];
	$date = date('y-m-d');

	$qty_out = $_POST['subtract'];
	$subtract = $productDal->qty_Out($sku, $qty_out, $date);
		}
	
	}
	$dosearch = '1';
	header('Location: ?action=sheetboard_details&sku=' .$sku);
	}
	
	//------------------------------------------------------------------------------------------------------//
	if (isset($_GET['update_movement'])) {
		$sku = $_GET['sku'];
		//$sku_id = $_GET['sku_id'];
		
		if ($_POST['add'] > 0){
	$add = $_POST['add'];
	$date = date('y-m-d');	
	$qty_in = $_POST['add'];
	$add = $productDal->qty_In($sku, $qty_in, $date);
	}
	else{
		if($_POST['subtract']> 0){
		$subtract = $_POST['subtract'];
	$date = date('y-m-d');

	$qty_out = $_POST['subtract'];
	$subtract = $productDal->qty_Out($sku, $qty_out, $date);
		}
	
	}
	$dosearch = '1';
	header('Location: ?action=update_product&sku=' .$sku.'&sku_id='.$sku_id);
	}
	
	//------------------------------------------------------------------------------------------------------//
	
		if (isset($_GET['delete_line'])){
			$id = $_GET['id'];
			$sku = $_GET['sku'];
			$sku_id = $_GET['sku_id'];
			
			$delete_line = $productDal->delete_line($id);
			header('location:? action=update_product&sku='.$sku .'&sku_id='.$sku_id);
			}
			
			if(isset($_POST['add_allocation'])){
		

$allocation = strtoupper($_POST['allocated_name']);

$allocation = $productDal->Add_Allocation($allocation);

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



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

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
	
	
	 
	 if (isset($_GET['delete_product'])){
		  $id = $_GET['id'];
		 $delete = $_GET['p_id'];
		 
		 echo $id; 
		 echo $delete;
		 $delete = $productDal->deleteProduct($delete);
		 header('location: ?action=production_stock&id='.$id);		
		 }
		 
		 
///////////////////////////////////////////////////activity.php actions//////////////////////////////
if (isset($_GET['sku_ammend'])) {
		$sku = $_GET['sku'];
		$sku_id = $_GET['sku_id'];
		if ($_POST['add'] > 0){
	$add = $_POST['add'];
	$date = date('y-m-d');	
	$qty_in = $_POST['add'];
	$add = $productDal->qty_In($sku, $qty_in, $date, $sku_id);
	}
	else{
		if($_POST['subtract']> 0){
		$subtract = $_POST['subtract'];
	$date = date('y-m-d');

	$qty_out = $_POST['subtract'];
	$subtract = $productDal->qty_Out($sku, $qty_out, $date, $sku_id);
		}
	
	}
		
		
	$doSearch = '1';
	header('Location: ?action=activity&sku=' .$sku.'&sku_id='.$sku_id);
	
}

if (isset($_GET['sku_ammend_'])){
	$sku = $_GET['sku'];
	$sku_id = $_GET['sku_id'];

		echo $sku;
		echo $sku_id;
}

if (isset($_GET['delete_entry'])){
			$id = $_GET['id'];
			$sku = $_GET['sku'];
			$sku_id = $_GET['sku_id'];
			
			$delete_line = $productDal->delete_line($id);
			header('location:? action=activity&sku_id='.$sku_id.'&sku='.$sku);
			}
		
	
	
		
			 