<div ng-controller="styleController as cartons" ng-app="quoteApp">
<div class="options-container" style="float: none; margin-left: auto; padding: 5px; ">
<div class="options">

<h3>Carton Select</h3>
<p>Carton: <select style="float: right; width: 174px; height: 26px;" name="" ng-model="selectedCarton" ng-init="selectedCarton = cartons[0]" ng-options="x.ref for x in cartons"></select></p>
</div>
</div>
<div id="jobSheetContainer" style="margin: 0 auto;">


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
table{
  float: left;
}
table, th, td{
border: 1px solid black;
white-space: nowrap;
padding: 5px;
 font-size: large;
border-collapse: collapse;
}

.name{
  
    background-color:#F2F2F2;
    font-weight: bold;
}
.data{
   white-space: nowrap; 
}
th {
   background-color:#F2F2F2;
    font-weight: bold;
}
</style>
<br />
<body>
<div id="jobSheet" style="padding-top: 10px" ng-hide="selectedCarton==null">

     
<br/><br/>
<h1>Job Sheet</h1>



<table>
<tr>
<td class="name">Carton Ref:</td>
<td class="data" colspan="4">{{selectedCarton.ref}}</td>
<td class="delete" style="text-align: center"><a href="?action=action&deleteCarton&id={{selectedCarton.id}}">Delete</a></td>
</tr>
 <tr>
<td class="name">Date:</td>
  <td class="data">{{ today | date: "dd-MM-y" }}</td>
  <td class="name" >Style:</td>
  <td class="data" >{{selectedCarton.style}}</td>
  <td class="name" >Internal
  Dimms:</td>
  <td class="data">{{selectedCarton.length + 'x' + selectedCarton.width + 'x' + selectedCarton.height}}</td>
  <td class="name">Grade:</td>
  <td class="data">{{selectedCarton.grade}}</td>
</tr>
<tr>
  <td class="name" style="border-bottom: ;">Config:</td>
  <td class="data" style="border-bottom: ;">{{selectedCarton.config}}</td>
  <td class="name" style="border-bottom: ;">Sheet Size:</td>
  <td class="data" style="border-bottom: ;">{{selectedCarton.deckle + ' x ' + selectedCarton.chop}}</td>
  <td class="name" style="border-bottom: ;">Finish</td>
  <td class="data" style="border-bottom: ;">{{selectedCarton.finish}}</td>
</tr>

<tr>
  <td class="name">Sheetboard Spec Details:</td>
  <td class="data" colspan="7" style="">{{selectedCarton.deckle + ' x ' + selectedCarton.chop + 'MM '+ calcTram1() + '/' + calcTram2() + '/' + calcTram1() + ' ' + selectedCarton.grade + ' REF:'+ selectedCarton.ref +'BOARD'+ selectedCarton.color.charAt(0)}}</td>
</tr>
</table>

<input type="hidden" ng-model="width=selectedCarton.width" >
         <input type="hidden" ng-model="length=selectedCarton.length">
         <input type="hidden" ng-model="height=selectedCarton.height">
         <input type="hidden" ng-model="flute=selectedCarton.fluteWidth">

        <img src="{{selectedCarton.image}}" style="width: 100%; height: 80%; padding-bottom: 15px; padding-top: 10px">

        
        <table width="330px" style="margin-bottom: 20px; margin-right: 5px">
       <tr>
       <th colspan="2" class="name">Slitter Creaser
        (Deckle Crease)</th></tr>
        <tr>
        <th class="name">Feed Direction</th>
        <td><img src="css/images/deckleDirection.png" style="width: 50%; height: 21.5%; float: left;"></td>
        </tr>
        <th class="name">A) Glue Flap Crease</th>
        <td class="data"> {{(selectedCarton.glueFlap * 1) + machineTrim }}</td>
        </tr>
        <tr>
        <th class="name">B) Deckle Crease (L)</th>
        <td class="data"> {{calcJsDeckleWidth()}}</td>
        </tr>
        
        <tr ng-hide="selectedCarton.config == '4 Panel'">
        <th class="name">C) Deckle Slit (W)</th>
        <td class="data"> {{calcJsDeckleLength() - panelTrim}}* if required</td>
        </tr>
               
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">C) Deckle Crease (W)</th>
        <td>{{calcJsDeckleLength()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">D) Deckle Crease (L)</th>
        <td>{{calcJsDeckleWidth()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">E) Deckle Chop (W)</th>
        <td>{{calcJsDeckleLength()-panelTrim}} * if required</td>
        </tr>
        <tr>
          <th class="name" colspan="2" style="background-color: white">Boss Check Measurements</th>
        </tr>
        <tr>
        <th class="name">Boss 1)</th>
        <td> {{((selectedCarton.glueFlap * 1) + machineTrim )}}</td>
        </tr>
        <tr>
        <th class="name">Boss 2)</th>
        <td> {{((selectedCarton.glueFlap * 1) )+ (calcJsDeckleWidth() *1) + machineTrim }}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '2 Panel'">
        <th class="name">Boss 3)</th>
        <td> {{machineTrim + (((selectedCarton.glueFlap * 1) )+ (calcJsDeckleWidth() *1) + calcJsDeckleLength()*1)- panelTrim}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">Boss 3)</th>
        <td> {{machineTrim +(((selectedCarton.glueFlap * 1) )+ (calcJsDeckleWidth() *1) + calcJsDeckleLength()*1)}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">Boss 4)</th>
        <td>{{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleWidth() *1) + (calcJsDeckleLength()*1) + (calcJsDeckleWidth() * 1) }}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th class="name">Boss 5)</th>
        <td> {{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleWidth() *1) + (calcJsDeckleLength()*1) + (calcJsDeckleWidth() * 1) + (calcJsDeckleLength() *1)-panelTrim}}</td>
        </tr>
         
        </table>
       
<div id='setup' style="display: none">

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
        <h3 style="background-color: white">Boss Check Measurements</h3>
        <p>1) {{((selectedCarton.glueFlap * 1) + machineTrim )}}</p>
        <p>2) {{((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + machineTrim }}</p>
        <div ng-show="selectedCarton.config == '2 Panel'">
        <p>3) {{machineTrim + (((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + calcJsDeckleWidth()*1)- panelTrim}}</p>
        </div>
        <div ng-show="selectedCarton.config == '4 Panel'">
        <p>3) {{machineTrim +(((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + calcJsDeckleWidth()*1)}}</p>
        <p>4) {{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + (calcJsDeckleWidth()*1) + (calcJsDeckleLength() * 1) }}</p>
        <p>5) {{machineTrim + ((selectedCarton.glueFlap * 1) )+ (calcJsDeckleLength() *1) + (calcJsDeckleWidth()*1) + (calcJsDeckleLength() * 1) + (calcJsDeckleWidth() *1)-panelTrim}}</p>
        </div>
        </div>

        <table width="330px" style="margin-right: 5px">
       <tr>
       <th colspan="2" class="name">Slitter Creaser
        (Tram Crease)</th>
        </tr>
        <tr>
        <th>Feed Direction</th>
        <td><img src="css/images/chopDirection.png" style="width: 60%; height: 15%; float: left;"></td>
        </tr>
         <tr>    
        <th>A)</th>
        <td>Chop Slit as required</td>
        </tr>
        <tr>
        <th>B) Tram Crease 1 </th>
        <td> {{calcTram1() + machineTrim}}</td>
        </tr>
        <tr>
        <th>C) Tram Crease 2</th>
        <td>{{calcTram2()}}</td>
        </tr>
        <tr>
        <th>D) Chop Slit</th>
        <td>{{calcTram1()}}</td>
        </tr>
        <tr>
         <th colspan="2" style="background-color: white">Boss Check Measurements</th>
         </tr>
         <tr>
         <th>Boss 1)</th>
         <td>{{((calcTram1() *1))+ machineTrim}}</td>
         </tr>
         <tr>
         <th>Boss 2)</th>
         <td>{{((calcTram1() *1))+(calcTram2()*1)+ machineTrim}}</td>
         </tr>
         <tr>
         <th>Boss 3)</th>
         <td> {{((calcTram1() *1))+(calcTram2()*1)+(calcTram1() *1)+ machineTrim}}</td>
         </tr>
        </table>
      
        	<div id='setup' style="display: none">
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
        <table style="width: 280px" style="margin-right: 5px">
        <tr>
          <th colspan="2">Slotter</th>
          </tr>
          <tr>
        <th colspan="2" style="background-color: white">Step 1</th>
        </tr>
        <tr>
        <th>A) Glue Flap Slot Depth:</th>
        <td>{{calcTram1()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config =='4 Panel'">
         <th> B) 4th Slot Depth:</th>
         <td>{{calcTram1()}}</td>
         </tr>
         <tr ng-hide="selectedCarton.config =='4 Panel'">
         <th>B) 2nd Slot Depth:</th>
         <td>{{calcTram1()}}</td>
         </tr>
         <tr>
        <th colspan="2" style="background-color: white">Step 2</th>
        </tr>
        <tr>
        <th>A) Slot 1</th>
        <td>{{chopSlotW()}}</td>
        </tr>
         <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>B) Slot 2</th>
        <td>{{chopSlotL()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>C) Slot 3</th>
        <td>{{chopSlotW()}}</td>
        </tr>
        <tr>
        <th colspan="2" style="background-color: white">Slot Check</th>
        <tr>
        <th>A) Slot 1</th>
        <td>{{chopSlotW()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>B) Slot 2</th>
        <td>{{chopSlotW() + chopSlotL()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>C) Slot 3</th>
        <td>{{chopSlotW() + chopSlotL() + chopSlotW()}}</td>
        </tr>

        </table>
       
        </div>
      
                </body>
                </p>
                </p>
                </div>
                </p>
                </div>
                </tr>
                </table>

</html>


<script src="/restricted/cartonApp.js"></script>

