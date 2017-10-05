<?php require_once './DAL/PDOConnection.php';
$allocation_id = '14';
$productDal = new products();
$fetch = $productDal->Get_Foam_Report();


?>
<style>		
	.ordered{display: none;}
			.not_ordered{background-color: rgba(255,0,0,0.2); }
			
</style>

<div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Foam Quantity Totals</h3>
</div>
<div class="panel-body">
<form  method="post" id="Search" action="?action=stock_qty">
  
    <br />
    <br />
    
  </div>

</form>
            
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
foreach ($fetch as $result){ 

	$sku_total = $result['total_alloc'] + $result['total_rec'] - $result['total_del_desc1'];
	$status = $result['last_order_date'] > $result['date_rec']? 'ordered': 'not_ordered';


 echo "<tr class='$status'>
    <td >"?><a href="?action=activity&sku=<?php echo htmlspecialchars($result['sku']).'&sku_id='.$result['sku_id'];?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
   <td style="text-align:center"><?php if ($result['last_order_date'] < '(NULL)') { echo '';} else{ echo date('d-m-Y',strtotime($result['last_order_date']));} ?></td>
    <?php
	echo '<td style="text-align:center">'. date('d-m-Y', strtotime($result['date_rec'])).'</td>';
	if($sku_total <= $result['buffer_qty']){
		
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.2);*/"><strong style="color: red; ">'. $sku_total;
			
		}
		else{
	echo '<td style="text-align:center">'. $sku_total .'</td>';
		
		}
		
	echo '<td style="text-align:center; color:#06F; background-color: rgba(0,0,255,0.2); "><strong>'. $result['buffer_qty'] .'</td>';
	echo '<td style="text-align:center;"><a href="?action=send&sku_order='.htmlspecialchars($result['sku']).'&qty='.$result['pack_qty'].'" class="btn btn-default btn-primary">Order</a></td>';
			
}
	?>

  </tr>
  </form>
</table>

</div>
</div>