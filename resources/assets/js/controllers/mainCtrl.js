angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image) {
    $scope.loading = true;

    Image.get()
        .success(function(data) {
            $scope.images = data;
            $scope.loading = false;
        });
});