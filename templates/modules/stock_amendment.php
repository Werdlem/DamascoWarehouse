<?php
require_once './DAL/PDOConnection.php';
$productDal = new products();

if (isset($_GET['sku'])){	
	$sku = $_GET['sku'];
	}
	else{
	$sku = $_POST['search_board'];	
	$goods_in = $productDal->get_Goods_In_Sku($sku);
	}
	
		$goods_in = $productDal->get_sku($sku);
	?>

<div class="panel panel-primary" style="width:50%; float:right;">
  <div class="panel-heading" style="text-align:center;">
    <h3>Stk Qty Ammend</h3>
  </div>
  <div class="panel-body">
    <div>
   
      
    </form>
    <div>
      <form  method="post" action="?action=action&update_movement&sku=<?php echo $sku?>">
        <input id="product_id" name="product_id" type="hidden" value="" />
        <br />
        <div style="width:23%; float:left; text-align:center">
          <label for="add">Add</label>
          <input id="add" name="add" type="text" autocomplete="off" class="form-control"/>
        </div>
        <div style="width:23%; float:left; text-align:center; padding-left:5px">
          <label for="subtract">Subtract</label>
          <input id="subtract" name="subtract" type="text" autocomplete="off" class="form-control" />
        </div>
        <br  /><br /><br />
        <button type="submit" id="update_sheetboard" name="update_sheetboard" class="btn btn-primary">Post</button>
      </form>
      <br />
    </div>
    <?php 
include ('/templates/modules/goods_in.php');
include ('/templates/modules/goods_out.php');
echo '</div>';
echo '</div>';


