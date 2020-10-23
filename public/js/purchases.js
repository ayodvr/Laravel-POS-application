(function(){
    var app = angular.module('tutpos', [ ]);

    app.controller("SearchPurchaseCtrl", [ '$scope', '$http', function($scope, $http) {
        $scope.products = [ ];
        $http.get('api/prodtemp').success(function(data) {
            $scope.products = data;
        });
        $scope.receivingtemp = [ ];
        $scope.newreceivingtemp = { };
        $http.get('api/receivingtemp').success(function(data, status, headers, config) {
            $scope.receivingtemp = data;
        });
        $scope.addReceivingTemp = function(product,newreceivingtemp) {
            $http.post('api/receivingtemp', { product_id: product.id, cost_price: product.cost_price,total_cost: product.cost_price, type: product.type }).
            success(function(data, status, headers, config) {
                $scope.receivingtemp.push(data);
                    $http.get('api/receivingtemp').success(function(data) {
                    $scope.receivingtemp = data;
                    });
            });
        }
        $scope.updateReceivingTemp = function(newreceivingtemp) {
            $http.put('api/receivingtemp/' + newreceivingtemp.id, { quantity: newreceivingtemp.quantity, total_cost: newreceivingtemp.item.cost_price * newreceivingtemp.quantity }).
            success(function(data, status, headers, config) {
                });
        }
        $scope.removeReceivingTemp = function(id) {
            $http.delete('api/receivingtemp/' + id).
            success(function(data, status, headers, config) {
                $http.get('api/receivingtemp').success(function(data) {
                        $scope.receivingtemp = data;
                        });
                });
        }     
        $scope.sum = function(list) {
            var total=0;
            angular.forEach(list , function(newreceivingtemp){
                total+= parseFloat(newreceivingtemp.cost_price * newreceivingtemp.quantity);
            });
            return total;
        }

    }]);
})();