'use strict';

/**
 * @ngdoc function
 * @name binticsCmsApp.controller:UsuariosCtrl
 * @description
 * # UsuariosCtrl
 * Controller of the binticsCmsApp
 */
angular.module('binticsCmsApp')
  .controller('PaginasCtrl', function ($scope, svsNav, svcPaginas) {
  	svsNav.currentPage = "paginas";
    $scope.cargarLista = function(){
      return svcPaginas.query({limit: 5});
    };

    $scope.pagina;
  	$scope.paginate = $scope.cargarLista();

  	$scope.nuevo = function(){
  		svcPaginas.save($scope.pagina).$promise.then(function(a){
  			$scope.alert.show(a.msg.msg, a.msg.type);
        $scope.paginate = $scope.cargarLista();
  		}).catch(function(a){
        console.log(a);
      });
  	};
  });
