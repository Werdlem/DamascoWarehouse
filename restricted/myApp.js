var app = angular.module('sheetBoard', []);
app.controller('boardController', function($scope) {
    
        $scope.board =[{
    	flute: 'B',
      score: 300,
      sheets: 119,

    },
    {
    	flute: 'C',
      score: 120,
      sheets: 33,
  },
  {
    	flute: 'BC',
      score: 700,
      sheets: 119,
  },
  {
    	flute: 'E',
      score: 160,
      sheets: 105,
  },
  {
    	flute: 'EB',
      score: 1012,
      sheets: 300,
  }];

  $scope.boardCalc = function(){
  	var res = ($scope.measure / $scope.selectedFlute.score  * ($scope.selectedFlute.sheets));
  	if(isNaN(res)){
  		return 0;
  	}
  	return res;
  }

         
});
