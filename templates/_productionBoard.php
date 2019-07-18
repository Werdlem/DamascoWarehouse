<div id="colourKey" style="width: 8%; padding-left: 5px; text-align: center; font-size: 1.5em;position: fixed; margin-left: -200px; font-weight: bold">
			<p style="background-color: rgba(255,0,0,0.1)">Below Buffer </p>
			<p style="background-color: rgba(0,255,0,0.1) ">On Order</p>
			<p style="background-color: rgba(0,0,255,0.1) ">In Stock</p>
		</div>
<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$goods_total = $productDal->getProductionBoard();

// check to see if the page is posted back via the "Update button" then continue to load the rest of the page

if(isset($_POST['update'])){
	
	if($_POST['update']==1)
		{
			$update = $productDal->sku_qty_update();
			header("location:?action=_stock_order_report");
		}
}
else{
		
		?>

		
		 <style>
			
			.ordered{background-color: rgba(0, 255, 0, 0.2); }
			.not_ordered{background-color: rgba(); }
			.low{background-color: rgba(255,0,0,0.1);}
			.inStock{background-color: rgba(0, 0, 255, 0.1); }
			.dno{display: none}
			
			</style>

            <div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Low Stock Report</h3>
</div>
<div class="panel-body">
<div>
	<table class="table">
 	 <tr class="heading">
   		 <td style="font-size:16px"><strong>SKU</td></strong>
   		 <td style="font-size:16px; text-align:center"><strong>Date Ordered</td></strong>
   		 <td style="font-size:16px; text-align:center"><strong>Date Rec</td></strong>
    	 <td style="font-size:16px; text-align:center"><strong>SKU Total</td></strong>
    	 <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td></strong>
     	 <td style="font-size:16px; text-align:center"><strong>Order</td></strong>
  	</tr>
  </td>
  <?php
  foreach ($goods_total as $result){
	 $status = $result['last_order_date'] > $result['delivery_date']? 'ordered': 'not_ordered';
	 $low =  $result['buffer_qty'] > $result['stock_qty']? 'low':'ok';
	 $inStock =  $result['stock_qty']> $result['buffer_qty']? 'inStock':'na';
	$dno = $result['allocation_id']> 29 ? 'order':'dno';


		echo "<tr class='$status $low $inStock'>";
			?>
    <td class=""><a href="?action=activity&sku=<?php echo htmlspecialchars($result['sku']).'&sku_id='.$result['sku_id'];?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
  <?php  			
	 echo "<td class='' style='text-align:center'>". date('d-m-Y', strtotime($result['last_order_date']));		
	 echo"<td style='text-align:center' class=''>". date('d-m-Y', strtotime($result['delivery_date']));
	?>
    </strong>
   
		<?php 
		echo "<td class='' style='text-align:center; '><strong style='color: red;'>". $result['stock_qty'];
		echo "<td class='' style='text-align:center;'>". $result['buffer_qty'];
		echo "<td style='text-align:center;' class='$dno'><a href='?action=send&sku_order='".htmlspecialchars($result['sku']) ."'&qty='" .$result['pack_qty']."'&id='".$result['sku_id']."'class='btn btn-default btn-primary'>Order</a></td>";
						
		}
}

?>
  </tr>
</table>
</div>
</div>
</div>

