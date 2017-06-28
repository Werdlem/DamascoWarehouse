var app = angular.module('quoteApp', []);
app.controller('styleController', function($scope, $http) {
    
        $scope.margin =[{
    	margin: .10
    },
    {
    	margin: .20
    },
    {
     	margin: .30
     },
     {
     	margin:.40
     },
      {
     	margin: .50
     },
      {
     	margin: .60
     },
      {
     	margin: .70
     },
      {
     	margin: .80
     },
      {
     	margin: .90
     },
      {
     	margin: 1
     }];

     $scope.panelConfig=[{
      config: "2 Panel",
      score: 2
    },
    {
      config: "4 Panel",
      score: 1  
     }];

    $scope.labour = 7.5;
    $scope.date = new Date();
    $scope.delivery = .40;
     
    

    //Carton Grade Specs

    $scope.cartonGrade = function(){
     
        return($scope.selectedGrade.grade +'/'+ $scope.selectedFlute.flute +'/'+ $scope.selectedLiner.liner)
     
    };

    //CALCULATE DECKLE

      $scope.boardDeckle = function(){
      var res =($scope.calcChopCrease1()* 2 +(+$scope.height) + (+$scope.selectedFlute.width * $scope.selectedStyle.creaseDeckle));      
      if(isNaN(res)){
        return null;
      }
      return res;
    };


       
        // calculate the chop length
    $scope.boardChop = function(){
    	var res =(($scope.selectedStyle.length * $scope.length )+($scope.selectedStyle.width * $scope.width) + (+$scope.selectedCategory.glueFlap) + (+$scope.selectedFlute.width * $scope.selectedStyle.creaseChop));
    	if (isNaN(res)){
        return null;
      }
      return res;
    };


    //CALCULATE CARTON CONFIG
   $scope.cartonConfigChop = function(){
      var res = ($scope.boardChop() / $scope.selectedPanelConfig.score)
     if(isNaN(res)){
          return null;
        }
        return res;
    };


        // calculate the square Meter per carton
    $scope.calcSqMperBox = function(){
       var res = $scope.boardDeckle() * $scope.boardChop()
         /1000000;
        if(isNaN(res)){
          return null;
        }
        return res;
    };
        // calculate the square meters of total carton quantity
    $scope.calcSqMperBoxQty = function(){
        var res = $scope.calcSqMperBox() * $scope.qty;
        if (isNaN(res)) {
            return null;
        }
        return res;
    };
    $scope.calQtyReq = function(){
      var res = $scope.boardChop();
      if ($scope.boardChop() > 2000){
        return $scope.qty * 2;      
      }
      return $scope.qty;
     }
$scope.calcBoardCost = function(){
      var res = (($scope.cost /1000 ) * $scope.calcSqMperBoxQty());
      if(isNaN(res)){
        return null;
      }
      return res;
      };
 $scope.calculateCost = function(){
      var res =($scope.calculateCostPerUnit() * $scope.qty);
          if(isNaN(res)){
            return null;
          }
          return res;
    };

$scope.calculateCostPerUnit = function(){
      var res =(($scope.cost / 1000) * $scope.calcSqMperBox());
          if(isNaN(res)){
            return null;
          }
          return res;
    };


    $scope.calculateMargin = function(){
      var res= $scope.calculateCost() * $scope.selectedMargin.margin;
      if(isNaN(res)){
        return null;
      }
      return res;
    };
    $scope.calcMarginPerUnit = function(){
      var res= $scope.calculateCostPerUnit() * $scope.selectedMargin.margin;
      if(isNaN(res)){
        return null;
      }
      return res;
    };

     $scope.calcTotal = function(){
      var res = ($scope.calculateCost() + $scope.calculateMargin()+ $scope.calcLabour()) + $scope.calcDelivery();
      if(isNaN(res)){
        return null;
      }
      return res;
    };

    $scope.calcTime = function(){
      var res = ($scope.qty / $scope.selectedCategory.qtyPerHour);
      if(isNaN(res)){
        return null;
      }
      return res;
    };

    $scope.calcLabour = function(){
      var res = ($scope.labour * $scope.calcTime());
      if(isNaN(res)){
        return res;
      }
      return res;
    }

     $scope.calcLabourPerUnit = function(){
      var res = (($scope.labour * $scope.calcTime()) / $scope.qty);
      if(isNaN(res)){
        return res;
      }
      return res;
    }

    $scope.calcDelivery = function(){
      var res = $scope.delivery * $scope.miles;
      if(isNaN(res)){
        return null;
      }
      return res;
    }



        // calculate the Chop creasing positions
    $scope.calcChopCrease1 = function(){
     var res = ($scope.width * $scope.selectedStyle.breadth + (+$scope.selectedFlute.width / 2 ));
      if(isNaN(res)){
        return null;
      }
      return res;
    };

    $scope.calcChopCrease2 = function(){
      try{
        return(($scope.selectedFlute.width *2) +(+$scope.height))
      }
      catch(x){}
    };

    $scope.glueFlap = function(){
      var res = $scope.selectedCategory.glueFlap;
        if(isNaN(res)){
          return null;
        }
        return res + ' (Crease 1)';
    };
    $scope.calcDeckleLength = function(){
      var res = (($scope.selectedFlute.width * 1 ) + (+$scope.length));
       if (isNaN(res)){
        return null;
       }
       return res;
     };
     $scope.calcDeckleWidth = function(){
      var res = (($scope.selectedFlute.width * 1 ) + (+$scope.width));
      if(isNaN(res)){
        return null;
      }
      return res;
      };
      
     

     $scope.setupConfig = function(){
     var res = $scope.boardChop();
      if ($scope.boardChop() > 1300){
       var length = $scope.calcDeckleLength();
       var width = $scope.calcDeckleWidth();
       return ("2 Panel carton");
      }

      var length = $scope.calcDeckleLength();
       var width = $scope.calcDeckleWidth();
       return ("4 Panel Carton");
     }

     //calculate chop blade positions
$scope.chopSlotL = function(){
      var res = (($scope.selectedCarton.length *1) + (+$scope.selectedCarton.fluteWidth*1 ));
      if (isNaN(res)){
        return null;
      }
      return res;
     }

     $scope.chopSlotW = function(){
      var res = (($scope.selectedCarton.width *1) + (+$scope.selectedCarton.fluteWidth*1 ));
      if (isNaN(res)){
        return null;
      }
      return res;
     }


     //Calculate internal Dimms
     $scope.internalDimms = function(){
      var res = $scope.selectedCarton.length + "x" + $scope.selectedCarton.width + "x" + $scope.selectedCarton.height;
      if (isNaN(res)){
        return null;
      }
      return res;
     }

      
              // END

          // Calculate the sheetboard blank size
    $scope.sheetBoardSize = function(){
        var res = $scope.boardDeckle();
        if (isNaN(res)) {
            return null;
        }
        return res;
    };
    
    $scope.printSheet = function(jobSheet) {
  var printContents = document.getElementById(jobSheet).innerHTML;
  var popupWin = window.open('', '_blank', 'width=600,height=600');
  popupWin.document.open();
  popupWin.document.write('<html><head><link rel="stylesheet" type="text/css"/></head><body onload="window.print()">' + printContents + '</body></html>');
  popupWin.document.close();
};

      // JSON DB data of carton styles
    $http({
        method: 'GET',
        url: './jsonData/styles.json.php'
    }).then(function(response){
        $scope.styles = response.data;
    });

     // JSON DB data of board fluting
    $http({
    	method: 'GET',
    	url: './jsonData/flutes.json.php'
    }).then(function(response){
    	$scope.flutes=response.data;
    });

    // JSON DB data of board grades
    $http({
    	method: 'GET',
    	url: './jsonData/grades.json.php'
    }).then(function(response){
    	$scope.grades=response.data;
    });

     // JSON DB data of board Liners
    $http({
      method: 'GET',
      url: './jsonData/liners.json.php'
    }).then(function(response){
      $scope.liners=response.data;
    });

    $http({
      method: 'GET',
      url: './jsonData/finish.json.php'
    }).then(function(response){
      $scope.finish=response.data;
    });

    $http({
      method: 'GET',
      url: './jsonData/category.json.php'
    }).then(function(response){
      $scope.category=response.data;
    });

    $http({
      method: 'GET',
      url: './jsonData/cartons.json.php'
    }).then(function(response){
      $scope.cartons=response.data;
    });

});
