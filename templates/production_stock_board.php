
<?php require_once './DAL/PDOConnection.php';

$board = 31;
$productDal = new products();
$goods_total = $productDal->getProductionStockList($board);

// check to see if the page is posted back via the "Update button" then continue to load the rest of the page


		?>
<style>
      
    
      
      </style>
		

		</style><div class="panel panel-primary" style="width:70%; margin: 0 auto; ">
<div class="panel-heading" style="text-align:center;">
  <h3>Carton Production List</h3>
</div>
<div class="panel-body">
<div>
	<table class="table">
 	 <tr class="heading">
   		 <td style="font-size:16px"><strong>SKU</td></strong>
   		 <td style="font-size:16px"><strong>Last Ordered</td></strong>
    	 <td style="font-size:16px; text-align:center"><strong>SKU Total</td></strong>
    	 
     	 
  	</tr>
  </td>
  <?php
  foreach ($goods_total as $result){
	$status = $result['last_order_date'] > $result['delivery_date']? 'ordered': 'not_ordered';
  	
			?>
      <form method="post" action="?action=action&production_Add&sku=<?php echo htmlspecialchars($result['sku'])?>&sku_id=<?php echo $result['sku_id'] ?>">
      <tr>
    <td style=""><a href="?action=activity&sku=<?php echo htmlspecialchars($result['sku']).'&sku_id='.$result['sku_id'];?>"><?php echo htmlspecialchars($result['sku']); ?></a></td>
    <?php echo "<td class='$status'>";?>
    <?php echo date('d-m-Y', strtotime($result['last_order_date']))?>
     </strong>
		<?php 
    echo '</td>';
    $qty = $result['ave']-$result['buffer_qty'];
   
		echo '<td style="text-align:center; "><strong style="color: red; ">'. $result['stock_qty'];
		
   	echo '<td style="text-align:center;"><a href="?action=activity&sku='.htmlspecialchars($result['sku']) .'&sku_id=' .$result['sku_id'].'"class="btn btn-default btn-primary">Amend</a></td>
    </tr>
    </form>';
						
	}


?>

  </tr>
</table>


<!-- the overlay -->
<div id="sheet" class="rounded">
 
<div class="overlay black">