<div ng-controller="boardController as board" ng-app="sheetBoard">
<?php 
require_once('./DAL/PDOConnection.php');
?>
<style>
.home {
	background-color: #e5e5e5;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.125) inset;
	color: #555;
	text-decoration: none;
}
.panel-success {
	width:49%;
}

.ordered{background-color: rgba(0,255,0,0.2);padding: 2px; border-radius: 5px; border: 1px solid green}
			.not_ordered{background-color: rgba(255,0,0,0.2); padding: 2px; border-radius: 5px; border: 1px solid red}
</style>
  <div class="panel panel-success" style="float:left">
    <div class="panel panel-heading">
      <h3 style="text-align:center">Product Search</h3>
    </div>
    <div class="panel-body">
      <form action="index.php" method="post" location_id="Search">
        <div location_id="search" style="text-align:center">
          <input type="text" style="margin-bottom:10px" class="txt_box" name="search_sku" autofocus="autofocus" tabindex="1"/>
          <br />
          <button type="submit" class="btn btn-large btn-success" name="submit">Search</button>
          <input type="hidden" name="doSearch" value="1">
        </div>
      </form>
    </div>
  </div>
  <div class="panel panel-success" style="float:right">
    <div class="panel panel-heading">
      <h3 style="text-align:center">Location / Notes Search</h3>
    </div>
    <div class="panel-body">
      <form action="index.php" method="post" location_id="Search" >
        <div location_id="search" style="text-align:center">
          <input type="text" style="margin-bottom:10px" class="txt_box" name="search_location" tabindex="2">
          <br />
          <button type="submit" class="btn btn-large btn-success" name="submit" value="Search">Search</button>
          <input type="hidden" name="doSearch" value="2">
        </div>
      </form>
    </div>
  </div>

<?php
if(isset($_POST['doSearch'])){
	
	if($_POST['doSearch']==1)
		{
			if ($_POST['search_sku'] == "" ){ 			
			die ('<div class="alert alert-danger" role="alert" style="float:left; width:100%; text-align: center">Oops, it would appear you have not entered a product to search for!! <br />Please try again!</div>');
			}
			
			else{
			$productDal = new products;
			$fetch = $_POST['search_sku'];
			$fetch = $productDal->Search($fetch);
					}
		}	
			if ($_POST['doSearch']==2){
			if ($_POST['search_location'] == "" ){ 			
			die ('<div class="alert alert-danger" role="alert" style="float:left; width:100%; text-align: center">Oops, it would appear you have not entered a location to search for!! <br />Please try again!</div>');
			}
			else{					
			$productDal = new products;			
			$fetch = $_POST['search_location'];	
			$fetch = $productDal->SearchLocation($fetch);
			}
		}


 if (!isset($_POST['doSearch']) || $_POST['doSearch']) { 
 ?>
 <div class="panel panel-primary" style="width:100%; float:left">
 <div class="panel panel-heading"><h3>Search Results</h3></div>
 <div class="panel-body" style="margin-top:-20px">
 <?php foreach ($fetch as $result){ 
	  echo "<div style='border-bottom: 1px dashed #777; padding-bottom:5px; margin-bottom:10px; width:100%; float:left'> "
	  ?>
      
      <div class="alert alert-info" role="alert" style="width:40%; float:right; height:85px; font-size:46px; color:#C00; text-align:center">
	  <?php echo $result['location_name'];
	  ?>
      </strong>
      </div>
      
      <p>Product: <a href="?action=update_product&sku=<?php echo urlencode(($result['sku'])); ?>&sku_id=<?php echo $result['sku_id']; ?>&rel=<?php echo $result['parentId']; ?>"><?php echo
	  htmlspecialchars($result['sku']);?></a>	  
	  <?php 
				//PRODUCT EDIT AND LOCATION ASSIGN				
				if (htmlspecialchars($result['sku']) == null){ 
				echo("<a href='?action=add_product&location_id=".$result['location_id']."'>Add</a>");
				}				
				elseif ($result['location_name']<0){ 
				echo "<a href='?action=product_detail&l_id=".htmlspecialchars($result['sku'])."'style='color:red'>assign</a>";
				}				
				?>
                &nbsp; | &nbsp;
                
                Location: <?php echo $result['location_name'];?>
                </strong>
               		
				<?php 
				// lOCATION ADD PRODUCT AND ASSIGN PRODUCT
				if ($result['location_id']>0){ 
				echo "<a href='?action=add_product&location_id=".$result['location_id']."'>Assign</a>";}
				else{ 
				//echo "<a href='?action=product_detail&l_id=".$result['sku']."'style='color:red'>assign</a> ";
				}
				?>
                </p>
                 <p>Alias 1: <strong><?php echo $result['alias_1'];?></strong>
                 <?php
				 			if (htmlspecialchars($result['sku'])> ''){
				 
				  $selection = $result['sku'];
				  $sku_id = $result['sku_id'];

				  // assign (null) to empty wild card string returned should alias wild be and empty string
		if ($result['alias_wild']==''){
		$sku_wildcard = '(null)';
	}
	else{
		$sku_wildcard = $result['alias_wild'];
	}
	// end

		$goods_total = $productDal->Get_Sku_Total($selection, $sku_wildcard, $sku_id);

foreach ($goods_total as $total_sku){
	
	$sku_total = $total_sku['total_rec']+$total_sku['total_alloc']-$total_sku['total_del_desc1'];
	if($sku_total < $result['buffer_qty'])
	{
		echo '<strong><p style="color: red">Qty in Stock: '.$sku_total.'</strong>';
		}
		else {
			echo '<p>Qty in Stock: '.$sku_total;
			}
	} 
	}
	$status = $result['last_order_date'] > $total_sku['date_rec']? 'ordered':'not_ordered'
	?>
               <p>Last Ordered: <strong><?php echo '<label class="'.$status.'">'. date('d/m/Y', strtotime($result['last_order_date'])).'</label>'?></strong>
                <p>Notes: <?php echo $result['notes']?></p>
				<?php
                if(htmlspecialchars(!$result['sku'])){
				die;
				}
				
				if (!$result['location_name']){
					echo "<a href='?action=action&delete_sku=".htmlspecialchars($result['sku'])."'>Delete Product</a>";
				}
				else				
						echo '<a href="?action=action&clear_location&location_id='.$result['location_id'].'">Delete</a>';
				?>
                | <a href="?action=send&sku_order=<?php echo htmlspecialchars($result['sku'])?>&qty=<?php echo $result['pack_qty'];?>&id=<?php echo $result['sku_id'] ?>">Order</a>
                | <a href='?action=activity&sku=<?php echo htmlspecialchars($result['sku']).'&sku_id='.$result['sku_id']?>'>Activity</a>
				<?php if (htmlspecialchars($result['sku'])>0){
					echo "| <a href='?action=update_product&sku=".htmlspecialchars($result['sku'])."&sku_id=". $result['sku_id']."'>Details</a>";
					
					}
					else{
						}
						echo '</div>';
						}
					}
		}
?>

