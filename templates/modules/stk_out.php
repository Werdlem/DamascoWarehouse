<div id="goods_out">
<h3 style="text-align:center">Goods Out</h3>
<?php 
$alias1 = $result['alias_1'];
$alias2 = $result['alias_2'];
// assign (null) to empty wild card string returned should alias wild be and empty string
			if ($result['alias_wild']==''){
		$sku_wildcard = '(null)';
	}
	else{
		$sku_wildcard = $result['alias_wild'];
	}
	// end
$goods_in = $productDal->get_Goods_Out_Sku($search_sku, $alias1, $alias2,$sku_wildcard);
$total = $productDal->goods_out_total($search_sku);
if (!$total){
		$goods_out_amt = 0;
		}
		else{
		foreach ($total as $goods_out_amt){ $goods_out_amt;}
		

?>
<table style=" width:90%; margin-left:20px; margin-bottom:10px">
     
  <tr class="heading" style="border-bottom:thin solid #000;">
    <td><strong>Due Date</td></strong>
     <td style="text-align:center"><strong>Customer</td></strong>
    <td style="text-align:center"><strong>Sales Order</td></strong>
    <td style="text-align:right"><strong>Qty</td></strong>
    
 
      <?php
	if (!$goods_in){


		
		}
		else{
			foreach ($goods_in as $Result){
				
		{?>
        
  <tr style="border-bottom:thin dashed #000;">
    <td><?php echo date('d/m/y',strtotime($Result['due_date']))?></td>
    <td style="text-align:left; padding-left:5px; font-weight:bold"><?php echo $Result['customer']?></td>
    <td style="text-align:center"><?php echo $Result['order_id']?></td>
    <td style="text-align:right"><?php echo $Result['qty_delivered']?></td>
  </tr>
  <?php			
		}
			}
			
		}  
		 
   echo ' </table>';
	echo '</div>';
		}
	?>

