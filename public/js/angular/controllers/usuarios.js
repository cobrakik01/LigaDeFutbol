'use strict';

/**
 * @ngdoc function
 * @name binticsCmsApp.controller:UsuariosCtrl
 * @description
 * # UsuariosCtrl
 * Controller of the binticsCmsApp
 */
angular.module('binticsCmsApp')
  .controller('UsuariosCtrl', function ($scope, svsNav, svcUsuarios) {
  	svsNav.currentPage = "usuarios";
    $scope.cargarLista = function(){
      return svcUsuarios.query({limit: 5});
    };

    $scope.usuario;
  	$scope.paginate = $scope.cargarLista();

  	$scope.nuevo = function(){
  		svcUsuarios.save($scope.usuario).$promise.then(function(a){
  			$scope.alert.show(a.msg.msg, a.msg.type);
        $scope.paginate = $scope.cargarLista();
  		});
  	};
  });
