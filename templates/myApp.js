var app = angular.module('sheetBoard', []);
app.controller('boardController', function($scope, $http) {
    
        $scope.board =[{
    	flute: 'B';
      score: 200;
      sheets: 50;

    }];

         
});
