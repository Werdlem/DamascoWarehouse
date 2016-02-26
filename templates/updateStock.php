<?php require_once('DAL/Production_PDOConnection.php');

$productDal = new products();

if (!isset($_GET['product'])){
	
	die('please select a product');
	
	}
else {
	$product = $_GET['product'];
	}
	
	$product = $productDal->GetProductDetails($product);
?>



<?php foreach ($product as $Result){?>
<form method="post" action="?action=action&update_production&customer_id=<?php echo $Result ['customer_id']?>&product=<?php echo $Result['product_id']?>">
        <input id="product_id" name="product_id" type="hidden" value="<?php echo $Result['product_id'];?>" />
        <br />
        <div style="width:49%; float:left; text-align:center">
     <label for="add">Add</label>
        <input id="add" name="add" type="text" autocomplete="off" class="form-control"/> 
        </div>
        <div style="width:49%; float:right; text-align:center">
        <label for="subtract">Subtract</label>
        <input id="subtract" name="subtract" type="text" autocomplete="off" class="form-control" />
      </div>    
   
       <span id="notesInfo"></span> 
       
<?php }?>

<button type="submit" id="update_production" name="update_production" class="btn btn-primary" style="margin-top:10px">Post</button>
</form>

