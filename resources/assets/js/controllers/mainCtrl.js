angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image, $uibModal, $log, $location) {
    $scope.images = [];

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
	}

	$scope.openModal = function (id) {
		var modalInstance = $uibModal.open({
			animation: true,
			templateUrl: 'partials/modal.html',
			controller: 'modalController',
			size: 'custom',
			resolve: {
				singular: function () {
					return Image.singular(id)
						.then(function(result) {
							return result['data'];
						});
				}
			}
		});
	};
})
