<?php
include ('header.php')


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
?>

<div class="options-container" style="float: none; margin-left: auto;">
<div class="options">


<style>
td{
	text-align: right;
	border: 1px solid grey;
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
</style>
<?php echo '
<div id="jobSheet" style="padding-top: 10px">

    <table class="table">

        <tr style="padding: 5px">
        <tr>
        <td>Date:</td> <td style="text-align: left;">{{date | date:"dd-mm-yyyy"}}</td>
        <td>Ref:</td><td style="text-align: left;">'. $style .'</td>
        <td>Style:</td><td style="text-align: left;"></td>
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
        <p>D) Chop Slit = {{selectedCarton.deckle}}
        </div>
        <div id='setup'>
        <h3>Slitter Creaser</h3>
        <p>A) Glue Flap Crease = {{selectedCarton.glueFlap}} (+ 100mm)
        <p>B) Deckle Crease (L) = {{selectedCarton.deckleCreaseL}}
        <p>C) Deckle Crease (W) = {{selectedCarton.deckleCreaseW}}
        <p><strong>NB: IF 2 PANEL CARTON CONFIG, IGNORE BELOW!</strong></p>
        <p>D) Deckle Crease (L) = {{selectedCarton.deckleCreaseL}}
        <p>E) Deckle Chop (W) = {{selectedCarton.deckleCreaseW}} * if required
        <h3>Boss Check Measurements</h3>
        <p>1) {{((selectedCarton.glueFlap * 1) + 100)}}</p>
        <p>2) {{((selectedCarton.glueFlap * 1) + 100)+ (selectedCarton.deckleCreaseL *1)}}</p>
        <p>3) {{((selectedCarton.glueFlap * 1) + 100)+ (selectedCarton.deckleCreaseL *1) + selectedCarton.deckleCreaseW*1 }}</p>
        <p>4) {{((selectedCarton.glueFlap * 1) + 100)+ (selectedCarton.deckleCreaseL *1) + (selectedCarton.deckleCreaseW*1) + (selectedCarton.deckleCreaseL * 1) }}</p>
        <p>5) {{((selectedCarton.glueFlap * 1) + 100)+ (selectedCarton.deckleCreaseL *1) + (selectedCarton.deckleCreaseW*1) + (selectedCarton.deckleCreaseL * 1) + (selectedCarton.deckleCreaseW *1)}}</p>
        </div>
         <div id='setup'>
        <h3>Slotter</h3>
        <h4>Step 1</h4>
        <p>A)Glue Flap Slot: {{selectedCarton.chopCrease1}}</p>
        <p>B)4th Slot: {{selectedCarton.chopCrease1}}</p>
        <h4>Step 2</h4>
        <p>A) Slot 1 = {{selectedCarton.length}}
        <p>B) Slot 2 = {{selectedCarton.width}}
        <p>C) Slot 3 = {{selectedCarton.length}}
        <p>D) Slot 4 = {{selectedCarton.width}}
        <p><strong>NB: REPEAT FOR STEP FOR OPPOSTITE SIDE</strong>
        </div>
        <div id="setup">
        <h3>Step 4</h3>
        <p>Finish: {{selectedCarton.finish}}</p>
        </div>
        </div>';?>


<script src="scripts\myApp.js"></script>