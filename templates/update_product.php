<?php

include 'search.php';

require_once('DAL/PDOConnection.php');

$productDal = new products();


$sku = $_GET['sku'];
$sku_id = $_GET['sku_id'];
	
$sku = $productDal->GetProducts($sku);
	foreach($sku as $productDetail){
		
?>

<div class="panel panel-primary" style="width:49%; float:left">
	<div class="panel-heading" style="text-align:center;">
		<h3>Product Details</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="?action=action&updates">
			<div>
				<label for="sku">Product</label>
				<input id="sku" name="sku" type="text" class="form-control" value="<?php echo htmlspecialchars($productDetail['sku']); ?>"/>
				<a href="?action=sku_details&sku=<?php echo $productDetail['sku']?>"> follow </a>
				<input id="sku_id" name="sku_id" type="hidden" value="<?php echo $productDetail['sku_id']; ?> "
				<span id="notesInfo"></span> </div>
			<div>
				<label for="description">Description</label>
				<textarea id="description" name="description" type="text" class="form-control" rows="1"><?php echo  str_replace('<br />','',$productDetail['description']); ?></textarea>
			</div>
			<div style="width:50%; float: left;">
				<label for="alias_1">Alias 1</label>
				<input id="alias_1" name="alias_1" type="text" class="form-control"  value="<?php echo $productDetail['alias_1']; ?>"/>
			</div>
			<div style="width:50%; margin-left:auto">
				<label for="alias_2">Alias 2</label>
				<input id="alias_2" name="alias_2" type="text" class="form-control" value="<?php echo $productDetail['alias_2'];?>" />
			</div>
			<div style="width:50%; float: left;">
				<label for="alias_3">Goods In Alias SKU</label>
				<input id="alias_3" name="alias_3" type="text" class="form-control" value="<?php echo $productDetail['alias_3'];?>" />
			</div>
			<!--Wild card alias entry for multi coloured products-->
			 <?php 
			 // disable the 'wildcard' text box for non logged in users
		  if (!isset($_COOKIE['password'])){ echo '
		  	<div style="width:50%; margin-left: auto; color: red; visibility: hidden">
				<label for="sku_wildcard">Wild Card</label>
				<input id="sku_wildcard" name="sku_wildcard" type="text" class="form-control" style="border: 1px solid red;" disabled value="'.
				$productDetail['alias_wild'].'" />
			</div>';
		  }
		  else{

		  	// enable 'wildcard' text box for logged in users
		  	echo '
		  	<div style="width:50%; margin-left: auto; color: red">
				<label for="sku_wildcard">Wild Card</label>
				<input id="sku_wildcard" name="sku_wildcard" type="text" class="form-control" style="border: 1px solid red;" value="'.
				$productDetail['alias_wild'].'" />
			</div>';
		  }
		  ?>
			<!--END-->
			<div style="width:32%; float:left">
				<label for="pack_qty">Order Qty</label>
				<input id="pack_qty" name="pack_qty" type="text" class="form-control" value="<?php echo $productDetail['pack_qty'];?>" />
			</div>
			<div style="width:32%; float:right; padding-left:15px">
				<label for="buffer_qty">Buffer Qty</label>
				<input id="buffer_qty" name="buffer_qty" type="text" class="form-control"  value="<?php echo $productDetail['buffer_qty'];?>" />
			</div>
			<div style="width:32%; float:right">
				<label for="stock_qty">Total Stock</label>
				
				<?php 

				// assign (null) to empty wild card string returned should alias wild be and empty string
		$selection = $_GET['sku'];
		if ($productDetail['alias_wild']==''){
		$sku_wildcard = '(null)';
	}
	else{
		$sku_wildcard = $productDetail['alias_wild'];
	}
	// end
		$goods_total = $productDal->Get_Sku_Total($selection, $sku_wildcard, $sku_id);

foreach ($goods_total as $result){

	
	$sku_total = $result['total_rec']+$result['total_alloc']-$result['total_del_desc1']; ?>
				<input id="stock_qty" name="stock_qty" readonly="readonly" type="text" class="form-control" value="<?php echo $sku_total;}?>" />
			</div>
			<div>
				<label for="last_ordered">Last Ordered</label>
				<input id="last_ordered" name="last_ordered" type="text" class="form-control" readonly="readonly" style="width: 40%" value="<?php echo $productDetail['last_order_date']; ?>"/>
				
			</div>
					 
			
			<div style="width:50%; float: left;">
				<label for="allocation_id">Allocation</label>
				<?php $product = $productDal->Get_Allocation();
		$dropdown = "<select style='width:90%' name='allocation_id' id='allocation_id' onchange='select()'>";
					$dropdown.="\r\n<option value='{$productDetail['allocation_id']}'>{$productDetail['name']}</option>";
				$dropdown.="\r\n<option value='0'>None</option>";
		foreach ($product as $result){
			$dropdown .="\r\n<option value='{$result['allocation_id']}'>{$result['name']}</option>";
			}
			$dropdown .="\r\n</select>";
			echo $dropdown;
		 ?>
				<script>
			 function select(){
			 var x = document.getElementById("allocation_id").value;
			 
			 }
			 </script> 
			</div>

			<div style="width:50%; margin-left:auto">
				<label for="supplier_name">Supplier</label>
				<input id="supplier_name" name="supplier_name" type="text" class="form-control" value="<?php echo $productDetail['supplier_name']; ?>"/>
			</div>
			<div>
				<label for="notes">Notes</label>
				<textarea id="notes" name="notes" type="text" class="form-control" rows="4"><?php echo str_replace('<br />',"", $productDetail['notes']); ?></textarea>
			</div>
			<br/>
			<button id="updates" class="btn btn-large btn-primary" name="updates" type="submit">Update</button>
			<a href="?action=send&sku_order=<?php echo htmlspecialchars($productDetail['sku']);?>&id=<?php echo $productDetail['sku_id']?>&qty=<?php echo $productDetail['pack_qty'];?>" class="btn btn-large btn-primary">Order</a>
		</form>
		<a href="?action=activity&sku=<?php echo htmlspecialchars($productDetail['sku']).'&sku_id='.$productDetail['sku_id'] ?>">Activity</a>
	</div>
	<?php }?>
</div>
<?php
include 'modules/location_list.php';
include 'modules/update_location.php';



