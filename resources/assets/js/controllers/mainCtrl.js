angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image) {
    $scope.loading = true;
    $scope.images = [];
    $scope.singular = [];
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

	$scope.openImage = function(id) {
    	Image.singular(id)
	        .then(function(result) {
	        	$scope.singular = result['data'];
	        });
	}
});