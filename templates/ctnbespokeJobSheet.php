<?php

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
$breadth = 1;
//VARIABLE CALCULATIONS
$boss1 = ($glueFlap + 100);
$boss2 = $boss1 + $deckleCreaseL;
$boss3 = $boss2 + $deckleCreaseW;
$boss4 = $boss3 + $deckleCreaseL;
$boss5 = $boss4 + $deckleCreaseW;
$lengthF = $length + $flute;
$widthF = $width + $flute;

$internals = $length. 'x'. $width .'x'. $height;

//CREASES
$boss1 = 140;
$boss2 = $boss1 + $deckleCreaseW;
$boss3 = $boss2 + $deckleCreaseL;
$boss4 = $boss3 + $deckleCreaseW;
$boss5 = $boss4 + $deckleCreaseL - 7;

//TRAMS
$tram1 = $width * $breadth;
$tram2 = $tram1

?>


<div ng-controller="styleController as cartons" ng-app="quoteApp">

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
    width:  auto;
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
    
<br/><br/>
<h1>Job Sheet</h1>



<table>
<tr>
<td class="name">Carton Ref:</td>
<td class="data" colspan="4"><?php echo $style .' BESPOKE'?></td>
</tr>
 <tr>
<td class="name">Date:</td>
  <td class="data">{{ today | date: "dd-MM-y" }}</td>
  <td class="name" >Style:</td>
  <td class="data" ><?php echo $style ?></td>
  <td class="name" >Internal
  Dimms:</td>
  <td class="data"><?php echo $internals ?></td>
  <td class="name">Grade:</td>
  <td class="data"><?php echo $grade ?></td>
</tr>
<tr>
  <td class="name" style="border-bottom: ;">Config:</td>
  <td class="data" ng-model="selectedCarton.config" style="border-bottom: ;"><?php echo $config ?></td>
  <td class="name" style="border-bottom: ;">Sheet Size:</td>
  <td class="data" style="border-bottom: ;"><?php echo $deckle .'x'. $chop ?></td>
</tr>


</table>

<input type="hidden" ng-model="width=selectedCarton.width" >
         <input type="hidden" ng-model="length=selectedCarton.length">
         <input type="hidden" ng-model="height=selectedCarton.height">
         <input type="hidden" ng-model="flute=selectedCarton.fluteWidth">

        <img src="<?php echo $image ?>" style="width: 100%; height: 80%; padding-bottom: 15px; padding-top: 10px">

        
        <table width="330px" style="margin-bottom: 20px; margin-right: 5px">
       <tr>
       <th colspan="2" class="name">Slitter Creaser
        (Deckle Crease)</th></tr>
        <tr>
        <th class="name">Feed Direction</th>
        <td><img src="css/images/deckleDirection.png" style="width: 50%; height: 21.5%; float: left;"></td>
        </tr>
        <th class="name">A) Glue Flap Crease</th>
        <td class="data"> 140</td>
        </tr>
        <tr>
        <th class="name">B) Deckle Crease (L)</th>
        <td class="data"> <?php echo $deckleCreaseL ?></td>
        </tr>
        
        <tr ng-hide="<?php echo $config == '4 Panel'?>">
        <th class="name">C) Deckle Slit (W)</th>
        <td class="data"> <?php echo $deckleCreaseW ?>* if required</td>
        </tr>
               
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">C) Deckle Crease (W)</th>
        <td><?php echo $deckleCreaseW ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">D) Deckle Crease (L)</th>
        <td><?php echo $deckleCreaseL ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">E) Deckle Chop (W)</th>
        <td><?php echo $chop ?> * if required</td>
        </tr>
        <tr>
          <th class="name" colspan="2">Boss Check Measurements</th>
        </tr>
        <tr>
        <th class="name">Boss 1)</th>
        <td> <?php echo $boss1 ?></td>
        </tr>
        <tr>
        <th class="name">Boss 2)</th>
        <td> <?php echo $boss2 ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '2 Panel'?>">
        <th class="name">Boss 3)</th>
        <td> <?php echo $boss3 ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">Boss 3)</th>
        <td> <?php echo $boss3 ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">Boss 4)</th>
        <td><?php echo $boss4 ?></td>
        </tr>
        <tr ng-show="<?php echo $config == '4 Panel'?>">
        <th class="name">Boss 5)</th>
        <td> <?php echo $boss5 ?></td>
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
        <h3>Boss Check Measurements</h3>
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
        <td> <?php ?></td>
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
         <th colspan="2">Boss Check Measurements</th>
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
        <th colspan="2">Step 1</th>
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
        <th colspan="2">Step 2</th>
        </tr>
        <tr>
        <th>A) Slot 1</th>
        <td>{{chopSlotL()}}</td>
        </tr>
         <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>B) Slot 2</th>
        <td>{{chopSlotW()}}</td>
        </tr>
        <tr ng-show="selectedCarton.config == '4 Panel'">
        <th>C) Slot 3</th>
        <td>{{chopSlotL()}}</td>
        </tr>
        </table>

         <div id='setup' style="display: none">
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
       
          </div>

                </body>

</html>


<script src="/restricted/cartonApp.js"></script>
