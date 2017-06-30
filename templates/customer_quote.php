<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="customer3_files/filelist.xml">
<style id="Book1_2193_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl652193
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
.xl662193
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
.xl672193
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
.xl682193
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
-->

</style>
</head>
<body>
<div ng-controller="styleController as style" ng-app="quoteApp">
<div id="Book1_2193" align=center x:publishsource="Excel">

<div class="options-container" style="float: none; margin-left: auto;">
<div class="options">

<h3>Quote Select</h3>
<p><select style="width: 174px; height: 26px;" name="" ng-model="selectedQuote" ng-init="selectedCarton = cartons[0]" ng-options="x.ref for x in cartons" ><option>Quote Ref:</option></select></p>
</div>
</div>

<table border=0 cellpadding=0 cellspacing=0 width=590 style='border-collapse:
 collapse;table-layout:auto;width:700pt'>
 <col class=xl652193 width=133 style='mso-width-source:userset;mso-width-alt:
 4864;width:100pt'>
 <col class=xl652193 width=79 style='mso-width-source:userset;mso-width-alt:
 2889;width:59pt'>
 <col class=xl652193 width=70 style='mso-width-source:userset;mso-width-alt:
 2560;width:53pt'>
 <col class=xl652193 width=64 span=3 style='width:48pt'>
 <col class=xl652193 width=116 style='mso-width-source:userset;mso-width-alt:
 4242;width:87pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 width=133 style='height:15.0pt;width:100pt'>Date</td>
  <td colspan=5 class=xl662193 width=341 style='border-left:none;width:256pt'>Quotation</td>
  <td class=xl662193 width=116 style='border-left:none;width:87pt'>Quote Ref</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{selectedQuote.date}}</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{selectedQuote.ref}}</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 style='height:15.0pt;border-top:none'>Product
  Description</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Finish</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Size</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Material</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Quantity</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Unit Price</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Total Price</td>
 </tr>
 <tr ng-repeat="x in selectedQuote" height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{x.selectedQuote.style + ' ' + x.selectedQuote.category}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.finish}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.length + 'x' + x.selectedQuote.width + 'x' + x.selectedQuote.height}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.grade}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.qty}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.unitPrice}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{x.selectedQuote.total}}</td>
 </tr>
 <tr height=53 style='mso-height-source:userset;height:39.75pt'>
  <td colspan=7 height=53 class=xl682193 width=590 style='height:39.75pt;
  width:443pt'><span lang=EN-US>Please note: All prices are shown excluding
  VAT. Quantities are subject to +/- 10% tolerance on bespoke items. Quotation
  valid for 30 days from above date. Additional tooling charges may apply for
  die cut and printed products. Stock can be held for call off as required.</span></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=133 style='width:100pt'>5555555</td>
  <td width=79 style='width:59pt'>66666666</td>
  <td width=70 style='width:53pt'>89888888888</td>
  <td width=64 style='width:48pt'>77777777777</td>
  <td width=64 style='width:48pt'>99999999999999</td>
  <td width=64 style='width:48pt'>121212121</td>
  <td width=116 style='width:87pt'>2323232323</td>
 </tr>
 <![endif]>
</table>

</div>
</div>
<script src="/restricted/cartonApp.js"></script>

</body>
</html>
