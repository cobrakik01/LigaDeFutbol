'use strict';

/**
 * @ngdoc function
 * @name binticsCmsApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the binticsCmsApp
 */
angular.module('binticsCmsApp')
  .controller('MainCtrl', function ($scope, svsNav) {
  	svsNav.currentPage = "inicio";
  });
