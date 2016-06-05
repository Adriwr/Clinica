app.
/**
 * Control para manipular los datos de los cajeros
 * @param $scope            - Scope del control
 * @param $modal            - Directiva para crear un modal
 * @param $filter           - para formato de fechas
 * @param $rootScope        - Root Scope para comunicar con otros controles
 * @param CajeroFactory     - Factory de para obtener los cajeros
 */
controller('MedicamentoCtrl', function($scope, $modal, $filter, $rootScope, BuscarFactory) {


      
    $scope.datosTabla = BuscarFactory.getMedicamentos();


    $scope.datosProductosTabla = [];



    // Arreglo con los datos de las columnas que espera datatables
    $scope.aoColsProductos =[
        {
            "mData"     : "nombre"
        },

        {
            "mData"     : function(data){
                return '<input min="1" value="1" name="Cantidad'+data.posicion+'" type="number" class="text-success"/>';
            },
        },

        {
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-info"><i class="fa fa-check-circle-o" ng-click="eliminar('+data.posicion+')"></i></span>';
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


    $scope.aoCols =[
        {
            "mData"     : "nombre"
        },
        {
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="agregar('+data.posicion+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        }
        /*{
         "mData"     : function(data, typeCall, dataCall){
         return '<span class="text-success"><i class="fa fa-check-circle-o" ng-click="eliminar('+data.posicion+')"></i></span>';
         },
         "sClass"    : "table-icon-button",
         "bSortable" : false
         }*/

    ];

    $scope.events = [
        {
            name    : 'agregar',
            event   : function(posicion){
                if($scope.datosProductosTabla.indexOf($scope.datosTabla[posicion]) ==-1){
                    $scope.datosProductosTabla.push(
                        $scope.datosTabla[posicion]
                    );
                }else{
                    alert("Ya está seleccionado este producto");
                }
            }
        }
    ];

    $scope.events2 = [
        {
            name    : 'eliminar',
            event   : function(posicion){
            var index = $scope.datosProductosTabla.indexOf($scope.datosTabla[posicion]);
                $scope.datosProductosTabla.splice(index,1);
            }
        }
    ];






})
;
