<!DOCTYPE HTML>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/damasco-style.css"  type="text/css"/>

<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/dateInput.css" />


<title>Damasco Warehouse Control</title>
</head>

<body>
<script src="Jquery/jquery-ui.min.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<style>
   
   </style>
<div class="container">
<div class="page-header" style="text-align:center"><img src="./css/images/postpack.png" style="margin-left:0">
  <text style="font-size:24px">Postpack & Damasco Stock Control</text>
  <img src="./css/images/dam.png" style="text-align:right"> </div>
<div class="navbar" style="font-size:16px">
  <div class="navbar-inner">
    <ul class="navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="?action=search">Home</a></li>
          <li><a href="?action=add_product_location">Add</a></li>
          <li><a href="?action=aisles&aisle=2">Aisles</a></li>
          <?php 
		  if (!isset($_COOKIE['password'])){ 
		  }
		  else{
		  ?>
          <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="?action=stock_qty">Stock</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="?action=sheetboard">Goods In</a></li>
              <li><a href="?action=_stock_order_report">Low Stock Report</a></li>
              <li><a href="?action=stock_order_search">Sales Order Report</a></li>
              <li><a href="?action=production_home">Production Activity</a></li>
              <li><a href="?action=shredmaster">Shredmaster</a></li>
              <li><a href="?action=ctn_carton_specs">Carton Calculator</a></li>
              </li>

            </ul>
           <li><a href="?action=suppliers">Suppliers</a></li>
       
         <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="?action=ctn_carton_specs">Carton Production</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="?action=ctn_jobSheet">Job Sheets</a></li>
               <li><a href="?action=production">Production Log</a></li>
        </ul>
        <?php }?>
      </div>
    </ul>
  </div>
</div>
