
<div ng-controller="couriers as c" ng-app="sheetBoard">
<h1> Results</h1>
	<table class="table" style="width: 50%">
	<tr>
		<th>Order ID</th>
		<th>Courier</th>
		<th>Labels</th>
		<th>Date Created</th>
	</tr>
	<tr ng-repeat="y in c.getResults">
		<td>{{y.sequenceNumber}}</td>
		<td>{{y.courier}}</td>
		<td>{{y.labels | number:0}}</td>
		<td>{{y.dateCreated}}</td>
	</tr>
	</table>
</div>


<script src="/restricted/myApp.js"></script>

</div>