<div id="goods_in">
<h3 style="text-align:center">Goods In</h3>
<?php 
$goods_in = $productDal->get_Goods_In_Sku($search_sku, $selection);
$total = $productDal->Goods_In_Total($search_sku);
if (!$total){
		$goods_in_amt = 0;
		}
		else{
		foreach ($total as $goods_in_amt){$goods_in_amt; }
		}

?>

<table style="width:90%; margin-left:20px; margin-bottom:10px">
  <tr class="heading" style="border-bottom:thin solid #000;">
    <td><strong>Date Rec</td></strong>
    <td style="text-align:center"><strong>Purchase Order</td></strong>
    <td style="text-align:right"><strong>Qty</td></strong>
    </tr>
    <?php
	if (!$goods_in){
		
		}
		else{
			foreach ($goods_in as $Result){
				
		{?>
        <tr style="border-bottom:thin dashed#999;">
    <td ><?php echo date('d/m/y',strtotime($Result['delivery_date']))?></td>
     <td style="text-align:center"><?php echo $Result['po']?></td>
    <td style="text-align:right"><?php echo $Result['qty_received']?></td>
  </tr>
  <?php	
  
		}	
			}
		}
	?>
</table>
</div>

