<div id="jobSheetContainer" style="width: 90%; margin: 0 auto;">
<div ng-controller="styleController as cartons" ng-app="quoteApp">

<div class="options-container" style="float: none; margin-left: auto; padding: 5px">
<div class="options">

<h3>Carton Select</h3>
<p>Carton: <select style="float: right; width: 174px; height: 26px;" name="" ng-model="selectedCarton" ng-init="selectedCarton = cartons[0]" ng-options="x.ref for x in cartons" ></select></p>
</div>
</div>
<style>
@media print{
body * {
    visibility: hidden;
  }
  #jobSheetContainer, #jobSheetContainer * {
    visibility: visible;
  }
  #jobSheet{
    position: absolute;
    left: 0;
    top: 0;
  }

}
.options-container{
        width: 280px;
        background-color: #D8D8D8;
        float: left;
        border: 1px solid #777;
        
         margin: 0 auto;

    }
td{
	text-align: right;
	border: 1px solid grey;
    font-size: 20px;
}
#setup{
	width: 	auto;
	float: left;
	margin-left: 10px;
	border: 1px solid grey;
	border-radius: 10px;
	padding:5px;
	padding-right: 10px;
	padding-left: 10px;
}
p{
    font-size: 18px
}

.hide{
display: none;
}
span
{
display: 
}
</style>
<br />
<div id="jobSheet" style="padding-top: 10px" ng-hide="selectedCarton==null">

             
        <head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 12">
<link rel=File-List href="jobsheet_files/filelist.xml">
<style id="Book1_12069_Styles">
<!--table
  {mso-displayed-decimal-separator:"\.";
  mso-displayed-thousand-separator:"\,";}
.xl1512069
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
.xl6412069
  {padding-top:1px;
  padding-right:1px;
  padding-left:1px;
  mso-ignore:padding;
  color:windowtext;
  font-size:13.0pt;
  font-weight:400;
  font-style:normal;
  text-decoration:none;
  font-family:Arial;
  mso-generic-font-family:auto;
  mso-font-charset:0;
  mso-number-format:General;
  text-align:general;
  vertical-align:bottom;
  mso-background-source:auto;
  mso-pattern:none;
  white-space:nowrap;}
.xl6512069
  {padding-top:1px;
  padding-right:1px;
  padding-left:1px;
  mso-ignore:padding;
  color:windowtext;
  font-size:13.0pt;
  font-weight:400;
  font-style:normal;
  text-decoration:none;
  font-family:Arial, sans-serif;
  mso-font-charset:0;
  mso-number-format:General;
  text-align:right;
  vertical-align:middle;
  border:.5pt solid windowtext;
  background:#F2F2F2;
  mso-pattern:black none;
  white-space:nowrap;
  width: auto;}
.xl6612069
  {padding-top:1px;
  padding-right:1px;
  padding-left:1px;
  mso-ignore:padding;
  color:windowtext;
  font-size:13.0pt;
  font-weight:400;
  font-style:normal;
  text-decoration:none;
  font-family:Arial;
  mso-generic-font-family:auto;
  mso-font-charset:0;
  mso-number-format:General;
  text-align:center;
  vertical-align:middle;
  border:.5pt solid windowtext;
  mso-background-source:auto;
  mso-pattern:auto;
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
<!---->
<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<!---->

<br/><br/>
<h1>Job Sheet</h1>
<div id="Book1_12069" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=900 style='border-collapse:
 collapse;table-layout:fixed;width:800pt'>
 <col width=61 style='mso-width-source:userset;mso-width-alt:2230;width:46pt'>
 <col width=99 style='mso-width-source:userset;mso-width-alt:3620;width:74pt'>
 <col width=83 style='mso-width-source:userset;mso-width-alt:3035;width:62pt'>
 <col width=99 style='mso-width-source:userset;mso-width-alt:3620;width:74pt'>
 <col width=64 style='width:48pt'>
 <col width=99 span=3 style='mso-width-source:userset;mso-width-alt:3620;
 width:74pt'>
 <col width=64 style='width:48pt'>
 <col width=99 style='mso-width-source:userset;mso-width-alt:3620;width:74pt'>
 <tr height=20 style='height:25.0pt'>
  <td height=20 class=xl6512069 width=61 style='height:25.0pt;width:46pt'>Date:</td>
  <td class=xl6612069 width=99 style='border-left:none;width:74pt'>{{ today | date: "dd-MM-y" }}</td>
  <td class=xl6512069 width=78 style='border-left:none;width:62pt'>Ref:</td>
  <td class=xl6612069 width=98 style='border-left:none;width:74pt'>{{selectedCarton.ref}}</td>
  <td class=xl6512069 width=63 style='border-left:none;width:48pt'>Style:</td>
  <td class=xl6612069 width=98 style='border-left:none;width:74pt'>{{selectedCarton.style}}</td>
  <td class=xl6512069 width=105 style='border-left:none;width:74pt'>Internal
  Dimms:</td>
  <td class=xl6612069 width=99 style='border-left:none;width:74pt'>{{selectedCarton.length + 'x' + selectedCarton.width + 'x' + selectedCarton.height}}</td>
  <td class=xl6512069 width=64 style='border-left:none;width:48pt'>Grade:</td>
  <td class=xl6612069 width=99 style='border-left:none;width:74pt'>{{selectedCarton.grade}}</td>
 </tr>
 <tr height=20 style='height:25.0pt'>
  <td height=20 class=xl6512069 style='height:15.0pt;border-top:none'>Config:</td>
  <td class=xl6612069 style='border-top:none;border-left:none'>{{selectedCarton.config}}</td>
  <td class=xl6512069 style='border-top:none;border-left:none'>Blank Size:</td>
  <td class=xl6612069 style='border-top:none;border-left:none'>{{selectedCarton.deckle + ' x ' + selectedCarton.chop}}</td>
   
 </tr>
 <tr height=20 style='height:25.0pt'>
  <td class=xl6512069 colspan="2.5" style='border-top:none;'>Sheetboard Spec Details: </td>  
  <td class=xl6612069 colspan="7" style="border-top:none;border-left:none; text-align: left; padding-left: 5px;">{{selectedCarton.deckle + ' x ' + selectedCarton.chop + 'MM '+ calcTram1() + '/' + calcTram2() + '/' + calcTram1() + ' ' + selectedCarton.grade + ' REF:'+ selectedCarton.ref +'BOARD'+ selectedCarton.color.charAt(0)}}</td>
 
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=61 style='width:46pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=83 style='width:62pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=99 style='width:74pt'></td>
 </tr>
 <![endif]>
</table>
<input type="hidden" ng-model="width=selectedCarton.width">
         <input type="hidden" ng-model="length=selectedCarton.length">
         <input type="hidden" ng-model="height=selectedCarton.height">
         <input type="hidden" ng-model="flute=selectedCarton.fluteWidth">
</div>
        <img src="{{selectedCarton.image}}" style="width: 100%; height: 80%">
<div id='setup'>

        <h3>Slitter Creaser</h3>
        <div><img src="css/images/deckleDirection.png" style="width: 20%; height: 20%; float: right;"></div>
        <p>(Deckle Crease)</p>
        
        <p>A) Glue Flap Crease = {{(selectedCarton.glueFlap * 1) + machineTrim }} </p>
        <p>B) Deckle Crease (L) = {{calcJsDeckleLength()}}</p>
        <div ng-hide="selectedCarton.config == '4 Panel'">
        <p>C) Deckle Slit (W) = {{calcJsDeckleWidth()}}</p>  </div>
        <div ng-show="selectedCarton.config == '4 Panel'">
        <p>C) Deckle Crease (W) = {{calcJsDeckleWidth()}}</p>        
        <p>D) Deckle Crease (L) = {{calcJsDeckleLength()}}</p>
        <p>E) Deckle Chop (W) = {{calcJsDeckleWidth()}} * if required</p>
        </div>
        <h3>Boss Check Measurements</h3>
        <p>1) {{((selectedCarton.glueFlap * 1) + machineTrim )}}</p>
        <p>2) {{((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + machineTrim }}</p>
        <div ng-show="selectedCarton.config == '2 Panel'">
        <p>3) {{machineTrim + (((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + calcJsDeckleWidth()*1)- panelTrim}}</p>
        </div>
        <div ng-show="selectedCarton.config == '4 Panel'">
        <p>3) {{(((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + calcJsDeckleWidth()*1)}}</p>
        <p>4) {{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + (calcJsDeckleWidth()*1) + (calcJsDeckleLength() * 1) }}</p>
        <p>5) {{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + (calcJsDeckleWidth()*1) + (calcJsDeckleLength() * 1) + (calcJsDeckleWidth() *1)-panelTrim}}</p>
        </div>
        </div>
        
        	<div id='setup'>
        <h3>Slitter Creaser</h3>
        <div><img src="css/images/chopDirection.png" style="width: 20%; height: 20%; float: right;"></div>
        <p>(Tram Crease)</p>
        
        <p>A) Chop Slit as required</p>
        <p>B) Tram Crease 1 = {{calcTram1() + machineTrim}}
        <p>C) Tram Crease 2 = {{calcTram2() + machineTrim}}
        <p>D) Chop Slit = {{calcTram1() + machineTrim}}
         <h3>Boss Check Measurements</h3>
         <p>1) {{((calcTram1() *1))+ machineTrim}}</p>
         <p>2) {{((calcTram1() *1))+(calcTram2()*1)+ machineTrim}}</p>
         <p>3) {{((calcTram1() *1))+(calcTram2()*1)+(calcTram1() *1)+ machineTrim}}</p>
        </div>
        
         <div id='setup'>
        <h3>Slotter</h3>
        <h4>Step 1</h4>
        <p>A) Glue Flap Slot: {{calcTram1()}}</p>
         <p ng-show="selectedCarton.config =='4 Panel'">B) 4th Slot: {{calcTram1()}}</p>
         <p ng-hide="selectedCarton.config =='4 Panel'">B) 2nd Slot: {{calcTram1()}}</p>
        <h4>Step 2</h4>
        <p>A) Slot 1 = {{chopSlotL()}}
         <div ng-show="selectedCarton.config == '4 Panel'">
        <p>B) Slot 2 = {{chopSlotW()}}
        <p>C) Slot 3 = {{chopSlotL()}}
       
        </div>
        </div>
        <div id="setup">
        <h3>Step 4</h3>
        <p>Finish: {{selectedCarton.finish}}</p>
        </div>
        </div>

        <html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">




</body>

</html>


<script src="/restricted/cartonApp.js"></script>

