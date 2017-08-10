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
<style type="text/css">
	@media print{
body *{
    visibility: hidden;
  }
  #customer_quote, #customer_quote *, #footer-sig, #quote_headder, #greeting {
    visibility: visible;
    align-content: center;
    zoom: 1.09;

  }
  #customer_quote{
    position: absolute;
    left: 0;
    top: 0;
    margin: 0 auto;  position: absolute;
  }
}
</style>
<div class="options-container" style="float: none; margin-left: auto;" >
<div class="options">
<form action="?action=customer_quote" method="post">
<h3>Quote Select</h3>
<p><select style="width: 174px; height: 26px;" name="quoteRefs" ng-model="selectedQuoteRef" ng-options="x.ref for x in quoteRefs" ></select>
<h3>Select Company</h3>
<p><select style="width: 174px; height: 26px;" name="company" ng-model="selectedCompany" ng-options="x.name for x in company" ng-init="selectedCompany = company[0]" ></select></p>

</form>
</div>
</div>
<div id="customer_quote_summary" >
<h2>Quotation</h2>
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
  <td colspan=5 class=xl662193 width=341 style='border-left:none;width:256pt'</td>
  <td class=xl662193 width=116 style='border-left:none;width:87pt'>Quote Ref</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{selectedQuoteRef.date}}</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{selectedQuoteRef.ref}}</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 style='height:15.0pt;border-top:none'>Customer Name</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{selectedQuoteRef.customerName}}</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Contact</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>{{selectedQuoteRef.customerContact}}</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none;  border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none;border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'></td>
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

 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{z.style + ' ' + z.category}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.finish}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.length + 'x' + z.width + 'x' + z.height}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.grade}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.qty}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.unitPrice}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{quoteTotal=z.total}}</td>
	</tr>

 <tr  height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 style='height:15.0pt;border-top:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'>{{quoteTotal}}</td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none'></td>
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
<br/>
<div id="footer-sig" style="visibility: hidden;text-align: left;"">
<p>I trust the above details are of interest & look forward to receiving your further instructions.</p>
<p>Kindest Regards</p>
<br/>
<p>{{selectedQuoteRef.salesMen}}</p>
</div>
</div>
<br/>



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

<form action="?action=ctn_action&saveQuote" method="post">
<div id="Quote Review_22046" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=590 style='border-collapse:
 collapse;table-layout:auto;width:700pt'>
 <col width=178 style='mso-width-source:userset;mso-width-alt:6509;width:134pt'>
 <col width=121 style='mso-width-source:userset;mso-width-alt:4425;width:91pt'>
 <col width=110 style='mso-width-source:userset;mso-width-alt:4022;width:83pt'>
 <col width=80 span=2 style='mso-width-source:userset;mso-width-alt:2925;
 width:60pt'>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=7 height=37 class=xl7322046 width=590 style='height:27.75pt;
  width:700pt; border: 1px solid black; background:#F2F2F2'>Quotation Details Review</td>
 </tr>
 
 <tr height=23 style='mso-height-source:userset;height:17.25pt' >
  <td height=23 class=xl6522046 style='height:17.25pt;'>Date</td>
  <td class=xl6522046 style='border-left:none'></td>
  <td class=xl6522046 style='border-left:none'>Customer Name</td>
  <td class=xl6522046 style='border-left:none'></td>
  <td class=xl6522046 style='border-left:none'>Customer Contact</td>
  <td class=xl6522046 style='border-left:none'></td>
  <td class=xl6522046 style='border-left:none'>Ref</td>
  
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6622046 style='height:17.25pt;border-top:none'>{{selectedQuoteRef.date}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'></td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{selectedQuoteRef.customerName}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'></td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{selectedQuoteRef.customerContact}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'></td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{selectedQuoteRef.ref}}</td>
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
 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6822046 style='height:17.25pt'>{{z.style}} {{z.category}}</td>
  <td class=xl6822046 style='border-left:none'>{{z.productRef}}</td></td>
  <td class=xl6822046 style='border-left:none'>{{z.length + 'x' + z.width + 'x' + z.height}}</td>
  <td class=xl6822046 style='border-left:none'>{{z.grade}}</td>
  <td class=xl6822046 style='border-left:none'>{{z.cost}}</td>
  <td class=xl6822046 style='border-left:none'>{{z.qty}}</td>
 
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
 <tr  height=23 style='mso-height-source:userset;height:17.25pt'>
 <td class=xl6522046>Product Ref</td>
  <td class=xl6522046>Materials</td>
  <td class=xl6522046 style='border-left:none'>Labour</td>
  <td class=xl6522046 style='border-left:none'>Margin</td>
  <td class=xl6522046 style='border-left:none'>Sqm</td>
  <td class=xl6522046 style='border-left:none'>Blank Size</td>
  <td class=xl6522046 style='border-left:none'>Total per unit</td>
  <td class=xl6722046></td>
 </tr>
 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=23 style='mso-height-source:userset;height:17.25pt'>
 <td class=xl6622046>{{z.productRef}}</td>
  <td class=xl6622046>{{z.unitMaterials}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.unitLabour}}</td>
   <td class=xl6622046 style='border-top:none;border-left:none'>{{z.margin}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.unitSqm}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.chop + 'x'+ z.deckle}}</td>
  <td height=23 class=xl6622046 style='height:17.25pt'>{{z.unitPrice}}</td>
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
 <td class=xl6522046>Product Ref</td>
  <td class=xl6522046>Materials</td>
  <td class=xl6522046 style='border-left:none'>Labour</td>
  <td class=xl6522046 style='border-left:none'>Sqm</td>
  <td class=xl6522046 style='border-left:none'>Delivery</td>
  <td class=xl6722046></td>
 </tr>
 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=23 style='mso-height-source:userset;height:17.25pt'>
 <td class=xl6622046 >{{z.productRef}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.materialsTotal}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.labourTotal}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.totalSqm}}</td>
  <td class=xl6622046 style='border-top:none;border-left:none'>{{z.deliveryTotal}}</td>
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
  <td height=23 class=xl7022046 style='height:17.25pt' colspan="2">Grand Total (exc Vat)</td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
  <td class=xl6722046></td>
 </tr>
 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6622046 style='height:17.25pt;border-top:none'>{{z.productRef}}</td>
  <td class=xl6622046>{{z.total}}</td>
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
</div>

<div id="customer_quote" style="visibility: hidden;" >
<div id="quote_headder" >
<img style="float: left;"">

<div id="company_address"  style="text-align: right; width: 100%" ng-model=selectedCompany>
<img src="{{selectedCompany.logo}}" style="float: left">

<p>{{selectedCompany.name}}</p>
<p>{{selectedCompany.address}}</p>
<p>{{selectedCompany.contact}}</p>
<p>{{selectedCompany.email}}</p>
<p ></p>
</div>

<div id="greeting" style="text-align: left;">
	<p><label>Dear: {{selectedQuoteRef.customerName}}</label></p>
	<p>Thank you for the recent opportunity to quote for your packaging requirements.
		We are pleased to quote the following:
	</p>
</div>
</div>
<h2>Quotation</h2>
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
  <td colspan=5 class=xl662193 width=341 style='border-left:none;width:256pt'</td>
  <td class=xl662193 width=116 style='border-left:none;width:87pt'>Quote Ref</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{selectedQuoteRef.date}}</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{selectedQuoteRef.ref}}</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 style='height:15.0pt;border-top:none'>Customer Name</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{selectedQuoteRef.customerName}}</td>
  <td class=xl662193 style='border-top:none;border-left:none'>Contact</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>{{selectedQuoteRef.customerContact}}</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none;  border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'></td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none; border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none;border-right: none;'>&nbsp;</td>
  <td class=xl672193 style='border-top:none;border-left:none'></td>
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

 <tr ng-hide="selectedQuoteRef == null" ng-repeat="z in quotes | filter: {'ref':selectedQuoteRef.ref}" height=20 style='height:15.0pt'>
  <td height=20 class=xl672193 style='height:15.0pt;border-top:none'>{{z.style + ' ' + z.category}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.finish}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.length + 'x' + z.width + 'x' + z.height}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.grade}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.qty}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{z.unitPrice}}</td>
  <td class=xl672193 style='border-top:none;border-left:none'>{{quoteTotal=z.total}}</td>
	</tr>

 <tr  height=20 style='height:15.0pt'>
  <td height=20 class=xl662193 style='height:15.0pt;border-top:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'>{{quoteTotal}}</td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none;border-right:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none'></td>
  <td class=xl662193 style='border-top:none;border-left:none'>Total</td>
  <td class=xl662193 style='border-top:none;border-left:none'>{{calcQuoteTotal()}}</td>
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
<br/>
<div id="footer-sig" style="visibility: hidden;text-align: left;"">
<p>I trust the above details are of interest & look forward to receiving your further instructions.</p>
<p>Kindest Regards</p>
<br/>
<p>{{selectedQuoteRef.salesMen}}</p>
</div>
</div>


</div>

<script src="/restricted/cartonApp.js"></script>

</body>
</html>
