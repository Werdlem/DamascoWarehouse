<?php include 'menu_bar.html';

include_once('DAL/PDOConnection.php');

$productDal = new products();


$id = $_GET['id'];

if(isset($_POST['add'])){
    //form submitted
    $product = $_POST['product'];
    $notes = $_POST['notes'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	

        //update Product
        $productDal->UpdateProduct($id,$product,$notes,$quantity,$description);
		header("location: index.php");
}
	

    $id = $productDal->GetProducts($id);
	foreach($id as $productDetail);{

	
		
?>
<title>Product Update</title>
</head><body>
<div id="container">
  <div id="inner_container">
    <h1>Product Update Centre</h1>
    <form method="post" id="productDetail">
      <div>
        <label for="product">Product</label>
        <input id="product" name="product" type="text" value="<?php echo $productDetail['product']; ?>"/>
        <span id="notesInfo"></span> </div>
      <div>
        <label for="notes">Notes</label>
        <input id="notes" name="notes" type="text" value="<?php echo $productDetail['notes']; ?>"/>
      </div>
      <div>
        <label for="quantity">Quantity</label>
        <input id="quantity" name="quantity" type="text" value="<?php echo $productDetail['quantity']; ?>"/>
      </div>
      <div>
        <label for="description">Description</label>
        <input id="description" name="description" type="text" value="<?php echo $productDetail['description']; ?>"/>
      </div>
      <input id="add" name="add" type="submit" value="Update"/>
    </form>
  </div>
</div>
<?php }?>
</body>
</html>