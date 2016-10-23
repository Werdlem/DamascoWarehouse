<?php require_once './DAL/PDOConnection.php';
$productDal = new products();


echo '<form id="Stock_Qty" method="post" action="?action=dummy">';

$update = $productDal->sku_qty_update();

echo '<input type="submit" name="Submit" value="submit" />';