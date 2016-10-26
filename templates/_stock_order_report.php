<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$goods_total = $productDal->get_stock_order_report();
			?>
            <style>
			
			.ordered{background-color: rgba(0,255,0,0.2); }
			.not_ordered{background-color: rgba(255,0,0,0.2); }
			
			</style>
            <div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Low Stock Order Report</h3>
</div>
<div class="panel-body">
<div>
<table class="table">
  <tr class="heading">
    <td style="font-size:16px"><strong>SKU</td>
    <td style="font-size:16px; text-align:center"><strong>Date Ordered</td>
    <td style="font-size:16px; text-align:center"><strong>Date Rec</td>
    <td style="font-size:16px; text-align:center"><strong>SKU Total</td>
    <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td>
    <td style="font-size:16px; text-align:center"><strong>Order</td>
  </tr>
  <?php
  foreach ($goods_total as $result){
	 $status = ($result['last_order_date'] > $result['delivery_date'])? 'ordered': 'not_ordered';
		echo "<tr class='$status'>";
		?>
    <td style=""><a href="?action=sheetboard_details&sku=<?php echo htmlspecialchars($result['sku']);?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
  <?php  			
	 echo '<td class="sean">'. date('d-m-Y', strtotime($result['last_order_date']));		
	 echo'<td class="sean">'. date('d-m-Y', strtotime($result['delivery_date']));
	?>
    </strong></td>
   
		<?php 
		echo '<td style="text-align:center; "><strong style="color: red; ">'. $result['stock_qty'];
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.1); ">'. $result['buffer_qty'];
		echo '<td style="text-align:center;"><a href="?action=send&sku_order='.htmlspecialchars($result['sku']) .'&qty=' .$result['pack_qty'].'"class="btn btn-default btn-primary">Order</a></td>';
						
		}


?>
  </tr>
</table>
