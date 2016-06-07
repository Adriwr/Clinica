app.
    /**
     * Control para manipular los datos de las ares
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param ConsultarCitaFactory  - Factory para eliminar citas
     */
    controller('ConsultarCitaCtrl', function($scope,$log, $http, $modal, $filter, $rootScope, ConsultarCitaFactory) {

        $scope.cancelDate = function( idCita ){
            //alert(cita);
            ConsultarCitaFactory.cancelDate({ id: idCita }, function(result){
                alert(result.mensaje);
                location.reload();
            });
        }
    })
;
