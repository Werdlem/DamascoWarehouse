<?php
include 'menu_bar.html';
include_once('DAL/PDOConnection.php');

$productDal = new products();
if(isset($_POST['add'])){
    //form submitted
    $location = strtoupper ($_POST['location']);
	
        $productDal->addLocation($location);
        
}
?>
<title>Add & Ammend Racking Locations</title>
</head>
<body>
<div id="container">
<div id="inner_container">
    <h1>Add Location</h1>
    <form method="post" id="productDetail" action="add_location.php">
        <div>
            <label for="location">Location</label>
            <input id="location" name="location" type="text" style="width:50px"/>
           <span id="locationInfo"></span>    </br>  
             </br>      
            
        <input id="add" name="add" type="submit" value="Add"/>
 <?php       if (mysql_errno() == 1062) {
    
    print '<strong><p style="width:400px; color: red; font-size:18px">Duplicate Racking Location Entered, Please try Again!</p></strong>';
}

?>
        </form>
        </div>
        </div>
        </div>
       <?php $locationDelete = new products();
 $getEmptyLocations = $locationDelete->EmptyLocations();
if(isset($_GET['delete'])){
	
    $locationDelete->DeleteLocation($_GET['delete']);
	header("Status: 200");
    header("Location: add_location.php");
		} ?>

<div id="container" style="">
<div id="inner_container">
    <h1>List All Empty Locations</h1>
    

    <table width="40%" class="listing_table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th>Delete</th>
            <th>Add</th>
            
        </tr>
        </thead>
        <tbody>
		<?php
		   
    foreach ($getEmptyLocations as $result)
    {

        ?>
        <tr>
            <td><?php echo $result['location'];?></td>
            <td>
                <a href="add_location.php?delete=<?php echo $result['id']; ?>"><img src='Css/images/edit.png' style='width:22px; height:20px' /></a>
                
            </td>
            <td>
                <a href="add_product.php?id=<?php echo $result['id'];?>"><img src='Css/images/add.png' style='width:22px; height:20px' /></a>
            </td>
            
        </tr>
    <?php }?>
</tbody>
</table>

       </div>
       </div>
        
</body>
</html>
