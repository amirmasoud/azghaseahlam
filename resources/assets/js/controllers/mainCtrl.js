angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image) {
    $scope.loading = true;
    $scope.images = [];
    var page = 1;

    function getImages() {
    	return Image.get(page)
	        .then(function(result) {
	        	page = parseInt(result['data']['current_page'], 10) + 1;
	            $scope.images = $scope.images.concat(result['data']['data']);
	            $scope.loading = false;
	        });
    }

	$scope.loadMore = function() {
		return getImages();
	};
});