<?php require_once('./DAL/Production_PDOConnection.php'); 
$ProductsDAL = new products;
$products = '';
?>
<div class="panel panel-primary" style="width:60%;">
<div class="panel-heading" style="text-align:center; font-size:15px"><h3>Production Stock Totals</h3></div>
<div class="panel-body">
<table class="table">
        <thead>
        <tr class="heading">
            <th>Product</th>
            <th>Quantity</th> 
            </tr>
        </thead>
        <tbody>
         <?php $product = $ProductsDAL->GetAllProducts($products); 
		 foreach ($product as $result){?>
         <tr>
         <td><?php echo $result['product'];?></td>
         <td><?php $total = $result['product_id'];
					$total = $ProductsDAL->Total($total);
					 if ($total){foreach ($total as $amt){echo $amt;}}else{echo '0';}?>
		</td>
         </tr>
         </tbody>
         
                      
<?php }?>
</table>
</div>
</div>