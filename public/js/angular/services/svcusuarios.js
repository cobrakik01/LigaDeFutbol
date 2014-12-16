'use strict';

/**
 * @ngdoc service
 * @name binticsCmsApp.Svcusuarios
 * @description
 * # Svcusuarios
 * Service in the binticsCmsApp.
 */
angular.module('binticsCmsApp')
  .service('svcUsuarios', function($resource, url) {
  	var service = $resource(url.usuarios, {}, {
  		query:  {method:'GET', isArray:false},
  		save: {method: 'POST'}
  	});
  	return service;
  });
