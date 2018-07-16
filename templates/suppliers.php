<?php 
//connection to DB
require_once './DAL/PDOConnection.php';
$suppliers = new products;

//check if page has been posted back with populated variables
if(isset($_POST['doSearch'])){ 
 
 $dateFrom = $_POST['date-from'];
 $dateTo = $_POST['date-to'];
 $supplier_name = $_POST['taskOption'];
}
//declare variables 
 else
  { 
    $dateFrom = 'Date From';
    $dateTo = 'Date To';
    $supplier_name = 'Select Supplier';
  }
?>

<div class="panel panel-primary">
  <div class="panel-heading" style="text-align:center;">
    <h3>Supplier Performance Monitor</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="" id="Search">
      <select name="taskOption">
        <option><?php echo $supplier_name ?></option>
        <option>Manchester Paper box</option>
        <option>John Roberts</option>
        <option>Krystals</option>
        <option>Weedon</option>
        <option>Antalis</option>
        <option>DS Smith</option>
        <option>Curran</option>
        <option>DS Smith</option>
        <option>Drayton</option>
        <option>Sansetsu</option>
        <option>Smurfit Kappa</option>
        <option>Corrboard</option>
      </select>
      <input class="suppliers" name="date-from" value="<?php echo $dateFrom ?>" type="text" onfocus="(this.type='date')" />
      <input class="suppliers" name="date-to" value="<?php echo $dateTo ?>" type="text" onfocus="(this.type='date')" />
      <button type="submit" class="btn btn-large btn-success" name="submit">Search</button>
      <input type="hidden" name="doSearch" value="1"  />
    </form>
<!-- <<<<<<< HEAD  ====== origin/master >>>>>>>>>-->
    <?php
    // <<<<< Run rest of page once the submit button is pressed >>>>//
  if(isset($_POST['doSearch'])){
	  
	  if ($_POST['taskOption'] == "Select Supplier") {die ("please select a supplier");} else{
  
 
 $dateFrom = $_POST['date-from'];
 $dateTo = $_POST['date-to'];
 
 $supplier_name = $_POST['taskOption'];
 ?>
     <style>
         tr:nth-child(even){background:#d9edf7;}
         td{text-align: center;}
         th{text-align: center;}
     </style>

    <br />
    <p><?php echo $supplier_name .  ' supply performance between ' . $dateFrom . ' & '. $dateTo;?> <br />
    <table width="100%" class="listing_table" >
      <thead>
        <tr class="heading" style="text-align:center">
        <th>Order ID</th>
        <th>GRN </th>
          <th>Due Date</th>
          <th>Schedule Date & Time</th>
          <th>Delivery Date & Time</th>
          <th>On Time/Late/Early</th>
          <th>Margin </th>
        </tr>
      </thead>
      <tbody>

        <?php
	 // Fetch data from DB and declare variables for the number of records found matching the corresponding query
		 $fetch = $suppliers->select($supplier_name, $dateFrom, $dateTo);
		 	$count = 0;
			$onTime = 0;
			$early = 0;
			$late = 0;
    foreach ($fetch as $result)
     	{
	$count++;
        
        // Display results returned from DB

     echo"<tr class='table' style=' border-bottom: thin dashed #CCC'>";
      $sched = $result['schedule_date'];
	  		$del = $result['grn_delivery_date'];
			$due = $result['due_date'];
			$control = "0 days, 01h 30m 00s";
			$date_sched = date_create($sched);
			$date_del = date_create($del);
			$date_due = date_create($due);
			$date_format = $date_del->format('Y-m-d');
			?>
       <td><?php echo $result['pop_id'];?></td>
       <td><?php echo $result['id'];?></td>
      <td><?php echo date('d-m-Y', strtotime($result['due_date'])); ?></td>
        <td><?php echo date('d-m-Y H:i', strtotime($result['schedule_date'])); ?></td>
        <td><?php echo date('d-m-Y H:i', strtotime($result['grn_delivery_date'])); ?></td>
        <td><?php if ($due == $date_format){

        // Calculate the difference between the GRN time stamp and scheduled booking in time provided by the supplier

		  $onTime++;
				  echo '<span class="label label-success">On Time</span>';
	  }
		else if ($due > $date_format){
			$early++;
			echo '<span class="label label-warning">Early</span>';
    } 
		else{ 
		$late++;
		echo '<span class="label label-danger">Late</span>';} ?></td>

    <!-- <<< compare the difference between the date scheduled and date delivered with the delivery grace period of 90 minutes (1h 30min) >>>-->
        <td><?php  $diff = date_diff($date_sched, $date_del); 
		          $results = $diff->format("%d days, %Hh %Im %Ss");
   		         if ($results > $control){

			//display the difference between the scheduled delivery time and actual delivery time

			 echo '<span class="label label-danger">'. $results . '</span>';} else echo '<span class="label label-success">'.$results.'</span>';?></td>
       </tr>
      
      <?php }

      //summary of delivery results for given date range//

	  echo $count . " Records found! <br /><br />";
	  echo '<p>'. $onTime . " <span class='label label-success'> On Time</span> Deliveries (" . number_format((100.0*$onTime)/$count ) . "%)";
	  echo '<p>'. $early . " <span class='label label-warning'> Early</span> Deliveries (" . number_format((100.0*$early)/$count ) . "%)";
	  echo '<p>'. $late . " <span class='label label-danger'> Late</span> Deliveries (" . number_format((100.0*$late)/$count ) . "%)";
	 
}?>
      <!--<< summary of how the metrics are captured for the front end user >>-->
      <div class="alert alert-info" role="alert" style="width:75%; float: right; margin-top: -102px; font-size:13px; padding:10px"><strong>On Time/Late/Early</strong> deliveries is the difference between the initial agreed <strong>Due Date</strong> & actual <strong>Delivery Date</strong>. The <strong>Margin</strong> is the difference of delivery time between the <strong>Scheduled Date & Time</strong> and actual <strong> Delivery Date & Time</strong>. This result is then compared to a 90 minute delivery grace period, going green if within the 90minutes or red if later.</div>
      <?php }?>
        </tbody>
      
    </table>
  </div>
</div>
