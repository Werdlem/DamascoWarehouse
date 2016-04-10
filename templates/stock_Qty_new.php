<?php require_once './DAL/PDOConnection.php';
$productDal = new products();
$fetch = $productDal->Get_Allocation();
?>

<div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;">
  <h3>Stock Quantity Totals</h3>
</div>
<div class="panel-body">
<form  method="post" id="Search" action="?action=stock_qty_new">
      <div id="search" style="text-align:center">
        <?php $product = $productDal->Get_Allocation();
	  $dropdown = "<select name='search_stock' id='mySelect' onchange='select()'>";
	  foreach ($product as $result){
		  $dropdown .="\r\n<option value='{$result['allocation_id']}'>{$result['name']}</option>";
		  }
		  $dropdown .="\r\n</select>";
		  echo $dropdown;
	   ?>
        <script>
       function select(){
		   var x = document.getElementById("mySelect").value;
		   
		   }
       </script> 
        <br />
        <br />
        <button type="submit" class="btn btn-large btn-success" name="submit" >Search</button>
        <input type="hidden" name="doSearch" value="1">
      </div>
    </form>
    <?php 
    if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			$fetch = $_POST['search_stock'];
			
			$fetch = $productDal->Get_Allocation_Sku($fetch);
			?>
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
  

foreach ($fetch as $result){ ?>
  <tr style="">
    <td style=""><a href="?action=sheetboard_details&sku=<?php echo $result['sku'];?>"><?php echo $result['sku']; ?></a></td>
    <td style="text-align:center"><?php if ($result['last_order_date'] < '(NULL)') { echo '';} else{ echo date('d-m-Y',strtotime($result['last_order_date']));} ?></td>
    <?php
$total = $result['sku'];
$selection = $result['sku'];

$goods_total = $productDal->Get_Sku_Total($selection);

foreach ($goods_total as $result){
	
	$sku_total = $result['total_rec']-$result['total_del_sku']-$result['qty_out']+$result['qty_in']-$result['total_del_desc1'];
	$sku_adj = $result['qty_in']-$result['qty_out'];
	echo '<td style="text-align:center">'.$result['date_rec'].'</td>';
	echo '<td style="text-align:center">'. $sku_total .'</td>';
	echo '<td style="text-align:center">'. $result['buffer_qty'] .'</td>';
	echo '<td style="text-align:center;"><a href="?action=test_send&sku='.$result['sku'] .'class="btn btn-default btn-primary">Order</a></td>';
	}
}
		}
	}

?>
  </tr>
</table>
