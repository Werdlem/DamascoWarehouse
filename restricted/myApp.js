var app = angular.module('sheetBoard', []);
app.controller('boardController', function($scope) {
    
        $scope.board =[{
    	flute: 'B',
      score: 200,
      sheets: 50,

    },
    {
    	flute: 'C',
      score: 100,
      sheets: 50,
  },
  {
    	flute: 'BC',
      score: 100,
      sheets: 50,
  },
  {
    	flute: 'E',
      score: 100,
      sheets: 50,
  },
  {
    	flute: 'EB',
      score: 100,
      sheets: 50,
  }];

  $scope.boardCalc = function(){
  	var res = ($scope.measure / $scope.selectedFlute.score  * ($scope.selectedFlute.sheets));
  	if(isNaN(res)){
  		return 0;
  	}
  	return res;
  }

         
});
