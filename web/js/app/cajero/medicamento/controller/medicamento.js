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
            "mData"     : "posicion",
            "bVisible"  : false

        },
        {
            "mData"     : "nombre"
        },


        {
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
        }

    ];


    $scope.aoCols =[
        {
            "mData"     : "nombre",
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
        }
    ];

    $scope.events2 = [
        {
            name    : 'eliminar',
            event   : function(posicion){
                var size = $scope.datosProductosTabla.length;
                var index = 0;
                for(var i = 0;i<size;i++){
                    if(posicion == $scope.datosProductosTabla[i]['posicion']){
                        break;
                    }
                    index++;
                }
                $scope.datosProductosTabla.splice(index,1);
            }
        },
        {
            name    : 'inc',
            event   : function(posicion){
                    var size = $scope.datosProductosTabla.length;
                    var index = 0;
                    for(var i = 0;i<size;i++){
                        if(posicion == $scope.datosProductosTabla[i]['posicion']){
                            break;
                        }
                        index++;
                    }
                var rowToReplace = $scope.datosProductosTabla[index];
                var newRow = $scope.datosProductosTabla[index];
                //checar la cantidad maxima del producto
                newRow["cantidad"]++;
                var newRow = {
                    "nombre":rowToReplace['nombre'],
                    "posicion":rowToReplace['posicion'],
                    "cantidad":rowToReplace['cantidad'],
                }
                $scope.datosProductosTabla.splice(index,1,newRow);
            }
        },
        {
            name    : 'dec',
            event   : function(posicion) {
                var size = $scope.datosProductosTabla.length;
                var index = 0;
                for (var i = 0; i < size; i++) {
                    if (posicion == $scope.datosProductosTabla[i]['posicion']) {
                        break;
                    }
                    index++;
                }

                var rowToReplace = $scope.datosProductosTabla[index];
                var newRow = $scope.datosProductosTabla[index];
                //checar la cantidad maxima del producto

                if (newRow["cantidad"] > 1) {
                    newRow["cantidad"]--;
                    var newRow = {
                        "nombre": rowToReplace['nombre'],
                        "posicion": rowToReplace['posicion'],
                        "cantidad": rowToReplace['cantidad'],
                    }
                    $scope.datosProductosTabla.splice(index, 1, newRow);
                }
            }
        }
    ];






})
;
