<?php

include 'stock_order_search.php';
require_once './DAL/PDOConnection.php';

// Check what to search for via posted page
if(isset($_POST['doSearch'])){

	if($_POST['doSearch']==1)
	{

	if($_POST['search_customer']==''){

		die ('Please search customer!');
	}
else{
	$search = $_POST['search_customer'];
	$productDal = new products();
	$order = $productDal->get_Customer($search);
}
}

if($_POST['doSearch']==2){

	if($_POST['search_order']==''){

		die ('Please search an order!');
	}
else{
	$search = $_POST['search_order'];
	$productDal = new products();
	$order = $productDal->get_Order($search);
}
}
if ($_POST['doSearch']==3){ 
 
 $dateFrom = $_POST['date-from'];
 $dateTo = $_POST['date-to'];
 $search = 'DATE RANGE BETWEEN: '.date('d-m-Y', strtotime($dateFrom)).' & '.date('d-m-Y', strtotime($dateTo));
 $productDal = new products();
 $order = $productDal->get_Date_Range($dateFrom, $dateTo); 
}


?>
 <style>
         tr:nth-child(even){background:#d9edf7;}
        
     </style>

<table class="table">
<?php echo '<br/><br/><p><h1>'.strtoupper($search).'</h1>';?>
<thead>
<tr class="table">
<th>PO</th>
<th style="width:15%">Due Date</th>
<th>Sku</th>
<th>Description</th>
<th>Description Sku</th>
<th>Required</th>
<th style="width:15%">Stock Qty</th>
</thead>
<tbody>

<?php

foreach ($order as $results){
	$sku1 = $results['sku'];
	$sku2 = $results['desc1sku'];
	$sku3 = $results['desc1sku'];

echo 		'<tr>
			<td>'.$results['order_id']. '</td>
			<td>'.$results['due_date']. '</td>
			<td>'.$results['sku']. '</td>
			<td>'.$results['desc1'] . '</td>
			<td>'.$results['desc1sku'].'</td>
			<td>'.number_format($results['qty']) . '</td>';
			
			$fetch = $productDal->_get_products($sku1, $sku2);
			foreach ($fetch as $found){
					echo '<td>'.number_format($found['stock_qty']). '</td></tr>';

			}
			
			}


?>
</tbody></table>

<?php }
 ?>
