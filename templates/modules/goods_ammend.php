
<div id="goods_ammend">
<h3 style="text-align:center">Stock Ammend</h3>
<form  method="post" action="?action=action&sku_ammend&sku=<?php echo $result['sku']?>" style="width:90%; margin: 0 auto">
		
        <input id="product_id" name="product_id" type="hidden" value="" />
        <br />
        <div style="width:49%; float:left; text-align:center">
          <label for="add">Add</label>
          <input id="add" name="add" type="text" autocomplete="off" class="form-control" tabindex="0"/>
        </div>
        <div style="width:49%; float:right; text-align:center">
          <label for="subtract">Subtract</label>
          <input id="subtract" name="subtract" type="text" autocomplete="off" class="form-control" />
        </div>
        <span id="notesInfo"></span>
        <button type="submit" id="update_sheetboard" name="update_sheetboard" class="btn btn-primary" style="margin-top:10px">Post</button>
      </form>
<?php

//----------------------------------------GOODS_OUT_TOTAL--------------------------------//

$goods_in = $productDal->Get_All($search_sku); 

//--------------------------------------------------------------------------------------//
 
$goods_out_movement = $productDal->get_Movement($search_sku);

?>
<table style=" width:90%; margin: 0 auto; margin-bottom:10px">
     
 <tr class="heading" style="border-bottom:thin solid #000;">
    <td><strong>Date</td></strong>
    <td style="text-align:center"><strong>Qty Out</td></strong>
    <td style="text-align:center"><strong>Qty In</td></strong>
    <td style="text-align:center"><strong>Delete</td></strong>
    </tr>

   <?php
      if (!$goods_out_movement);else{
	 foreach ($goods_out_movement as $result){
		?>
        <tr style="border-bottom:thin dashed#999;">
     <td ><?php echo date('d/m/y', strtotime($result['date']))?></td>
      <td style="text-align:center"><?php echo $result['qty_out']?></td>
      <td style="text-align:center"><?php echo $result['qty_in']?></td>
      <td style="text-align:center"><a href="?action=action&delete_entry&id=<?php echo $result['id'];?>&sku=<?php echo $result['sku'] ?>">X</a></td>       
  </tr>
       
<?php }}
?>
</table>
</div>
