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
    <form action="?action=sheetboard" method="post" id="Search">
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
			$sku = $productDal->Get_Sheetboard($sku);
			foreach($sku as $Result){
			
				$id = $Result['sku'];
			
		}
		}
		}
?>
<?php if (!isset($_POST['doSearch']) || $_POST['doSearch']) { ?>
<div class="panel panel-primary" style="width:100%; float:left">
<div class="panel panel-heading">
  <h3>Search Results</h3>
</div>
<div class="panel-body" style="margin-top:-20px">
<?php 
echo '<h2>' . $id . '</h2><br/>';
foreach ($sku as $result){	
	echo '<p><a href ="?action=sheetboard_details?'.$result['description'].'" class="btn btn-large btn-success" name="submit">' . $result['description']. '</a></p> &nbsp;';
}
}
}
?>
