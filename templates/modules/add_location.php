<?php

require_once('./DAL/PDOConnection.php');

$productDal = new products();
if(isset($_POST['add_location'])){
    //form submitted
    $location = strtoupper ($_POST['location']);
	
        $productDal->addLocation($location);
		header("location: ?action=update");
        
}
?>
 <div class="panel panel-primary" >
<div class="panel panel-heading">
<h3 style="text-align:center">Add Location</h3></div>
<div class="panel-body">
    <form method="post" id="productDetail" action="?action=action&new_location">
     
            <label for="location_name">Location</label> <br />
            <input id="location_name" name="location_name" type="text" style="width:50px"/>
           <span id="locationInfo"></span>    </br>  
             </br>      
            
        <button class="btn btn-large btn-primary" id="new_location" name="new_location" type="submit"/>Add
 <?php       if (mysql_errno() == 1062) {
    
    print '<div class="alery alert-warning" role="alert">Duplicate Racking Location Entered, Please try Again!</div>';
}

?>
        </form>
        </div>
        </div>
        
      
      