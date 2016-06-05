app.
/**
 * Control para manipular los datos de los cajeros
 * @param $scope            - Scope del control
 * @param $modal            - Directiva para crear un modal
 * @param $filter           - para formato de fechas
 * @param $rootScope        - Root Scope para comunicar con otros controles
 * @param CajeroFactory     - Factory de para obtener los cajeros
 */
controller('buscarMedicamentoCtrl', function($scope, $modal, $filter, $rootScope, BuscarFactory) {

    $scope.buscarMedicamento = function(){
        $scope.result = BuscarFactory.getMedicamento(function(result){
            $scope.datosTabla = result;
        });


    }

    $scope.datosProductosTabla = [];



    // Arreglo con los datos de las columnas que espera datatables
    $scope.aoCols2 =[
        {
            "mData"     : "nombre"
        }



        /*{
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-success"><i class="fa fa-check-circle-o" ng-click="eliminar('+data.posicion+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        }*/

    ];

    $scope.aoCols =[
        {
            "mData"     : "nombre"
        },
        {
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="agregar('+data.nombre+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        },
        /*{
         "mData"     : function(data, typeCall, dataCall){
         return '<span class="text-success"><i class="fa fa-check-circle-o" ng-click="eliminar('+data.posicion+')"></i></span>';
         },
         "sClass"    : "table-icon-button",
         "bSortable" : false
         }*/

    ];

    $scope.events2 = [

    ];

    $scope.events = [
        {
            name    : 'agregar',
            event   : function(nombre){
                $scope.datosProductosTabla.push({
                    'nombre':nombre
                });
            }
        }
    ];




})
;
