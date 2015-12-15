var imageApp = angular.module('imageApp', ['mainCtrl', 'imageService', 'infinite-scroll', 'angular-loading-bar', 'ngRoute', 'ngSanitize'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<<');
	$interpolateProvider.endSymbol('>>');
})
.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
	cfpLoadingBarProvider.includeSpinner = false;
}])
.config(function($routeProvider, $locationProvider) {
	$routeProvider
		.when('/', {
			templateUrl: 'partials/index.html'
		})
		.when('/about', {
			templateUrl: 'partials/about.html'
		})
});

imageApp.filter('unsafe', function($sce) { return $sce.trustAsHtml; });
//angular.module('infinite-scroll').value('THROTTLE_MILLISECONDS', 250);
