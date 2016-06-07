app.
    /**
     * Control para manipular los datos de las ares
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param DatosPacienteFactory  - Factory para actualizar datos del paciente
     */
    controller('DatosPacienteCtrl', function($scope,$log, $http, $modal, $filter, $rootScope, DatosPacienteFactory) {
        $scope.vistaCambiar = false;

        $scope.changeView = function(datos){
            $scope.vistaCambiar = true;

        };

        $scope.cancel = function(){
            $scope.vistaCambiar = false;
        };

        $scope.updatePat = function( ){
            //alert(cita);
            DatosPacienteFactory.updatePat( function(result){
                alert(result.mensaje);
                location.reload();
            });
        }
    })
;
