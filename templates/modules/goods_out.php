<?php

//----------------------------------------GOODS_OUT_TOTAL--------------------------------//

$goods_in = $productDal->Get_All($sku);

	 

//--------------------------------------------------------------------------------------//
 
$goods_out_movement = $productDal->get_Movement($sku);

?>
<table class="table" style="width:48%; float:right">
  <td style="border-bottom:none; float:right"><h3>Adjustment</h3></td>
    <tr class="heading">
    <td>Date</td>
    <td style="text-align:center">Qty Out</td>
    <td style="text-align:center">Qty In</td>
    <td style="text-align:center">Delete</td>
    </tr>
    <tr>
   <?php
     if (!$goods_out_movement);else{
	 foreach ($goods_out_movement as $result){
		?>
     <td ><?php echo date('d/m', strtotime($result['date']))?></td>
      <td style="text-align:center"><?php echo $result['qty_out']?></td>
      <td style="text-align:center"><?php echo $result['qty_in']?></td>
      <td style="text-align:center"><a href="?action=action&delete_line&id=<?php echo $result['id'];?>&sku=<?php echo $result['sku'] ?>">X</a></td>       
  </tr>
       
<?php }}
?>
</table>
