app.
/**
 * Control para manipular los datos de los cajeros
 * @param $scope            - Scope del control
 * @param $modal            - Directiva para crear un modal
 * @param $filter           - para formato de fechas
 * @param $rootScope        - Root Scope para comunicar con otros controles
 * @param CajeroFactory     - Factory de para obtener los cajeros
 */
controller('RegistrarMedicamentoCtrl', function($scope, $modal, $filter, $rootScope, MedicamentoFactory ) {
        $scope.medicamento = {
            activos : []
        };
        $scope.activo ={};

        $scope.addActivo = function(){
            $scope.medicamento.activos.push($scope.activo);
        };


        $scope.saveMedicamento = function(){
            MedicamentoFactory.saveMedicamento({ medicamento : $scope.medicamento });
        }


})
;
