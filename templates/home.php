
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/warehouse.css"  type="text/css"/>
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/dateInput.css" />
<script src="./Jquery/jquery.min.js" type="text/javascript"></script> 
<script src="./Jquery/jquery-ui.min.js" type="text/javascript"></script>  

<title>Damasco Warehouse Control</title>
</head>
<body>
<div id="wrapper">
<script src="Jquery/jquery-ui.min.js"></script> 
<script src="js/bootstrap.js"></script>
<title>Untitled Document</title>
</head>

<script type="text/javascript">   
	$(document).ready
	(function(){ var ac_config = { source: "autoSelect.php", select: function(event, ui){ 
	$("#sku").val(ui.item.sku); 
	$("#sku_id").val(ui.item.sku_id); },
	minLength:1 }; 
	$("#sku").autocomplete(ac_config);}); 
	
	$(function() {
  $("#sku").focus();
});
    </script>

<form action="?action=activity" method="post">
  <input type="text" placeholder="Search SKU" id="sku" name="search_sku" width="200px" autocomplete="off"/>
    <button type="submit" value="Search">Search</button>
  <input type="hidden" name="doSearch" value="1">
</form>
