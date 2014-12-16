'use strict';

/**
 * @ngdoc service
 * @name binticsCmsApp.Svsnav
 * @description
 * # Svsnav
 * Service in the binticsCmsApp.
 */
angular.module('binticsCmsApp')
  .service('svsNav', function() {
  	var service = {
  		active: function(pagina) {
  			if(pagina === service.currentPage) {
  				return "active";
  			}
  			return "";
  		},
  		currentPage: ""
  	};
  	return service;
  });
