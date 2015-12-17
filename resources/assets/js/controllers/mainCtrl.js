angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Image, $uibModal, $log) {
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

.controller('modalController', function($scope, Image, hotkeys, $uibModalInstance, singular) {
	$scope.singular = singular;
    $scope.loadingImageNext = false;
    $scope.loadingImagePrev = false;

	$scope.openImage = function(id, direction) {
		if (id) {
			if (typeof direction !== 'undefined')
				$scope['loadingImage' + direction] = true;

			return Image.singular(id)
				.then(function(result) {
					$scope.singular.standard_resolution = '#';
					$scope.singular = result['data'];
					$scope['loadingImage' + direction] = false;
				});
		}
	}

	hotkeys.add({
		combo: 'right',
		callback: function() {
			$scope.openImage($scope.singular.next, 'Next');
		}
	});

	hotkeys.add({
		combo: 'left',
		callback: function() {
			$scope.openImage($scope.singular.prev, 'Prev');
		}
	});
});


