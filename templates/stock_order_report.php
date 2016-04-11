<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
//$fetch = $productDal->Get_Allocation();


$selection = $productDal->select_all();
			?>
            <div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Low Stock Order Report</h3>
</div>
<div class="panel-body">
<div>
<table class="table">
  <tr class="heading">
    <td style="font-size:16px"><strong>Product</td>
    <td style="font-size:16px; text-align:center"><strong>Date Ordered</td>
    <td style="font-size:16px; text-align:center"><strong>Date Rec</td>
    <td style="font-size:16px; text-align:center"><strong>Stock On Hand</td>
    <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td>
    <td style="font-size:16px; text-align:center"><strong>Order</td>
  </tr>
  <?php
  

foreach ($selection as $result){ 
    
$selection = $result['sku'];
	$goods_total = $productDal->Get_Sku_Total($selection, $selection);

foreach ($goods_total as $result){
	
	$sku_adj = $result['qty_in']-$result['qty_out'];

	$sku_total = $result['total_rec']+$result['qty_in']-$result['qty_out']-$result['total_del_desc1'];
	
	if($sku_total < $result['buffer_qty']){ ?>
		<tr style="">
    <td style=""><a href="?action=sheetboard_details&sku=<?php echo $result['sku'];?>"><?php echo $result['sku']; ?></a></td>
    <td style="text-align:center;"> Date Ordered</strong></td>
    <td style="text-align:center"><?php if ($result['date_rec'] < '(NULL)') { echo '';} else{ echo date('d-m-Y',strtotime($result['date_rec']));} ?></td>
		<?php 
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.2);*/"><strong style="color: red; ">'. $sku_total;
		echo '<td style="text-align:center; color:#06F; background-color: rgba(0,0,255,0.2); ">'. $result['buffer_qty'];
		echo '<td style="text-align:center;"><a href="?action=test_send&sku='.$result['sku'] .'class="btn btn-default btn-primary">Order</a></td>';
			
		}
	}
}
?>
  </tr>
</table>
