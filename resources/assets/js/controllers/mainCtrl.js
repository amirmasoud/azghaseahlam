angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image) {
    $scope.loading = true;
    $scope.images = [];
    $scope.singular = [];
    $scope.loadinImage = false;
    var page = 1;

    function getImages() {
    	return Image.get(page)
	        .then(function(result) {
	        	page = page + 1;
	            $scope.images = $scope.images.concat(result['data']['data']);
	            $scope.loading = false;
	        });
    }

	$scope.loadMore = function() {
		return getImages();
	};

	$scope.openImage = function(id) {
		if (id) {
				$scope.loadinImage = true;
				$scope.singular.standard_resolution = '#';
				$scope.singular.caption_text = '';
			return Image.singular(id)
				.then(function(result) {
					$scope.loadinImage = false;
					$scope.singular = result['data'];
				});
		}
	}
});