<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$goods_total = $productDal->get_stock_order_report();
			?>
            <div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Low Stock Order Report</h3>
</div>
<div class="panel-body">
<div>
<table class="table">
  <tr class="heading">
    <td style="font-size:16px"><strong>SKU</td></strong>
    <td style="font-size:16px; text-align:center"><strong>Date3 Ordered</td></strong>
    <td style="font-size:16px; text-align:center"><strong>Date Rec</td></strong>
    <td style="font-size:16px; text-align:center"><strong>SKU Total</td></strong>
    <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td></strong>
    <td style="font-size:16px; text-align:center"><strong>Order</td></strong>
  </tr>
  <?php
  

foreach ($goods_total as $result){
	?>
	
		<tr style="">
    <td style=""><a href="?action=sheetboard_details&sku=<?php echo htmlspecialchars($result['sku']);?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
    
	<?php 
		echo '<td style="text-align:center;background-color: rgba(0,255,0,0.2)">'. $result['last_order_date'];
	 echo'<td style="text-align:center; background-color: rgba(255,0,0,0.2)">'. $result['last_order_date'];
	?>
    </strong></td>
   
		<?php 
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.2);*/"><strong style="color: red; ">'. $result['stock_qty'];
		echo '<td style="text-align:center; color:#06F; background-color: rgba(0,0,255,0.2); ">'. $result['buffer_qty'];
		echo '<td style="text-align:center;"><a href="?action=send&sku_order='.htmlspecialchars($result['sku']) .'&qty=' .$result['pack_qty'].'"class="btn btn-default btn-primary">Order</a></td>';
						
		}


?>
  </tr>
</table>
</div>
</div>
</div>