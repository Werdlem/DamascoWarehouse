
<div id="summary" style="float: left; width: 900px">
           <h3 style="text-decoration: underline;">Summary</h3>
            <p>
                <span><h3>Style: {{selectedStyle.name}} </h3></span>
                <input type="hidden" name="style" value="{{selectedStyle.name}}">
                <!--SUMMARY OF CARTON SPEC-->
                <h3>Grade: {{selectedFlute.type
                }}{{selectedGrade.type}}{{selectedLiner.grade}} </h3>
                <input type="hidden" name="details" value="{{selectedGrade.type}}/{{selectedFlute.flute}}/{{selectedLiner.grade}}">

                <!--calculation for the sheet board size Height + Base X l * 2 + b * 2 + 25 -->
                <h3>Blank Size: <span ng-if="sheetBoardSize() !==null">{{boardWidth()}} x {{boardLength()}}</span></h3>

                <!--SQUARE M PER CARTON-->
                <h3>Square M per box: {{calcSqMperBox() | number:3}}</h3>
                 
                <!--CALCULATE THE TOTAL SQUARE M OF BOARD REQUIRED-->
                <h3>Total Square M:
                    <span ng-if="calcSqMperBoxQty() !== null">{{calcSqMperBoxQty() | number : 3}}</span>
                    <span ng-if="calcSqMperBoxQty() === null">Can't do that yet</span>
                </h3>
                <h3>Cost: <span>{{calculateCost() | currency: '£' }}</span></h3>
                 <h3>Margin: {{calculateMargin() | currency: '£'}}</h3>
                <h3>Margin per box: {{calculateMargin() /(qty) | currency: '£'}}</h3>
                <h3>Total: {{calculateCost() + calculateMargin() | currency: '£' }}</h3>
      

                        

                <label>L: {{length}}</label><br/>
                <label>B: {{breadth}}</label><br/>
                <label>H: {{height}}</label>
                <br/>
                </p>
                </div>
                <button type="submit">Job Sheet</button>

                <img ng-src="{{selectedStyle.image}}" />
                </div>

