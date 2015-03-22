</div>
<h1>Production Stock Adjustment</h1>
<div style="width:1100px; margin-left:auto; margin-right:auto">
<?php
//include 'search.php';
require_once('DAL/Production_PDOConnection.php');

$productDal = new products();

$id = '';

$select = $productDal->GetCustomer($id);
?>

<div class="panel panel-primary" style="width:30%; float:left">
<div class="panel-heading" style="text-align:center;"><h3>Customer</h3></div>
<div class="panel-body">

<?php foreach ($select as $Result){?>
    <p> <a href="?action=production_stock&id=<?php echo $Result['customer_id'];?>" class="btn btn-large btn-primary"><?php echo $Result['customer_name']; ?></a></p>
<?php }?>
</div>
</div>

<div class="panel panel-primary" style="width:30%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Product</h3></div>
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
	 foreach ($id as $Result){?>

     <p><a href="?action=production_stock&id=<?php echo $Result['customer_id'];?>&product=<?php echo $Result['product_id'];?>" class="btn btn-large btn-primary"><?php echo $Result['product']; ?></a>
	 <a href="?action=action&delete_product&id=<?php echo $customer_id?>&p_id=<?php echo $Result['product_id']?>" style="color: red; float:right"><strong>X</a></strong>
	 </p>
    
<?php }?>
</div>
</div>



<div class="panel panel-primary" style="width:37%; float:left; margin-left:13px">
<div class="panel-heading" style="text-align:center;"><h3>Product Details</h3></div>
<div class="panel-body">

<?php 

if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else {
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetProductDetails($product);
?>



<?php foreach ($product as $Result){?>
<div>
     <label for="product">Product</label>
        <input id="product" name="product" type="text" disabled="disabled" class="form-control" value="<?php echo $Result['product']; ?>"/>
     <br />
        <span id="notesInfo"></span> </div>
     
      <div>
   
      
<?php }
$total = $Result['product_id'];
$total = $productDal->Total($total);
?>
	
 <label for="amount" id="amount" name="amount" type="text" />Total In Stock: <?php if ($total){foreach ($total as $amt){echo $amt;}}else{echo '0';}?>
</div>

<?php include 'updateStock.php';?>

<?php
if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else 

{
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetStockMovment($product)
?>
<div>
    <table class="table">
    <h4 style="text-align:center">Movment</h4>
    <tr class="heading">
    <td>Qty In</td>
    <td>Qty Out</td>
    <td>Date</td>
	 <td>Delete</td>
    </tr>
    <tr>
     <?php $product_id = $_GET['product'];
	 $customer_id = $_GET['id'];
	 foreach ($product as $Result){?>
       <td><?php echo $Result['qty_in']?></td>
       <td><?php echo $Result['qty_out']?></td>
       <td><?php echo $Result['date']?></td>
	   <td style="text-align:center"><a href="?action=action&delete_total&product=<?php echo $product_id ?>&id=<?php echo $customer_id ?>&line_id=<?php echo $Result['id']?>"><strong style="color: red;">X</strong></a></td>
       </tr>
        <span id="notesInfo"></span> </div>
           
<?php }?></div></table>

