<head>
    <title>Add New Product</title>
    <style>
.form-control-new{display:inline; width: 70%; float:right; margin-right:40px}
p{font-weight:bold}
</style>
    </head>
<body>
<?php 
include_once('./DAL/PDOConnection.php');
$productDal = new products();

if(isset($_GET['search'])){
$new = urldecode($_GET['search']);
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

    <form method="post" action="?action=action">
        
            <p>Product: <input id="sku" class="form-control-new" name="sku" type="text" value="<?php echo htmlspecialchars($new); ?>"/></p>
            <p>Desc: <input id="description" class="form-control-new" name="description" type="text" /></p>    
            <p>Pack Qty: <input id="pack_qty" class="form-control-new" name="pack_qty" type="text" value="0"/></p>
           
        
      <p>Alias 1: 
        <input id="alias_1" name="alias_1" type="text" class="form-control-new"/></p>
     
        <p>Alias 2:
        <input id="alias_2" name="alias_2" type="text" class="form-control-new" /></p>
     
        <p>Alias 3:
        <input id="alias_3" name="alias_3" type="text" class="form-control-new" /></p>
      
           <p>Allocation:
            <?php 			
			$product = $productDal->Get_Allocation();
	  $dropdown = "<select class='form-control-new' style='font-weight: normal; height: 26px' name='allocation_id' id='allocation_id' onchange='select()'>";	  			
				$dropdown.="\r\n<option value='0'>None</option>";
	  foreach ($product as $result){
		  $dropdown .="\r\n<option value='{$result['allocation_id']}'>{$result['name']}</option>";
		  }
		  $dropdown .="\r\n</select>";
		  echo $dropdown; ?>
          </p>
            
          
            <input id="stock_qty" class="form-control-new" name="stock_qty"  type="hidden" value="0"/>
            <p>Buffer Qty: 
            <input id="buffer_qty" class="form-control-new" name="buffer_qty" type="text" value="0"/></p>
                         
          <p>Notes: </p>
           <textarea id="notes" class="form-control-new" style="float:left; width:90%" name="notes" rows="3" type="text"> </textarea>
           <br />
           <br />
           <br />
           <br />
          <p><button type="submit" class="btn btn-primary" name="add_sku" >Add</button></p>
       
        </form>
       </div>
        </div>
        
        
</body>
</html>