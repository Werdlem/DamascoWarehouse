<?php include 'menu_bar.html';
include_once('DAL/PDOConnection.php');
$productDal = new products;
?>
  <title>Racking</title>
  <br /><a href="add_location.php"><img src="Css/images/location.png" style="width:100px; height:40px "></a>
       
  
<form method="get" action="aisles.php" >
<br />
<button type="submit" name="Aisle" value="2">Aisle 2</button> 
<button type="submit" name="Aisle" value="3">Aisle 3</button> 
<button type="submit" name="Aisle" value="4">Aisle 4</button> 
<button type="submit" name="Aisle" value="5">Aisle 5</button>
<button type="submit" name="Aisle" value="6">Aisle 6</button> 
<button type="submit" name="Aisle" value="7">Aisle 7</button> 
<button type="submit" name="Aisle" value="8">Aisle 8</button> 
</form>
 <input type="hidden" name="Aisle2" value="2">


<?php
  $Aisle = $_GET['Aisle'];
			?>
<div id="container">
<div id="inner_container">
    <h1>Racking Aisle Number: <?php echo $Aisle; ?></></h1>

    <table width="100%" class="listing_table">
        <thead>
        <tr class="heading">
            <th>Location</th>
            <th>Product</th>
            <th>notes</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
	$Aisles = $productDal->GetAisle($Aisle);	
    foreach ($Aisles as $result)
    {
		?>
        <tr>
            <td><a href="edit_location.php?id=<?php echo $result['id']; ?>" style='color:black'><?php echo $result['location'];?></a></td>
            <td><?php echo $result['product'];?></td>
            <td><?php echo $result['notes'];?></td>
            <td>
            <?php if ($result['product'] > null){ ?>
                <a href="update_product.php?id=<?php echo $result['product'];?>"><img src='Css/images/edit.png' style='width:22px; height:20px' /></a>
            </td>
            <td>
                <a href="delete.php?delete=<?php echo $result['id']; ?>"><img src='Css/images/delete.png' style='width:22px; height:20px' /></a>
            </td>
            <?php } else{
				echo
				"<img src='Css/images/edit_dis.png' style='width:22px; height:20px' /></td>
				<td><img src='Css/images/delete_dis.png' style='width:22px; height:20px' /></td>";
				}?>
            
        </tr>
        <?php
	}
	
	?>
    
   
</tbody>
</table>
</div>
</div>
<input type="button"
  onClick="window.print('container')"
  value="Print List"/>
  <br />
</body>
</html>