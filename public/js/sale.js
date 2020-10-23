(function(){
    var app = angular.module('tutapos', [ ]);

    app.controller("SearchProductCtrl", [ '$scope', '$http', function($scope, $http) {
        $scope.products = [ ];

        $http.get('api/prodtemp').success(function(data) {
            $scope.products = data;

        });
        $scope.saletemp = [ ];
        $scope.newsaletemp = { };
        $http.get('api/saletemp').success(function(data, status, headers, config) {
            $scope.saletemp = data;

        });
        $scope.addSaleTemp = function(product, newsaletemp) {
            $http.post('api/saletemp', { product_id: product.id,name: product.name, cost_price: product.cost_price, selling_price: product.selling_price }).
            success(function(data, status, headers, config) {
                $scope.saletemp.push(data);
                    $http.get('api/saletemp').success(function(data) {
                    $scope.saletemp = data;
                    });
            });
        }

        $scope.updateSaleTemp = function(newsaletemp) {
            
            $http.put('api/saletemp/' + newsaletemp.id, { quantity: newsaletemp.quantity, total_cost: newsaletemp.product.cost_price * newsaletemp.quantity,
                total_selling: newsaletemp.product.selling_price * newsaletemp.quantity }).
            success(function(data, status, headers, config) {
                
                });
        }
        $scope.removeSaleTemp = function(id) {
            $http.delete('api/saletemp/' + id).
            success(function(data, status, headers, config) {
                $http.get('api/saletemp').success(function(data) {
                        $scope.saletemp = data;
                        });
                });
        }
        $scope.sum = function(list) {
            var total=0;
            angular.forEach(list , function(newsaletemp){
                    total += parseFloat(newsaletemp.selling_price * newsaletemp.quantity);
            });
            return total;
        }
    }]);
})();