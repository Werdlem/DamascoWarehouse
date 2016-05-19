<?php 

require_once('DAL/PDOConnection.php');
$productDal = new products();


?><div class="panel panel-info" style="width:39%; float:right">
  <!-- Default panel contents -->
  <div class="panel-heading" style="text-align:center; font-size:18px">Empty Locations</div>
  
<?php
//echo $aisle;
    $getEmptyLocations = $productDal->EmptyLocations($aisle);
	$empty = 0;
      ?>
    <table class="table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th style="float:right">Update</th>
            
        </tr>
        </thead>
       
        <?php foreach ($getEmptyLocations as $result)
	
    { 
	$empty++;
	?>
      <tr class="heading">
            <td><?php echo $result['location_name'];?></td>
            <td>
                <a href="?action=update_location&location_id=<?php echo $result['location_id'];?>" style="float:right">Update</a>
            </td>
            
        </tr>
        <?php
        }
		
    ?>
    <tr>
           
        </tr>
        
</table>
<?php echo "&nbsp <strong>" . $empty . " Empty locations avaliable!</strong>"; ?>
</div>
</body>
</html>