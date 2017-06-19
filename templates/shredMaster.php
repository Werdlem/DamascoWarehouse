

<?php 
require_once './DAL/PDOConnection.php';
//require_once '../DAL/sheetboard_PDOConnection.php';
$productDal = new products();


?>
<style>
th{
  text-align: center;
  width: auto;
  background-color: #bce8f1
}
  td{
    text-align: center;
    width: auto;
  }
  tr:nth-child(even){
    background-color: #bce8f1;
  }
</style>
<div ng-controller="boardController as board">
<div class="panel panel-success" style="float:left width: auto;">
  <div class="panel panel-heading">
    <h3 style="text-align:center">Sheetboard Entry</h3>
  </div>
  <div class="panel-body">
    <form  method="post" id="Search" action="?action=action&addShred">
    <label>Pallet No:</label><input type="text" name="palletNo" size="3" autofocus="autofocus" />
    <label>Size width: </label><input type="text" name="width" size="5" autocomplete="off">
     <label>Size length: </label><input type="text" name="length" size="5" autocomplete="off">
     <label>Grade: </label><input type="text" name="grade" size="5" autocomplete="off">
     <label>Flute</label>
     <select style="width: 50px" name="" ng-model="selectedFlute" ng-init="selectedFlute = board[0]" ng-options="x.flute for x in board"></select>
            <input type="text" hidden name="flute" value="{{selectedFlute.flute}}">
      <label>Measurement: </label><input type="text" name="measure" ng-model="measure" size="3" autocomplete="off">
     <label>Qty: </label><input type="text" name="qty"  size="5" autocomplete="off" ng-if="boardCalc() !==null" value="{{boardCalc()|number:0}}"><strong>*</strong>

     
        <button type="submit" class="btn btn-large btn-success" name="addShred" id="addShred">Add</button>
        <label style="font-size: 12px">* Qty is only a guide and may not accurately reflect the number of sheets on the pallet.</label>
     
    </form>
  </div>
<form method="post" action="?action=action&deleteShred">
<table class="table">
        <thead>
        <tr class="heading">
        <th>Pallet No</th>
        <th>Size</th>
        <th>Grade</th>
        <th>Flute</th>
        <th>Qty*</th>
        <th></th>
        </tr>
        </thead>


<?php

$data = $productDal->getShred();

foreach ($data as $results){

  echo '
         
  <td>'. $results['palletNo'] .'</td> 
  <td>'. $results['width'] .'mm <strong>x</strong> '
  . $results['length'].'mm</td>
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
</div>
<script src="/restricted/myApp.js"></script>