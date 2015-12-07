var imageApp = angular.module('imageApp', ['mainCtrl', 'imageService'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<<');
	$interpolateProvider.endSymbol('>>');
});