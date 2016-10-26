<?php require_once './DAL/PDOConnection.php';
$productDal = new products();

if (isset($_GET['id'])){
		$fetch = $_GET['id'];
}

		$fetch = $productDal->Get_Allocation_Sku($fetch);
			?>
           
            
<div>
<table class="table">
<form id="Stock_Qty" method="post" action="?action=dummy">
  <tr class="heading">
    <td style="font-size:16px"><strong>SKU</td>
    <td style="font-size:16px; text-align:center"><strong>Date Ordered</td>
    <td style="font-size:16px; text-align:center"><strong>Date Rec</td>
    <td style="font-size:16px; text-align:center"><strong>SKU total</td>
    
    <td style="font-size:16px; text-align:center; background-color: rgba(0,0,255,0.3);"><strong>Buffer Qty</td>
    <td style="font-size:16px; text-align:center"><strong>Order</td>
  </tr>
  <?php
foreach ($fetch as $result){ ?>
  <tr style="">
    <td style=""><a href="?action=activity&sku=<?php echo $result['sku'];?>"><?php echo $result['sku']; ?></a></td>
    <td style="text-align:center"><?php if ($result['last_order_date'] < '(NULL)') { echo '';} else{ echo date('d-m-Y',strtotime($result['last_order_date']));} ?></td>
    <?php
$selection = $result['sku'];

$goods_total = $productDal->Get_Sku_Total($selection, $selection);

foreach ($goods_total as $result){
	
	$sku_total = $result['total_rec']+$result['total_alloc']-$result['total_del_desc1'];
	
	echo '<td style="text-align:center">'. date('d-m-Y', strtotime($result['date_rec'])).'</td>';
	if($sku_total <= $result['buffer_qty']){
		
		echo '<td style="text-align:center; background-color: rgba(255,0,0,0.2);*/"><strong style="color: red; ">'. $sku_total;
			
		}
		else{
	echo '<td style="text-align:center">'. $sku_total .'</td>';
		
		}
		
	echo '<td style="text-align:center; color:#06F; background-color: rgba(0,0,255,0.2); "><strong>'. $result['buffer_qty'] .'</td>';
	echo '<td style="text-align:center;"><a href="?action=send&sku_order='.$result['sku'].'&qty='.$result['pack_qty'].'" class="btn btn-default btn-primary">Order</a></td>';
			
}
}

?>

  </tr>
  </form>
</table>
