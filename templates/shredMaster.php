<?php 
require_once './DAL/PDOConnection.php';
//require_once '../DAL/sheetboard_PDOConnection.php';
$productDal = new products();


?>
<style>
th{
  text-align: center;
  width: auto;
}
  td{
    text-align: center;
    width: auto;
  }
</style>

<div class="panel panel-success" style="float:left width: auto;">
  <div class="panel panel-heading">
    <h3 style="text-align:center">Sheetboard Entry</h3>
  </div>
  <div class="panel-body">
    <form  method="post" id="Search" action="?action=action&addShred">
    <label>Pallet No: </label><input type="text" name="palletNo" size="5" autofocus="autofocus" />
    <label>Size width: </label><input type="text" name="width" size="10" autocomplete="off">
     <label>Size length: </label><input type="text" name="length" size="10" autocomplete="off">
     <label>Grade: </label><input type="text" name="grade" size="10" autocomplete="off">
     <label>Flute</label>
     <select style="width: 50px" name="flute">
     <option name="flute" value="B">B</option>
     <option name="flute" value="C">C</option>
     <option name="flute" value="E">E</option>
     <option name="flute" value="BC">BC</option>
     </select>
     <label>Qty: </label><input type="text" name="qty" size="10" autocomplete="off">
     
        <button type="submit" class="btn btn-large btn-success" name="addShred" id="addShred">Add</button>
        
     
    </form>
  </div>
<form method="post" action="?action=action&deleteShred">
<table class="table">
        <thead>
        <tr class="heading">
        <th>Pallet No</th>
        <th>Size</th>
        <th>Grade</th>
        <th>flute</th>
        <th>qty</th>
        <th></th>
        </tr>
        </thead>


<?php

$data = $productDal->getShred();

foreach ($data as $results){

  echo '
         
  <td>'. $results['palletNo'] .'</td> 
  <td>'. $results['width'] .' x '
  . $results['length'].'</td>
  <td>'. $results['grade'].'</td>
  <td>'. $results['flute'].'</td>
  <td>'. $results['qty'].'</td>
  <td><a href="?action=action&deleteShred&id='.$results['id'].'"><img src="./css/images/icon-delete.gif" id="'.$results['id'].'"></a></tr>'
  ;

}
?>

</table>
</div>
</form>
