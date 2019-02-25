
<div ng-controller="couriers as c" ng-app="sheetBoard">
	<h1>Couriers</h1>
	<p>Date from: <input type="date" ng-model="start">
	Date to: <input type="date" ng-model="end">
	
	<button ng-click="search()" class="btn btn-large btn-success">Search</button>


<div>
<table class="table" style="width: 50%">
	<tr>
		<th>Courier</th>
		<th>Consignments</th>
		<th>Boxes</th>
	</tr>
	<tr ng-repeat="x in c.getData">
		<td>{{x.courier | uppercase}}</td>
		<td>{{x.count}}</td>
		<td>{{x.labels | number: 0}}</td>
	</tr>
	</table>


<script src="/restricted/myApp.js"></script>
</div>
</div>