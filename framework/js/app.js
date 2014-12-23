var frameworkApp = angular.module('frameworkApp', ['ngRoute']);

frameworkApp.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
		when('/home', {
			templateUrl: 'framework/view/home.html',
			controller: 'homeCtrl'
		}).
		when('/cadastro', {
			templateUrl: 'framework/view/cadastro.html',
			controller: 'cadastroCtrl'
		}).
		otherwise({
			redirectTo: '/home'
	});
}]);