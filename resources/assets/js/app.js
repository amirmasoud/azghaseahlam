var imageApp = angular.module('imageApp', ['mainCtrl', 'modalCtrl', 'ui.bootstrap', 'imageService', 'infinite-scroll', 'angular-loading-bar', 'ngRoute', 'ngSanitize', 'cfp.hotkeys'])
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
		});

	if(window.history && window.history.pushState){
		$locationProvider.html5Mode({
			enabled: true,
			requireBase: false
		});
	}
});

imageApp.filter('unsafe', function($sce) { return $sce.trustAsHtml; });

angular.module('infinite-scroll').value('THROTTLE_MILLISECONDS', 250);
