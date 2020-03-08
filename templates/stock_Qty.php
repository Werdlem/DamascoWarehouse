<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$fetch = $productDal->Get_Allocation();

if (isset($_GET['id'])){
		$fetch = $_GET['id'];
}
?>
<style>		
	.ordered{background-color: rgba(0,255,0,0.2); }
			.not_ordered{}
			
</style>

<div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Stock Quantity Totals</h3>
</div>
<div class="panel-body">
<form  method="post" id="Search" action="?action=stock_qty">
  <div id="search" style="text-align:center">
    <?php $product = $productDal->Get_Allocation();
	  $dropdown = "<select name='search_stock' id='mySelect' onchange='select()'>";
	 $dropdown .="\r\n<option value='0'> </option>";
	  foreach ($product as $result){
		  $dropdown .="\r\n<option value='{$result['allocation_id']}'>{$result['name']}</option>";
		  }
		  $dropdown .="\r\n</select>";
		  echo $dropdown;
	   ?>
    <script>
       function select(){
		   var x = document.getElementById("mySelect").value;
		   
		   }
       </script> 
    <br />
    <br />
    <button type="submit" class="btn btn-large btn-success" name="submit" >Search</button>
    <input type="hidden" name="doSearch" value="1">
  </div>

</form>
<?php

   if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			$fetch = $_POST['search_stock'];
			$export = $_POST['search_stock'];
						
		}
		$fetch = $productDal->Get_Allocation_Sku($fetch);
			?>
           
            
<div>
<table class="table">
<form id="Stock_Qty" method="post">
  <tr class="heading">
    <td style="font-size:16px"><strong>SKU</td>
    <td style="font-size:16px; text-align:center"><strong>Date Ordered</td>
    <td style="font-size:16px; text-align:center"><strong>Date Rec</td>
    <td style="font-size:16px; text-align:center"><strong>SKU total</td>
    
    <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td>
    <td style="font-size:16px; text-align:center"><strong>Order</td>
  </tr>
  <?php
foreach ($fetch as $fetchResult){ 
	$selection =$fetchResult['sku'];

// assign (null) to empty wild card string returned should alias wild be and empty string
		if ($fetchResult['alias_wild']==''){
		$sku_wildcard = '(null)';
	}
	else{
		$sku_wildcard = $fetchResult['alias_wild'];
	}
	// end
	$sku_id=$fetchResult['sku_id'];

		//$status = $fetchResult['last_order_date'] > $result['date_rec']? 'ordered': 'not_ordered';

  //echo "<tr class='$status'>";
	echo "<tr>";
  ?>
    <td style=""><a href="?action=activity&sku=<?php echo htmlspecialchars($fetchResult['sku']).'&sku_id='.$fetchResult['sku_id'];?>"><?php echo htmlspecialchars($fetchResult['sku']); ?></a></td>
   <td style="text-align:center"><?php if ($fetchResult['last_order_date'] < '(NULL)') { echo '';} else{ echo date('d-m-Y',strtotime($fetchResult['last_order_date']));} ?></td>
    <?php
	
	echo '<td>'.date('d-m-Y',strtotime($fetchResult['date_rec'])).'</td>';
	if($fetchResult['stock_qty']<= $fetchResult['buffer_qty']){
		
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.2);*/"><strong style="color: red; ">'. $fetchResult['stock_qty'].'</td>';
			
		}
		else{
	echo '<td style="text-align:center">'. $fetchResult['stock_qty'].'</td>';
		
		}
		
	echo '<td style="text-align:center; color:#06F; background-color: rgba(0,0,255,0.2); "><strong>'. $fetchResult['buffer_qty'] .'</td>';
	echo '<td><button></td>';		

}
	}
	?>

  </tr>
  </form>
</table>

</div>
</div>