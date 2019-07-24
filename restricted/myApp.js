var app = angular.module('sheetBoard', []);

app.controller('couriers', function($scope,$http){
  $scope.search=()=>{

    start = $scope.start;
  end = $scope.end;
 // newDateStart = 
$http({
method: 'POST',
url:'./jsonData/couriers.json.php',
data:{start:start,end:end}
}).then((response)=>{
      this.getData=response.data;
      });
}
});


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

app.controller('autobox', function($scope){

  $scope.styles=[{
    style: '0201',
    panel: 2,
    nPanel:1

  },
  {
    style: '0203',
    panel: 1,
    nPanel:2
  },
  {
  style: '0200',
  panel: 2,
  nPanel:0.5
}];

  $scope.config=[{
    config: '1 Piece',
    panels: 4
  },
  {
    config: '2 Piece',
    panels: 2
  }];

  $scope.flutes=[{
    flute: 'BC',
    width: 6
  },
  {
    flute: 'EB',
    width: 4
  },
  {
    flute: 'B',
    width: 3
  }];

$scope.newDeckle = function(){
  var dec = ($scope.width / $scope.selectedStyle.panel+($scope.height*1)+ ($scope.selectedFlute.width*2));
  return dec;
}
  $scope.blade1 = function(){
    var b1 = ($scope.width/$scope.selectedStyle.panel)+$scope.selectedFlute.width;
    return b1;
  }

  $scope.blade2 = function(){
    var b2 = ($scope.height*1) + $scope.selectedFlute.width;
    return b2;
  }

  $scope.panel1 = function(){
    var p1 = (($scope.length*1) + ($scope.selectedFlute.width));
    return p1
  }

   $scope.panel2 = function(){
    var p2 = (($scope.width*1) + ($scope.selectedFlute.width));
    return p2
  }
   
   $scope.panel4 = function(){
    var p4 = ($scope.width*1);
    return p4
  }

  $scope.deckle = function(){
    var dec = ($scope.blade1() *2)+$scope.blade2();
    return dec;
  }

  $scope.chop = function(){
    if($scope.selectedPanel.config == '2 Piece')
    {
    var chop = ($scope.panel1() + $scope.panel4())+30;
    return chop;
  }
  else{
    var chop = (($scope.panel1()*2) + ($scope.panel2() + $scope.panel4()))+30;
    return chop;
  }
}
});
