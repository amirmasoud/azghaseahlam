angular.module('modalCtrl', [])
.controller('modalController', function($scope, Image, hotkeys, $uibModalInstance, singular, $location) {
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

	$scope.close = function () {
		$uibModalInstance.dismiss();
	};

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
