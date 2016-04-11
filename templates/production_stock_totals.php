<?php require_once('./DAL/Production_PDOConnection.php'); 
$productDal = new products;
$id = '';

$select = $productDal->GetCustomer($id);
?>
<h1>Production Stock Totals</h1>
<div class="panel panel-primary" style="width:49%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Customer</h3></div>
<div class="panel-body">

<?php foreach ($select as $Result){?>
    <p> <a href="?action=production_stock_totals&id=<?php echo $Result['customer_id'];?>"><?php echo $Result['customer_name']; ?></a></p>
<?php }?>
</div>
</div>

<div class="panel panel-primary" style="width:49%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Product List</h3></div>
<div class="panel-body">

<?php 
if ($_GET['id'] == ''){
	
	die('please select a customer');
	
	}
else {
	$id = $_GET['id'];
	}
	
	$id = $productDal->GetProduct($id)
?>

<?php $customer_id = $_GET['id'];
	 ?>

    <table class="table" style="border-top: none">
    <h4 style="text-align:center"></h4>
    <tr class="heading">
    <td><strong style="font-size:18px">Product</strong></td>
    <td><strong style="font-size:18px">Qty</strong></td>
    <td><strong style="font-size:18px">Ordered</strong></td>
    <td><strong style="font-size:18px">Order</strong></td>
    </tr>
    <tr>
    <?php foreach ($id as $Result){?>
    <td><?php echo $Result['product']?></td>
    <td><?php $total = $Result['product_id'];
	$total = $productDal->Total($total);
	if ($total){foreach ($total as $amt);{echo $amt;}}else{echo '0';}
	?>
     <td><?php echo $Result['details'];?></td>
    <td><a href="?action=send&sku_order=<?php echo $Result['product'];?>&id=<?php echo $Result['product_id'];?>" class="btn btn-large btn-primary" style="float:right; height:30px">Order</a></td>
    </tr>
    <?php }?>
    </table>
    

</div>
</div>
