var app = angular.module('ctnApp', []);
app.controller('ctnController', function($scope, $http) {
    

 $scope.boardLength = 1690;
 $scope.boardWidth = 1674;
 $scope.labour = 10;
 $scope.ctnStyle = [{
  style: "0201",
  panelW: 1
},
{
  style: "0203",
  panelW: 2
 }];

 $scope.ctnColour = [{
  colour: 'Black',
  cost: 4.50
},
{
  colour: 'Red',
  cost: 5.00
},
{
colour: 'Blue',
  cost: 7.25
}];
$scope.ctnConfig =[{
config: "4 Panel",
parts: 1,
panelL: 2,
panelW: 2
},
{
  config: "2 Panel",
  parts:2,
  panelL: 1,
  panelW: 1
}];

       $scope.calcBoardWidth = function(){
      var res = ($scope.width * $scope.styleSelect.panelW) + ($scope.height *1); 
      if(isNaN(res)){
        return null;
      } 
      if ((res) > $scope.boardWidth){
        return "Too Big";
      }   
     
      return res;
     };

     $scope.calcBoardLength = function(){
      var res = (($scope.width * $scope.configSelect.panelW) + ($scope.length * $scope.configSelect.panelL) + 40);
      if(isNaN(res)){
        return null;
      } 
       if ((res) > $scope.boardLength){
        return "Too Big";
      }   

      return res;
     };

     $scope.boardDimms = function(){
      var res = ($scope.calcBoardWidth() + ('mm x ')+ $scope.calcBoardLength()+('mm'));
      if (isNaN(res)){
        return null;
      }
      return res;
     };
     $scope.calcWPerSheet = function(){
      var res = ($scope.boardWidth / $scope.calcBoardWidth()) ;
      if(isNaN(res)){
        return null;
      }
     return Math.floor(res);
     };

     $scope.calcLPerSheet = function(){
      var res = ($scope.boardLength / $scope.calcBoardLength()) ;
      if(isNaN(res)){
        return null;
      }
      return Math.floor(res);
     };

     $scope.calcQtyPerSheet = function(){
      var res = ($scope.calcWPerSheet() * $scope.calcLPerSheet()) / $scope.configSelect.parts;
      if(isNaN(res)){
        return null;
      }
      return res;
     };
     $scope.calcCostPerUnit = function(){
      
      var res = $scope.colourSelect.cost / $scope.calcQtyPerSheet();
      return res;
    
     };
     $scope.totalSheets = function(){
      var res = $scope.qty / $scope.calcQtyPerSheet()
      if (isNaN(res)){
        return null;
      }
      return res
     }
     $scope.boardCost = function(){
      var res = $scope.totalSheets() * $scope.colourSelect.cost;
      if (isNaN(res)){
        return null;
      }
      return res
     }

     $scope.calcLabour = function(){
      var res = $scope.hours * $scope.labour;
      if (isNaN(res)){
        return null;
      }
      return res
     }
});
 

