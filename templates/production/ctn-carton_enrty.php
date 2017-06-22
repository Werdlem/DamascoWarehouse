<style>

.visible{
    border: 1px solid #99ccff;
}
.invisible{
    display: none;
}

#material{
    width: auto;
    float: left;
    padding: 10px;
    border: 1px solid black;
    border-radius: 10px;
    margin-left: 5px;
}
h3{
    text-decoration: underline;
}
input{
    float: right;
}
</style>
<?php
include ('header.php')
?>
<div class="container">
<div class="options-container">
<div class="options">

<h3>Carton Select</h3>
<p>Style: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedStyle" ng-options="x.style for x in styles"></select></p>
<p>Flute: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedFlute" ng-options="x.flute for x in flutes" ng-init="selectedFlute = flutes[0]" ></select></p>
<p>Grade: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedGrade" ng-options="x.grade for x in grades" ng-init="selectedGrade = type[0]" ></select></p>
<p>Liner: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedLiner" ng-options="x.liner for x in liners" ng-init="selectedLiner = liner[0]" ></select></p>

<h3>Carton Dimms</h3>
<p>Length: <input type="text" ng-model="length"></p>
<p>Width: <input type="text" ng-model="width"></p>
<p>Height: <input type="text" ng-model="height"></p>
<p>Finish: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedFinish" ng-options="x.finish for x in finish" ng-init="selectedFinish = finish[0]" ></select></p>
<p>Category: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedCategory" ng-options="x.category for x in category" ng-init="selectedCategory = category[0]" ></select></p>
<p>Qty: <input type="text" name="qty" ng-model="qty"></p>

<h3>Costing</h3>
<p>£ per SqM: <input type="text" ng-model="cost"></p>
 <p>Labour: <input ng-if="calcTime() !== null" disabled value="{{calcTime() | number:1}} Hours"></p>
<p>Margin: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedMargin" ng-options="x.margin for x in margin" ng-init="selectMargin = margin[0]" ></select></p>
<p>Delivery: <input type="text" ng-model="miles"></p>
</div>
</div>


<form method="POST" action="?action=addJob">
 
<div class="results">
<h3>Style</h3>
<p><img ng-if="selectedStyle.image !==null" ng-src="{{selectedStyle.image}}"></p>
<p><img ng-src="{{selectedFlute.image}}"></p>
<div id="material">
<h3>Material Specs</h3>
<p><span ng-if="cartonGrade() !==null"><strong>Board Grade:</strong> {{cartonGrade()}}</span></p>
<p><span ng-if="sheetBoardSize() !==null"><strong>Blank Size:</strong> {{boardDeckle()}} x {{boardChop()}}</span></p>
<p><span ng-if="boardDeckle() !==null"><strong>Width:</strong> {{boardDeckle()}}</span></p>
<p><span ng-if="boardChop() !==null"><strong>Length:</strong> {{boardChop()}}</span></p>
</div>
<div id="material">
<h3>Production Specs</h3>

<p><span ng-if="calcChopCrease1() !==null"><strong>Chop Crease 1:</strong> {{calcChopCrease1()}}</span></p>
<p><span ng-if="calcChopCrease1() !==null"><strong>Chop Crease 2:</strong> {{calcChopCrease2()}}</span></p>
<p><span ng-if="glueFlap() !==null"><strong>Deckle Glue Flap:</strong> {{glueFlap()}}</span></p>
<p><span ng-if="calcDeckleLength() !==null"><strong>Deckle Crease Length (L):</strong> {{calcDeckleLength()}}</span></p>
<p><span ng-if="calcDeckleWidth() !==null"><strong>Deckle Crease Breadth (B):</strong> {{calcDeckleWidth()}}</span></p>
<p><span ng-if="calQtyReq() !==null"><strong>Qty of Sheets:</strong> {{calQtyReq()}}</span></p>
<p><span ng-if="setupConfig() !==null"><strong>Setup Configuration:</strong> {{setupConfig()}}</span></p>
</div>
<div id="material">
<h3>Costing Specs</h3>
<p><span ng-if="calcSqMperBox() !==null"><strong> Square M per box: </strong> {{calcSqMperBox() | number:3}}</span></p>
<p><span ng-if="calcSqMperBoxQty() !== null"><strong>Total Square M: </strong> {{calcSqMperBoxQty() | number : 3}}</span></p>
<p><span ng-if="calcBoardCost() !== null"><strong>Materials Cost: </strong> {{calcBoardCost() | currency: '£'}}</span></p>
<p><span ng-if="calcLabour() !==null"><strong>Labour:</strong> {{calcLabour() | currency: '£' }}</span></p>
<p><span ng-if="calculateCost() !==null"><strong>Cost:</strong> {{calculateCost() | currency: '£' }}</span></p>
<p><span ng-if="calcDelivery() !==null"><strong>Delivery:</strong> {{calcDelivery() | currency: '£' }}</span></p>
<p><span ng-if="calculateMargin() !==null"><strong>Margin:</strong> {{calculateMargin() | currency: '£'}}</span></p>
<p><span ng-if="calculateMargin() !==null"><strong>Margin per box:</strong> {{calculateMargin() /(qty) | currency: '£'}}</span></p>
<p><span ng-if="calculateTotal() !==null"><strong>Total:</strong> {{calculateTotal() | currency: '£' }}</span></p>
</div>

<form method="POST" action="addJob.php">
<p><button type="submit"> Add job</button>
</p>

</div>
</div>
<br/><br/>
<!--Hidden fields for page Posting-->
                        <input type="Hidden" name="length" value="{{length}}">
                        <input type="Hidden" name="width" value="{{width}}">
                        <input type="Hidden" name="height" value="{{height}}">
                        <input type="Hidden" name="style" value="{{selectedStyle.style}}">
                        <input type="Hidden" name="qty" value="{{qty}}">
                         <input type="Hidden" name="deckle" value="{{boardDeckle()}}">
                        <input type="Hidden" name="chop" value="{{boardChop()}}">
                        <input type="Hidden" name="chopCrease1" value="{{calcChopCrease1()}}">
                        <input type="Hidden" name="chopCrease2" value="{{calcChopCrease2()}}">
                        <input type="Hidden" name="deckleCreaseL" value="{{calcDeckleLength()}}">
                         <input type="Hidden" name="deckleCreaseW" value="{{calcDeckleWidth()}}">
                        <input type="Hidden" name="glueFlap" value="{{selectedCategory.glueFlap}}">
                         <input type="Hidden" name="finish" value="{{selectedFinish.finish}}">
                        <input type="Hidden" name="grade" value="{{cartonGrade()}}">
                        <input type="Hidden" name="image" value="{{selectedStyle.image}}">
                        <input type="Hidden" name="cost" value="{{cost | currency: '£'}}">
                        <input type="Hidden" name="margin" value="{{selectedMargin.margin}}">
                         <input type="Hidden" name="category" value="{{selectedCategory.category}}">
                          <input type="Hidden" name="boardQty" value="{{calQtyReq()}}">
                          <input type="Hidden" name="config" value="{{setupConfig()}}">
                         
                          </form>

    <!--end-->
<script src="scripts\myApp.js"></script>
