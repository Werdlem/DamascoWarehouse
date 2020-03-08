<div ng-controller="productSearch as ps" ng-app="sheetBoard">
	
<style>
.home {
	background-color: #e5e5e5;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.125) inset;
	color: #555;
	text-decoration: none;
}
.panel-success {
	width:49%;
}

.ordered{background-color: rgba(0,255,0,0.2);padding: 2px; border-radius: 5px; border: 1px solid green}
			.not_ordered{background-color: rgba(255,0,0,0.2); padding: 2px; border-radius: 5px; border: 1px solid red}
</style>
  <div class="panel panel-success" style="float:left">
    <div class="panel panel-heading">
      <h3 style="text-align:center">Product Search</h3>
    </div>
    <div class="panel-body">
          <div location_id="search" style="text-align:center">
          <input type="text" style="margin-bottom:10px" class="txt_box" ng-model="searchSku" autofocus="autofocus" tabindex="1"/>
          <br />
          <button type="submit" class="btn btn-large btn-success" name="submit" ng-click="search()">Search</button>
          <input type="hidden" name="doSearch" value="1">
        </div>
    
    </div>
  </div>
 <table class="table table-sm">
		
		<thead>
			<th>sku</th>
			
			
		</thead>
		<tr ng-repeat="x in ps.getSku">
			<td><a href="?action=skuDetails&id={{x.ski_id}}">{{x.sku}}</a></td>
			
	
			
		</tr>

	</table>


