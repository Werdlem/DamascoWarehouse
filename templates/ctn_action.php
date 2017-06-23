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
	$ref = $_POST['ref'];
	$initials = $_POST['initials'];
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
$fluteWidth = $_POST['fluteWidth'];

$carton->addJob($ref,$initials, $style, $height, $width, $qty, $deckle, $chop, $chopCrease1, $chopCrease2,$deckleCreaseL, $deckleCreaseW, $glueFlap, $finish, $grade, $image, $category, $cost, 
  $margin, $boardQty, $config, $length, $fluteWidth);
header("location:?action=ctn_carton_specs");

};