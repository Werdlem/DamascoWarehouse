<?php 
require_once './DAL/sheetboard_PDOConnection.php';
//require_once '../DAL/sheetboard_PDOConnection.php';
$productDal = new sheetboard;
?>
<style>
.home {
	background-color: #e5e5e5;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.125) inset;
	color: #555;
	text-decoration: none;
}
.panel-success {
	width:100%;
}
</style>


<div class="panel panel-success" style="float:left">
  <div class="panel panel-heading">
    <h3 style="text-align:center">Sheetboard Select</h3>
  </div>
  <div class="panel-body">
    <form  method="post" id="Search">
      <div id="search" style="text-align:center">
        <?php $product = $productDal->sku();
	  $dropdown = "<select name='search_board' id='mySelect' onchange='select()'>";
	  foreach ($product as $result){
		  $dropdown .="\r\n<option value='{$result['sku']}'>{$result['sku']}</option>";
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
        <button type="submit" class="btn btn-large btn-success" name="submit">Search</button>
        <input type="hidden" name="doSearch" value="1">
      </div>
    </form>
  </div>
</div>
<?php

if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			if ($_POST['search_board'] == ""){ die ('<div class="alert alert-danger" role="alert" style="float:left; width:100%; text-align: center">Oops, it would appear you have not entered a product to searh for!! <br />Please try again!</div>');}else{
			
			$sku = $_POST['search_board'];
			
				
				$goods_in = $productDal->get_Sheetboard($sku);



	?>
	<div class="panel panel-primary" style="width:100%; float:left;">
<div class="panel-heading" style="text-align:center;"><h3>Product Details</h3></div>
<div class="panel-body">


<div>
     <label for="product">Product</label>
        <input id="product" name="product" type="text" disabled="disabled" class="form-control" value="<?php echo $sku ?>"/>
     <br />
     
        <span id="notesInfo"></span> </div>
     
      <div>
      <form  method="post">
        <input id="product_id" name="product_id" type="hidden" value="" />
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
       


<button type="submit" id="update_sheetboard" name="update_sheetboard" class="btn btn-primary" style="margin-top:10px">Post</button>
</form>
</div>

    <table class="table" style="width:48%; float:left">
    <td style="border-bottom:none; float:right">Goods In</td>
    <tr class="heading">
    <td>Date Rec</td>
    <td>Qty</td>
    </tr>
    <tr>
     <?php
	 foreach ($goods_in as $Result){?>
     
      <td><?php echo $Result['delivery_date']?></td>
      <td><?php echo $Result['qty_received']?></td>
        
       </tr>
    
        
           
<?php }
			}
		}
}
	?>
    </table>
    
    <?			
				include 'sheetboard_details.php';
				?>