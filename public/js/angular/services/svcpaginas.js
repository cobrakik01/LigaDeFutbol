'use strict';

/**
 * @ngdoc service
 * @name binticsCmsApp.Svcusuarios
 * @description
 * # svcPaginas
 * Service in the binticsCmsApp.
 */
angular.module('binticsCmsApp')
  .service('svcPaginas', function($resource, url) {
  	var service = $resource(url.paginas, {}, {
  		query:  {method:'GET', isArray:false},
  		save: {method: 'POST'}
  	});
  	return service;
  });
