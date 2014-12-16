'use strict';

/**
 * @ngdoc overview
 * @name binticsCmsApp
 * @description
 * # binticsCmsApp
 *
 * Main module of the application.
 */
angular
  .module('binticsCmsApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'kendo.directives'
  ])
  .constant('url', {
    usuarios: "http://localhost:8000/ws/usuarios",
    paginas: "http://localhost:8000/ws/paginas"
  })
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'http://localhost:8000/admin/home.html',
        controller: 'MainCtrl'
      })
      .when('/acercade', {
        templateUrl: 'http://localhost:8000/admin/acercade.html',
        controller: 'AboutCtrl'
      })
      .when('/usuarios', {
        templateUrl: 'http://localhost:8000/admin/usuarios/home.html',
        controller: 'UsuariosCtrl'
      })
      .when('/paginas', {
        templateUrl: 'http://localhost:8000/admin/paginas/home.html',
        controller: 'PaginasCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  }).controller('NavCtrl', function($scope, svsNav){
    $scope.active = function(pagina) {
      return svsNav.active(pagina);
    };
  });
