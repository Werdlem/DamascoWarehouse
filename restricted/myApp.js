var app = angular.module('sheetBoard', []);
app.controller('boardController', function($scope,$http) {
    
        $scope.board =[{
    	flute: 'B',
      score: 300,
      sheets: 119,

    },
    {
    	flute: 'C',
      score: 725,
      sheets: 190,
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
      score: 620,
      sheets: 154,
  }];

  $scope.boardCalc = function(){
  	var res = ($scope.measure / $scope.selectedFlute.score  * ($scope.selectedFlute.sheets));
  	if(isNaN(res)){
  		return 0;
  	}
  	return res;
  };

  $http({
      method:'GET',
      url:'./jsonData/shredMaster.json.php'
    }).then(function(response){
      $scope.shredMaster=response.data;
    });


         
});
