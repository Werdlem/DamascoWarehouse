
<style>
  .options-container{
        width: 280px;
        background-color: #D8D8D8;
        float: left;
        border: 1px solid #777;
        
         margin: 0 auto;

    }

    .options{
        padding: 5px
    }
    input{
        
    }


    .summary{
        float: right;
        width: 400;
        margin: 0;
  }
  .results{
  padding-left: 20px;
    float: left;
    width: 75%;
    margin-bottom: 10px
  }

  #jobSheet{
    padding-left: 20px;
  }


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
    margin-left: 5px;
}
h3{
    text-decoration: underline;
    text-align: center;
    font-size: 18px
}
input{
    float: right;
}
.button-menu{
 float: left;
 
  margin-left: 10px
}
button{
  margin-right: 10px;

}
</style>

<div ng-controller="styleController as style" ng-app="quoteApp">


<div class="container">
<div class="options-container">
<div class="options">
<h3>Carton Select</h3>
<p>Carton: <select style="float: right; width: 174px; height: 26px;" name="" ng-model="selectedCarton" ng-init="selectedCarton = cartons[0]" ng-options="x.ref for x in cartons" ></select></p>

<h3>Carton Select</h3>
<p>Style: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedStyle" ng-options="x.style for x in styles"></select></p>
<p>Flute: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedFlute" ng-options="x.flute for x in flutes" ng-init="selectedFlute = flutes[0]" ></select></p>
<p>Grade: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedGrade" ng-options="x.grade for x in grades" ng-init="selectedGrade = type[0]" ></select></p>
<p>Liner: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedLiner" ng-options="x.liner for x in liners" ng-init="selectedLiner = liner[0]" ></select></p>
<br/>
<h3>Carton Dimms</h3>
<p>Length: <input type="text" ng-model="length=selectedCarton.length"></p>
<p>Width: <input type="text" ng-model="width=selectedCarton.width"></p>
<p>Height: <input type="text" ng-model="height=selectedCarton.height"></p>

</select></p>
<p>Finish: <input type="text" ng-model="selectedFinish=selectedCarton.finish"></p>
<p>Category: <input type="text" ng-model="selectedCategory=selectedCarton.category"> </p>
<p>Config: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedPanelConfig" ng-init="selectedPanelConfig = panelConfig[1]" ng-options="x.config for x in panelConfig" >
    </select>
    <p>Qty: <input type="text" name="qty" ng-model="qty"></p>

    <br />
<h3>Costing</h3>
<p>£ per KSqM: <input type="text" ng-model="cost"></p>
 <p>Labour: <input type="text" ng-model="labourTime"></p>
<p>Margin: <select style="float: right; width: 174px; height: 26px;" ng-model="selectedMargin" ng-options="x.margin for x in margin" ng-init="selectMargin = margin[0]" ></select></p>
<p>Delivery: <input type="text" ng-model="miles" placeholder="Miles"></p>
</div>
</div>
<span ng-hide="selectedStyle == null">
<form method="POST" action="?action=addJob">
 
<div class="results">
<div id="material">
<h3 >Material Specs</h3>
<p><span ng-if="cartonGrade() !==null"><strong>Board Grade:</strong> {{cartonGrade()}}</span></p>
<p><span ng-if="sheetBoardSize() !==null" ><strong>Blank Size:</strong> {{boardDeckle()}} x <span style ng-style="boardChopMax()">{{cartonConfigChop()}}</span></span></p> 
<p><span ng-if="boardDeckle() !==null"><strong>Width:</strong> {{boardDeckle()}}</span></p>
<p><span ng-if="cartonConfigChop() !==null" ng-style="boardChopMax()"><strong>Length:</strong> {{cartonConfigChop()}} </span></p>
</div>
<div id="material" style="">
<h3>Production Specs</h3>

<p><span ng-if="calcChopCrease1() !==null"><strong>Chop Crease 1:</strong> {{calcChopCrease1()}}</span></p>
<p><span ng-if="calcChopCrease1() !==null"><strong>Chop Crease 2:</strong> {{calcChopCrease2()}}</span></p>
<p><span ng-if="glueFlap() !==null"><strong>Deckle Glue Flap:</strong> {{glueFlap()}}</span></p>
<p><span ng-if="calcDeckleLength() !==null"><strong>Deckle Crease Length (L):</strong> {{calcDeckleLength()}}</span></p>
<p><span ng-if="calcDeckleWidth() !==null"><strong>Deckle Crease Breadth (B):</strong> {{calcDeckleWidth()}}</span></p>
<p><span ng-if="calQtyReq() !==null"><strong>Qty of Sheets:</strong> {{calQtyReq()}}</span></p>
<p><span ><strong>Setup Configuration:</strong> {{selectedPanelConfig.config}}</span></p>
</div>
<div id="material">
<h3>Costing Specs</h3>
<p><strong style="text-decoration: underline;">Unit Price</strong></p>
<p><span ng-if="calcSqMperBox() !==null"><strong> Square M per box: </strong> {{calcSqMperBox() | number: 3}}</span></p>
<p><span ng-if="calcLabourPerUnit() !==null"><strong>Labour per unit:</strong> {{calcLabourPerUnit() | currency: '£' }}</span></p>
<p><span ng-if="calculateCostPerUnit() !==null"><strong>Material cost per unit:</strong> {{calculateCostPerUnit() | currency: '£' }}</span></p>
<p><span ng-if="calcMarginPerUnit() !==null"><strong>Margin per unit:</strong> {{calcMarginPerUnit() | currency: '£' }}</span></p>
<p><span ng-if="calcTotalCostPerUnit() !==null"><strong>Cost per unit:</strong> {{calcTotalCostPerUnit() | currency: '£' }}</span></p>
<p><strong style="text-decoration: underline;">Total Price</strong></p>
<p><span ng-if="calcSqMperBoxQty() !== null"><strong>Total Square M: </strong> {{calcSqMperBoxQty() | number : 3}}</span></p>
<p><span ng-if="calcLabour() !==null"><strong>Total labour:</strong> {{calcLabour() | currency: '£' }}</span></p>
<p><span ng-if="calcBoardCost() !== null"><strong>Materials Cost: </strong> {{calcBoardCost() | currency: '£'}}</span></p>
<p><span ng-if="calcDelivery() !==null"><strong>Delivery:</strong> {{calcDelivery() | currency: '£' }}</span></p>
<p><span ng-if="calculateMargin() !==null"><strong>Total margin:</strong> {{calculateMargin() | currency: '£'}}</span></p>
<p><span ng-if="calcTotal() !==null"><strong>Total:</strong> {{calcTotal() | currency: '£' }}</span></p>
</div>
</div>
</form>
</span>
</p>
<br/>




<!--Hidden fields for page Posting-->
<form method="POST" action="?action=ctn_addJob">



                        <input type="Hidden" name="length" value="{{length}}">
                        <input type="Hidden" name="width" value="{{width}}">
                        <input type="Hidden" name="height" value="{{height}}">
                        <input type="Hidden" name="style" value="{{selectedStyle.style}}">
                        <input type="Hidden" name="qty" value="{{qty}}">
                         <input type="Hidden" name="deckle" value="{{boardDeckle()}}">
                        <input type="Hidden" name="chop" value="{{cartonConfigChop()}}">
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
                          <input type="Hidden" name="config" value="{{selectedPanelConfig.config}}">
                           <input type="Hidden" name="fluteWidth" value="{{selectedFlute.width}}">
                            <input type="Hidden" name="breadth" value="{{selectedStyle.breadth}}">
                            <input type="Hidden" name="unitPrice" value="{{calcTotalCostPerUnit() | currency: '£'}}">
                            <input type="Hidden" name="total" value="{{calcTotal() | currency: '£'}}">
                         <p><button type="submit" class="button-menu"> Add job</button></p>
                                                   </form>

                          <!--Job Sheet-->
                          <form method="POST" action="?action=ctnBespokeJobSheet">
<!--Hidden fields for page Posting-->
<p><button type="submit" name="bespoke" class="button-menu"> Print Bespoke Sheet</button></p>


                        <input type="Hidden" name="length" value="{{length}}">
                        <input type="Hidden" name="width" value="{{width}}">
                        <input type="Hidden" name="height" value="{{height}}">
                        <input type="Hidden" name="style" value="{{selectedStyle.style}}">
                        <input type="Hidden" name="qty" value="{{qty}}">
                         <input type="Hidden" name="deckle" value="{{boardDeckle()}}">
                        <input type="Hidden" name="chop" value="{{cartonConfigChop()}}">
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
                          <input type="Hidden" name="config" value="{{selectedPanelConfig.config}}">
                          <input type="Hidden" name="flute" value="{{selectedFlute.width}}">
                         
                          </form>

<form method="POST" action="?action=quotation_review">
<p><button type="submit" class="button-menu">Save Quote</button></p>

<!--Hidden fields for page Posting-->
                        <input type="Hidden" name="length" value="{{length}}">
                        <input type="Hidden" name="width" value="{{width}}">
                        <input type="Hidden" name="height" value="{{height}}">
                        <input type="Hidden" name="style" value="{{selectedStyle.style}}">
                        <input type="Hidden" name="qty" value="{{qty}}">
                         <input type="Hidden" name="deckle" value="{{boardDeckle()}}">
                        <input type="Hidden" name="chop" value="{{cartonConfigChop()}}">
                        <input type="Hidden" name="chopCrease1" value="{{calcChopCrease1()}}">
                        <input type="Hidden" name="chopCrease2" value="{{calcChopCrease2()}}">
                        <input type="Hidden" name="deckleCreaseL" value="{{calcDeckleLength()}}">
                         <input type="Hidden" name="deckleCreaseW" value="{{calcDeckleWidth()}}">
                        <input type="Hidden" name="glueFlap" value="{{selectedCategory.glueFlap}}">
                         <input type="Hidden" name="finish" value="{{selectedFinish.finish}}">
                        <input type="Hidden" name="grade" value="{{cartonGrade()}}">
                        <input type="Hidden" name="image" value="{{selectedStyle.image}}">
                        <input type="Hidden" name="cost" value="{{cost | currency: '£'}}">
                        <input type="Hidden" name="margin" value="{{(selectedMargin.margin * 100) + '%'}}">
                         <input type="Hidden" name="category" value="{{selectedCategory.category}}">
                          <input type="Hidden" name="boardQty" value="{{calQtyReq()}}">
                          <input type="Hidden" name="config" value="{{selectedPanelConfig.config}}">
                           <input type="Hidden" name="fluteWidth" value="{{selectedFlute.width}}">
                            <input type="Hidden" name="breadth" value="{{selectedStyle.breadth}}">
                            <input type="Hidden" name="unitPrice" value="{{calcTotalCostPerUnit() | currency: '£'}}">
                            <input type="Hidden" name="unitLabour" value="{{calcLabourPerUnit() | currency: '£'}}">
                            <input type="Hidden" name="unitSqm" value="{{calcSqMperBox() | number :3}}">
                            <input type="Hidden" name="unitMaterials" value="{{calculateCostPerUnit() | currency: '£'}}">
                            <input type="Hidden" name="total" value="{{calcTotal() | currency: '£'}}">
                            <input type="Hidden" name="materialsTotal" value="{{calcBoardCost()|currency:'£'}}">
                            <input type="Hidden" name="labourTotal" value="{{calcLabour() |currency:'£'}}">
                            <input type="Hidden" name="totalSqm" value="{{calcSqMperBoxQty()|number: 4}}">
                            <input type="Hidden" name="deliveryTotal" value="{{calcDelivery()|currency: '£'}}">

                         
                          </form>



    <!--end-->
<script src="/restricted/cartonApp.js"></script>
</div>
</div>
</div>
</span>
