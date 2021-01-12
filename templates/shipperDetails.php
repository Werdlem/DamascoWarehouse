
<div ng-controller="couriers as c" ng-app="sheetBoard">
	<h1>Details</h1>
	

<div>
<table class="table" style="width: 50%">
	<tr>
		<th>Courier</th>
		<th>Consignments</th>
		<th>Boxes</th>
	</tr>
	<tr ng-repeat="x in c.getDetails">
		<td>{{x.latestStatus | uppercase}}</td>
		<td>{{x.count}}</td>
		<td>{{x.labels | number: 0}}</td>
	</tr>
	</table>


<script src="/restricted/myApp.js"></script>
</div>
</div>