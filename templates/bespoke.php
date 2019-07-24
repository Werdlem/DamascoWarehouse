<div ng-controller="autobox" ng-app="sheetBoard">

	<label>Length: </label><input type="" ng-model="length">
	<label>Width: </label><input type="" ng-model="width">
	<label>Height: </label><input type="" ng-model="height"><br/><br/>
	

	<p><label>Style: </label><select ng-model="selectedStyle" ng-options="x.style for x in styles"></select></p>
		<p><label>Config: </label><select ng-model="selectedPanel" ng-options="x.config for x in config"></select></p>
			<p><label>Flute: </label><select ng-model="selectedFlute" ng-options="x.flute for x in flutes"></select></p>
<h2>Board Size</h2>
<label>{{newDeckle()}} x {{chop()}}</label>
<h2>Blade Setup</h2>
<p><label>Blade 1: <span>{{blade1()}}</span></label></p>
<p><label>Blade 2: <span>{{blade2()}}</span></label></p>
<h2>Panel Setup</h2>
<p><label>Panel 1: <span>{{panel1()}}</span></label></p>
<div ng-show="selectedPanel.config=='2 Piece'">
<p><label>Panel 2: <span>{{panel4()}}</span></label></p>
</div>
<div ng-hide="selectedPanel.config=='2 Piece'">
<p><label>Panel 2: <span>{{panel2()}}</span></label></p>
<p><label>Panel 3: <span>{{panel1()}}</span></label></p>
<p><label>Panel 4: <span>{{panel4()}}</span></label></p></div>
	
</div>
<script src="/restricted/myApp.js"></script>
