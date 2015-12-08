var imageApp = angular.module('imageApp', ['mainCtrl', 'imageService', 'ngAnimate', 'infinite-scroll', 'angular-loading-bar'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<<');
	$interpolateProvider.endSymbol('>>');
})
.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
	cfpLoadingBarProvider.includeSpinner = false;
}]);

//angular.module('infinite-scroll').value('THROTTLE_MILLISECONDS', 250);
