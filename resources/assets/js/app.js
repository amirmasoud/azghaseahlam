var imageApp = angular.module('imageApp', ['mainCtrl', 'imageService', 'infinite-scroll'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<<');
	$interpolateProvider.endSymbol('>>');
});

//angular.module('infinite-scroll').value('THROTTLE_MILLISECONDS', 250);
