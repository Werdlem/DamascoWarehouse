<?php
//$slot1 = '{{selectedCarton.length}}'+ 3;
?>
</div>
<div id="jobSheetContainer" style="width: 90%; margin: 0 auto;">
<div ng-controller="styleController as cartons" ng-app="quoteApp">

<div class="options-container" style="float: none; margin-left: auto;">
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
</style>
<div id="jobSheet" style="padding-top: 10px">

    <table class="table">

        <tr style="padding: 5px">
        <tr>
        <td>Date:</td> <td style="text-align: left;">{{date | date:'dd-mm-yyyy'}}</td>
        <td>Ref:</td><td style="text-align: left;">{{selectedCarton.ref}}</td>
        <td>Style:</td><td style="text-align: left;">{{selectedCarton.style}}</td>
        <td>Internal Dimms:</td><td style="text-align: left;">{{selectedCarton.length + "x" + selectedCarton.width + "x" + selectedCarton.height}}</td>
        <td>Grade:</td><td style="text-align: left;">{{selectedCarton.grade}}</td>
        </tr>
        <tr>
        <td>Config</td><td style="text-align: left;">{{selectedCarton.config}}</td>
         <td>Blank Size:</td><td style="text-align: left;">{{selectedCarton.deckle + ' x ' + selectedCarton.chop}}</td>
        </table>
        <img src="{{selectedCarton.image}}" style="width: 100%; height: 80%">
        	<div id='setup'>
        <h3>Slitter Creaser</h3>
        <p>A) Chop Slit as required</p>
        <p>B) Tram Crease 1 = {{selectedCarton.chopCrease1}}
        <p>C) Tram Crease 2 = {{selectedCarton.chopCrease2}}
        <p>D) Chop Slit = {{selectedCarton.chopCrease1}}
         <h3>Boss Check Measurements</h3>
         <p>1) {{((selectedCarton.chopCrease1 *1))}}</p>
         <p>2) {{((selectedCarton.chopCrease1 *1))+(selectedCarton.chopCrease2*1)}}</p>
         <p>3) {{((selectedCarton.chopCrease1 *1))+(selectedCarton.chopCrease2*1)+(selectedCarton.chopCrease1 *1)}}</p>
        </div>
        <div id='setup'>
        <h3>Slitter Creaser</h3>
        <p>A) Glue Flap Crease = {{selectedCarton.glueFlap}} 
        <p>B) Deckle Crease (L) = {{selectedCarton.deckleCreaseL}}
        <p>C) Deckle Crease (W) = {{selectedCarton.deckleCreaseW}}
        <p><strong>NB: IF 2 PANEL CARTON CONFIG, IGNORE BELOW!</strong></p>
        <p>D) Deckle Crease (L) = {{selectedCarton.deckleCreaseL}}
        <p>E) Deckle Chop (W) = {{selectedCarton.deckleCreaseW}} * if required
        <h3>Boss Check Measurements</h3>
        <p>1) {{((selectedCarton.glueFlap * 1) )}}</p>
        <p>2) {{((selectedCarton.glueFlap * 1) )+ (selectedCarton.deckleCreaseL *1)}}</p>
        <p>3) {{((selectedCarton.glueFlap * 1) )+ (selectedCarton.deckleCreaseL *1) + selectedCarton.deckleCreaseW*1 }}</p>
        <p>4) {{((selectedCarton.glueFlap * 1) )+ (selectedCarton.deckleCreaseL *1) + (selectedCarton.deckleCreaseW*1) + (selectedCarton.deckleCreaseL * 1) }}</p>
        <p>5) {{((selectedCarton.glueFlap * 1) )+ (selectedCarton.deckleCreaseL *1) + (selectedCarton.deckleCreaseW*1) + (selectedCarton.deckleCreaseL * 1) + (selectedCarton.deckleCreaseW *1)}}</p>
        </div>
         <div id='setup'>
        <h3>Slotter</h3>
        <h4>Step 1</h4>
        <p>A) Glue Flap Slot: {{selectedCarton.chopCrease1}}</p>
        <p>B) 4th Slot: {{selectedCarton.chopCrease1}}</p>
        <h4>Step 2</h4>
        <p>A) Slot 1 = {{chopSlotL()}}
        <p>B) Slot 2 = {{chopSlotW()}}
        <p>C) Slot 3 = {{chopSlotL()}}
        <p>D) Slot 4 = {{chopSlotW()}}
        
        </div>
        <div id="setup">
        <h3>Step 4</h3>
        <p>Finish: {{selectedCarton.finish}}</p>
        </div>
        </div>

<script src="/restricted/cartonApp.js"></script>

