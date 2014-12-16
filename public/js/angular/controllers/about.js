'use strict';

/**
 * @ngdoc function
 * @name binticsCmsApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the binticsCmsApp
 */
angular.module('binticsCmsApp')
  .controller('AboutCtrl', function ($scope, svsNav) {
  	svsNav.currentPage = "acercade";
  });
