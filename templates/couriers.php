
<div ng-controller="couriers as c" ng-app="sheetBoard">
	<input type="date" ng-model="start">
	<input type="date" ng-model="end">
	
	<button ng-click="search()">Search</button>
	<h2>Hello world</h2>

	<tr ng-repeat="x in c.getData">
		<td>{{x.count}}</td>
	</tr>
	


<script src="/restricted/myApp.js"></script>
</div>