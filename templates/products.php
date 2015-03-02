<head>
    <title>Add New Product</title>
    </head>
<body>
<?php 
include_once('./DAL/PDOConnection.php');
if(isset($_GET['search'])){
$new = $_GET['search'];
}
else
{
	$new = '';
	}
 ?>

 <div class="panel panel-primary">
<div class="panel panel-heading">
<h3>Add Product</h3></div>
<div class="panel-body">
    <form method="post" id="productDetail">
        <div>
            <label for="product">Product</label>
            <input id="product" class="form-control" name="product" type="text" value="<?php echo $new; ?>"/>
            <span id="notesInfo"></span>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description" rows="1" type="text"></textarea>
        <div>
            <label for="quantity">Quantity</label>
            <input id="quantity" class="form-control" name="quantity" type="text" value="0"/>
             </div>
             <div>
             <div>
            
            
            <input id="last_ordered" class="form-control" name="last_ordered" rows="1" value=" " type="hidden"/>
        </div>
            
            <label for="notes">Notes</label>
            <textarea id="notes" class="form-control" name="notes" rows="7" type="text"> </textarea>
        </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" name="add" >Add</button>
       
        </form>
       </div>
        </div>
        
     <?php   if(isset($_POST['add'])){
	
$product = strtoupper($_POST['product']);
$notes = nl2br($_POST['notes']);
$quantity = $_POST['quantity'];
$description = nl2br($_POST['description']);
$last_ordered = $_POST['last_ordered'];

$productDal = new products();  

$add_product = $productDal->AddProduct($product, $notes, $quantity, $description, $last_ordered);
header('location:?action=update_product&id='.$product.'&p_id=');
}?>

</body>
</html>