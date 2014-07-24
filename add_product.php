<?php include 'menu_bar.html';

include_once('DAL/PDOConnection.php');

$productDal = new products();

$isEditing = isset($_GET['id']);

if(isset($_POST['add'])){
   $result = $_POST['location'];
		$product_id = $_POST['product_id'];
        $productDal->UpdateLocation($product_id, $result);
		header("location: EmptyLocationList.php");	
}

  $id = $_GET['id'];  
    $id = $productDal->GetProductsLocation($id);{
		
foreach($id as $productDetail);


	
?>
<head>
<link rel="stylesheet" href="Css/jquery-ui.min.css" type="text/css" />
<script src="Jquery/jquery.min.js" type="text/javascript"></script> 
<script src="Jquery/jquery-ui.min.js" type="text/javascript"></script>  
    <title>Product Update</title>
    </head>
    
	<script type="text/javascript">   
	$(document).ready
	(function(){ var ac_config = { source: "autoSelect.php", select: function(event, ui){ 
	$("#product").val(ui.item.product); 
	$("#product_id").val(ui.item.product_id); },
	minLength:1 }; 
	$("#product").autocomplete(ac_config);}); 
    </script>
    
<body><div id="container">
<div id="inner_container">
    <h1>Location Update Centre</h1>
    <form method="post" id="productDetail"
          action="add_product.php<?php echo ($isEditing ? "?id=$id" : ""); ?>">
        <div>
            <label for="location">Location</label>
            <input id="location" class="txt_box" name="location" type="text" readonly  value="<?php echo $productDetail['location']; ?>"/>
            <input id="location_id" name="location_id" type="hidden" readonly  value="<?php echo $productDetail['id']; ?>"/>
            <span id="productInfo"></span>
        </div>
        <div><p class="ui-widget"> 
            <label for="product">Product</label>
            <input id="product" name="product" class="auto"type="text" value=""/>
            <input id="product_id" name="product_id" class="auto" type="hidden" value=""/></p>
            <span id="notesInfo"></span>
        </div>
      
        <input id="add" name="add" type="submit" value="<?php echo ($isEditing ? "Update" : "Add");} ?>"/>
        </form>
        
      