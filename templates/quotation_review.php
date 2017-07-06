<?php 
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
$date = date('m-d-Y');
$unitLabour = $_POST['unitLabour'];
$unitSqm = $_POST['unitSqm'];
$unitMaterials = $_POST['unitMaterials'];
$materialsTotal = $_POST['materialsTotal'];
$labourTotal = $_POST['labourTotal'];
$totalSqm = $_POST['totalSqm'];
$deliveryTotal = $_POST['deliveryTotal'];
$fluteWidth = $_POST['fluteWidth'];
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="Quote%20Review_2_files/filelist.xml">
<style id="Quote Review_22046_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1522046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6522046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl6622046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6722046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6822046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6922046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl7022046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:nowrap;}
.xl7122046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7222046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7322046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:16.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7422046
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#F2F2F2;
	mso-pattern:black none;
	white-space:nowrap;}
-->
</style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--The following information was generated by Microsoft Office Excel's Publish
as Web Page wizard.-->
<!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->

<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<div ng-controller="styleController as style" ng-app="quoteApp">
<form action="?action=ctn_action&saveQuote" method="post">
<div id="Quote Review_22046" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=569 style='border-collapse: collapse;
 ;table-layout:auto;width:auto;'>
 <col width=178 style='mso-width-source:userset;mso-width-alt:6509;width:134pt'>
 <col width=121 style='mso-width-source:userset;mso-width-alt:4425;width:91pt'>
 <col width=110 style='mso-width-source:userset;mso-width-alt:4022;width:83pt'>
 <col width=80 span=2 style='mso-width-source:userset;mso-width-alt:2925;
 width:60pt'>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=5 height=37 class=xl7322046 width=569 style='height:27.75pt;
  width:428pt; border: 1px solid black; background:#F2F2F2'>Quotation Review</td>
 </tr>
 
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6522046 style='height:17.25pt;'>Date</td>
  <td class=xl6522046 style='border-left:none'>Customer Name</td>
  <td class=xl6522046 style='border-left:none'>Customer Contact</td>
 <td class=xl6522046 style='border:1px solid black'>Ref</td>
  <td class=xl6522046 style='border:1px solid black'>Salesman</td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6622046 style='height:17.25pt;border-top:none'><?php echo $date ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><input type="text" name="customerName"></td>
  <td class=xl6622046><input type="text" name="customerContact"></td>
  <td class=xl6622046><input type="ref" name="ref"></td>
  <td class=xl6622046><select ng-model="selectedSalesman" ng-options="x.name for x in salesMen">

 </select>
 </td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6722046 style='height:17.25pt'></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6522046 style='height:17.25pt'>Product Description</td>
  <td class=xl6522046 style='border-left:none'>Product Ref</td>
  <td class=xl6522046 style='border-left:none'>Size (Internals)</td>
  <td class=xl6522046 style='border-left:none'>Grade</td>
  <td class=xl6522046 style='border-left:none'>Cost per SqmK</td>
  <td class=xl6522046 style='border-left:none'>Quantity</td>
  
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6822046 style='height:17.25pt'><?php echo $style . ' ' . $category ?></td>
  <td class=xl6822046 style='border-left:none'><input type="productRef" name="productRef"></td></td>
  <td class=xl6822046 style='border-left:none'><?php echo $length . 'x'. $width.'x'.$height  ?></td>
  <td class=xl6822046 style='border-left:none'><?php echo $grade ?></td>
  <td class=xl6822046 style='border-left:none'><?php echo $cost  ?></td>
  <td class=xl6822046 style='border-left:none'><?php echo $qty  ?></td>
 
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6722046 style='height:17.25pt'></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7422046 style='height:17.25pt'>Unit breakdown</td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6922046 style='height:17.25pt'>Materials</td>
  <td class=xl6522046 style='border-left:none'>Labour</td>
  <td class=xl6522046 style='border-left:none'>Margin</td>
  <td class=xl6522046 style='border-left:none'>Sqm</td>
  <td class=xl6522046 style='border-left:none'>Blank Size</td>
  <td class=xl6522046 style='border-left:none'>Total per unit</td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6622046 style='height:17.25pt'><?php echo $unitMaterials ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $unitLabour ?></td>
   <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $margin ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $unitSqm ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $deckle .'x'.$chop  ?></td>
  <td height=23 class=xl6622046 style='height:17.25pt'><?php echo $unitPrice ?></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6722046 style='height:17.25pt'></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7422046 style='height:17.25pt'>Totals</td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7022046 style='height:17.25pt'>Materials</td>
  <td class=xl6522046 style='border-left:none'>Labour</td>
  <td class=xl6522046 style='border-left:none'>Sqm</td>
  <td class=xl6522046 style='border-left:none'>Delivery</td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7122046 style='height:17.25pt;border-top:none'><?php echo $materialsTotal ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $labourTotal ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $totalSqm ?></td>
  <td class=xl6622046 style='border-top:none;border-left:none'><?php echo $deliveryTotal ?></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7222046 style='height:17.25pt'>&nbsp;</td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl7022046 style='height:17.25pt'>Grand Total (exc Vat)</td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6622046 style='height:17.25pt;border-top:none'><?php echo $total ?></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=178 style='width:134pt'></td>
  <td width=121 style='width:91pt'></td>
  <td width=110 style='width:83pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
 </tr>
 <![endif]>
</table>

</div>
<!--HIDDEN QUOTE FIELDS-->
<?php echo '
 <input type="Hidden" name="length" value="'.$length.'">
                        <input type="Hidden" name="width" value="'.$width.'">
                        <input type="Hidden" name="height" value="'.$height.'">
                        <input type="Hidden" name="style" value="'.$style.'">
                        <input type="Hidden" name="qty" value="'.$qty.'">
                         <input type="Hidden" name="deckle" value="'.$deckle.'">
                        <input type="Hidden" name="chop" value="'.$chop.'">
                        <input type="Hidden" name="chopCrease1" value="">
                        <input type="Hidden" name="chopCrease2" value="{{calcChopCrease2()}}">
                        <input type="Hidden" name="deckleCreaseL" value="{{calcDeckleLength()}}">
                         <input type="Hidden" name="deckleCreaseW" value="{{calcDeckleWidth()}}">
                        <input type="Hidden" name="glueFlap" value="'.$glueFlap .'">
                         <input type="Hidden" name="finish" value="'.$finish .'">
                        <input type="Hidden" name="grade" value="'. $grade.'">
                        <input type="Hidden" name="image" value="{{selectedStyle.image}}">
                        <input type="Hidden" name="cost" value="'.$cost .'">
                        <input type="Hidden" name="margin" value="'. $margin .'">
                         <input type="Hidden" name="category" value="'. $category.'">
                          <input type="Hidden" name="boardQty" value="'.$boardQty .'">
                          <input type="Hidden" name="config" value="'. $config.'">
                           <input type="Hidden" name="fluteWidth" value="'. $fluteWidth .'">
                            <input type="Hidden" name="breadth" value="'.$breadth .'">
                            <input type="Hidden" name="unitPrice" value="'.$unitPrice .'">
                            <input type="Hidden" name="unitLabour" value="'.$unitLabour .'">
                            <input type="Hidden" name="unitSqm" value="'.$unitSqm .'">
                            <input type="Hidden" name="unitMaterials" value="'.$unitMaterials.'">
                            <input type="Hidden" name="total" value="'.$total .'">
                            <input type="Hidden" name="materialsTotal" value="'. $materialsTotal.'">
                            <input type="Hidden" name="labourTotal" value="'. $labourTotal .'">
                            <input type="Hidden" name="totalSqm" value="'. $totalSqm.'">
                            <input type="Hidden" name="deliveryTotal" value="'.$deliveryTotal .'">
                             <input name="salesMan" value="{{selectedSalesman.name}}">';
  
                            ?>
                            <button type="submit" name="saveQuote"> Save</button>
</form>

<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<script src="/restricted/cartonApp.js"></script>
</body>

</html>

