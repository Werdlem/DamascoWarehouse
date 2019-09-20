
<?php require_once './DAL/PDOConnection.php';

$board = 31;
$productDal = new products();
$goods_total = $productDal->getSheetboardList();

// check to see if the page is posted back via the "Update button" then continue to load the rest of the page


		?>
<style>
      
    
      
      </style>
		

		</style><div class="panel panel-primary" style="width:100%; margin: 0 auto; ">
<div class="panel-heading" style="text-align:center;">
  <h3>Sheetboard List</h3>
</div>
<div class="panel-body">
<div>
	<table class="table">
 	 <tr class="heading">
   		 <td style="font-size:16px"><strong>SKU</td></strong>
   		 <td style="font-size:16px"><strong>Size</td></strong>
       <td style="font-size:16px"><strong>Supplier</td></strong>
    	 
    	 
     	 
  	</tr>
  </td>
  <?php
  foreach ($goods_total as $result){
	
  	
			?>
      <form method="post">
      <tr>
       <td><?php echo $result['sku'];?></td>
        <td><?php echo $result['description'];?></td>
         <td><?php echo $result['supplier'];}?></td>
 

  </tr>
</table>