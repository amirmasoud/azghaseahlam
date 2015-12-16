angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image) {
    $scope.images = [];
    $scope.singular = [];
    $scope.loadingImage = false;
    var busy = false;
    var page = 1;

    function getImages() {
		if (busy) return;
			busy = true;

    	return Image.get(page)
	        .then(function(result) {
	        	page = page + 1;
	            $scope.images = $scope.images.concat(result['data']['data']);
				busy = false;
	        });
    }

	$scope.loadMore = function() {

		return getImages();
	};

	$scope.openImage = function(id) {
		if (id) {
				$scope.loadingImage = true;
				$scope.singular.standard_resolution = '#';
				$scope.singular.caption_text = '';
			return Image.singular(id)
				.then(function(result) {
					$scope.loadingImage = false;
					$scope.singular = result['data'];
				});
		}
	}
});