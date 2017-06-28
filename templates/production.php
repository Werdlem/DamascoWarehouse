
<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$goods_total = $productDal->getProductionList();

// check to see if the page is posted back via the "Update button" then continue to load the rest of the page


		?>

		

		</style><div class="panel panel-primary" style="width:70%; margin: 0 auto; ">
<div class="panel-heading" style="text-align:center;">
  <h3>Carton Production List</h3>
</div>
<div class="panel-body">
<div>
	<table class="table">
 	 <tr class="heading">
   		 <td style="font-size:16px"><strong>SKU</td></strong>
   		 
    	 <td style="font-size:16px; text-align:center"><strong>SKU Total</td></strong>
    	 <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td></strong>
     	 <td style="font-size:16px; text-align:center"><strong>QTY</td></strong>
  	</tr>
  </td>
  <?php
  foreach ($goods_total as $result){
	
	
			?>
      <form method="post" action="?action=action&production_Add&sku=<?php echo htmlspecialchars($result['sku'])?>&sku_id=<?php echo $result['sku_id'] ?>">
      <tr>
    <td style=""><a href="?action=activity&sku=<?php echo htmlspecialchars($result['sku']).'&sku_id='.$result['sku_id'];?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
     </strong>
		<?php 
    $qty = $result['ave']-$result['buffer_qty'];
   
		echo '<td style="text-align:center; "><strong style="color: red; ">'. $result['stock_qty'];
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.1); ">'. $result['buffer_qty'];
    echo '<td ><input size="1" value="'. $qty . '" style="margin: 0 auto; display: block" id="qty" name="qty"></input></td>';
		echo '<td><button rel="#'. $result['sku_id'].' name="update_sheetboard" class="btn btn-primary" style="float: right">Adjust</button></td>
    </tr>
    </form>';
						
	}


?>

  </tr>
</table>


<!-- the overlay -->
<div id="sheet" class="rounded">
 
<div class="overlay black">