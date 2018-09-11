<?php 
//connection to DB
require_once './DAL/PDOConnection.php';
$suppliers = new products;
?>
<form method="post" action="?action=scheduledDeliveries">
<input class="suppliers" name="date" type="text" onfocus="(this.type='date')" />
<button type="submit" class="btn btn-large btn-success" name="submit">Search</button>
      <input type="hidden" name="doSearch" value="1"  />
  </form>

      <?php

      if(isset($_POST['doSearch'])){
      	$date = $_POST['date'];
$dates = $suppliers->getScheduledDates($date); 


?>
<h2>Scheduled Date: <?php echo date('d/m/Y', strtotime($date))?></h2>
<table width="100%" class="listing_table" >
      <thead>
        <tr class="heading" style="text-align:center">
        	<th>Order No</th>
        <th>Supplier</th>
        <th>Due Date</th>
        <th>Scheduled Time</th>          
        </tr>
      </thead>
      <tbody>
      <?php
      ;
			foreach ($dates as $result) {
echo"<tr class='table' style=' border-bottom: thin dashed #CCC'>";
echo "<td><a href='//damasco.web/goods-in/po/".$result['order_id']."'>". $result['order_id']."</a></td>";
	echo "<td>". $result['name']."</td>";
	echo "<td>". date('d-m-Y', strtotime($result['due_date']))."</td>";
	echo "<td>". date('H:i', strtotime($result['scheduledDate']))."</td></tr>";
	
}
}?>
</tbody>
</table>