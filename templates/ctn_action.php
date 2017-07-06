<?php

require_once('/DAL/cartons.php');

$carton = new carton();


if (isset($_POST['ctn_add']))
{

$style = $_POST['style'];
$height =  $_POST['height'];
$width =  $_POST['width'];
$length =  $_POST['length'];
$breadth = $_POST['breadth'];
$glueFlap = $_POST['glueFlap'];
$trimWidth = $_POST['trimWidth'];
$trimLength = $_POST['trimLength'];
$image = $_POST['image'];

$carton->addStyle($style,$height, $width, $length,$breadth,$glueFlap, $trimWidth, $trimLength, $image);
header('quotes/');

echo $style;
};

if (isset($_POST['addJob']))
{
	$ref = (strtoupper($_POST['ref']));
	$initials = (strtoupper($_POST['initials']));
$style = $_POST['style'];
$height =  $_POST['height'];
$length =  $_POST['length'];
$width = $_POST['width'];
$qty = $_POST['qty'];
$deckle =  $_POST['deckle'];
$chop =  $_POST['chop'];
$chopCrease1 = $_POST['chopCrease1'];
$chopCrease2 = $_POST['chopCrease2'];
$deckleCreaseL = $_POST['deckleCreaseL'];
$deckleCreaseW = $_POST['deckleCreaseW'];
$glueFlap = $_POST['glueFlap'];
$finish =  $_POST['finish'];
$grade =  $_POST['grade'];
$image = $_POST['image'];
$category = $_POST['category'];
$cost = $_POST['cost'];
$margin = $_POST['margin'];
$boardQty = $_POST['boardQty'];
$config = $_POST['config'];
$flute = $_POST['flute'];
$breadth = $_POST['breadth'];

$carton->addJob($ref,$initials, $style, $height, $width, $qty, $deckle, $chop, $glueFlap, $finish, $grade, $image, $category, $cost, 
  $margin, $boardQty, $config, $length, $flute, $breadth);
header("location:?action=ctn_carton_specs");

};

if(isset($_POST['saveQuote']))
{
$ref = (strtoupper($_POST['ref']));
$productRef = (strtoupper($_POST['productRef']));
$style = $_POST['style'];
$height =  $_POST['height'];
$length =  $_POST['length'];
$width = $_POST['width'];
$qty = $_POST['qty'];
$deckle =  $_POST['deckle'];
$chop =  $_POST['chop'];
$glueFlap = $_POST['glueFlap'];
$finish =  $_POST['finish'];
$grade =  $_POST['grade'];
$category = $_POST['category'];
$cost = $_POST['cost'];
$margin = $_POST['margin'];
$boardQty = $_POST['boardQty'];
$config = $_POST['config'];
$flute = $_POST['fluteWidth'];
$breadth = $_POST['breadth'];
$unitPrice = $_POST['unitPrice'];
$total = $_POST['total'];
$date = date('Y-m-d');
$unitLabour = $_POST['unitLabour'];
$unitSqm = $_POST['unitSqm'];
$unitMaterials = $_POST['unitMaterials'];
$materialsTotal = $_POST['materialsTotal'];
$labourTotal = $_POST['labourTotal'];
$totalSqm = $_POST['totalSqm'];
$deliveryTotal = $_POST['deliveryTotal'];
$fluteWidth = $_POST['fluteWidth'];
$customerName = (strtoupper($_POST['customerName']));
$customerContact = (strtoupper($_POST['customerContact']));
$salesMen = $_POST['salesMan'];

$carton->addQuote($ref,$productRef,$style,$height,$length,$width,$qty,$deckle,$chop,$glueFlap,$finish,$grade,$category,$cost,$margin,$boardQty,$config,$flute,$breadth,$unitPrice,
	$total,$date,$unitLabour,$unitSqm,$unitMaterials,$materialsTotal,$labourTotal,$totalSqm,$deliveryTotal,$fluteWidth,$customerName,$customerContact,$salesMen);
header("location:?action=ctn_carton_specs");
echo 'success';
}

