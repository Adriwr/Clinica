app.
/**
 * Control para manipular los datos de los cajeros
 * @param $scope            - Scope del control
 * @param $modal            - Directiva para crear un modal
 * @param $filter           - para formato de fechas
 * @param $rootScope        - Root Scope para comunicar con otros controles
 * @param CajeroFactory     - Factory de para obtener los cajeros
 */
controller('EnfermeraCtrl', function($scope, $modal, $filter, $rootScope, BuscarFactory) {
    $scope.datosTabla = BuscarFactory.getCitasEnfermera();

    // Arreglo con los datos de las columnas que espera datatables
    $scope.aoCols =[
        {
            "mData"     : "id"
        },
        {
            "mData"     : "consultorio"
        },
        {
            "mData"     : "medico"
        },
        {
            "mData"     : "fecha"
        },

       /* {
            "mData": "cantidad"
        },
        {
            "mData": function(data, typeCall, dataCall){
                return '<span class="text-success"><i class="fa fa-check-circle-o" ng-click="inc('+data.posicion+')"></i></span>' +
                    ' <span class="text-error"><i class="fa fa-check-circle-o" ng-click="dec('+data.posicion+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        },
        {
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-success"><i class="fa fa-check-circle-o" ng-click="eliminar('+data.posicion+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        }*/
    ];


    $scope.events = [
        /*{
            name    : 'agregar',
            event   : function(posicion){
                var rowToAdd = $scope.datosTabla[posicion];
                var size = $scope.datosProductosTabla.length;
                var exists = false;
                for(var i = 0;i<size;i++){
                    if(posicion == $scope.datosProductosTabla[i]['posicion']){
                        exists = true;
                    }
                }
                if(!exists){
                    var element = {
                        nombre: rowToAdd['nombre'],
                        cantidad: 1,
                        posicion: posicion
                    };
                    $scope.datosProductosTabla.push(
                        element
                    );
                }
            }
        }*/
    ];

});