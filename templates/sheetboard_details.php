<?php
require_once './DAL/sheetboard_PDOConnection.php';
//require_once '../DAL/sheetboard_PDOConnection.php';
$productDal = new sheetboard();
$query = $productDal->get_Movement($sku);

?>


 <table class="table" style="width:48%; float:right">
 <td style="border-bottom:none; float: right">Adjustment</td>
    <tr class="heading">
    <td>Date</td>
    <td>Qty Out</td>
    <td>Qty In</td>
    </tr>
    <tr>
     <?php
	 foreach ($query as $result){?>
     <td><?php echo $result['date']?></td>
      <td><?php echo $result['qty_out']?></td>
      <td><?php echo $result['qty_in']?></td>        
       </tr>
       
<?php }
?>
</table>
