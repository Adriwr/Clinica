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
    $scope.Prueba = "0";

    // Arreglo con los datos de las columnas que espera datatables
    $scope.aoColsProductos =[
        {
            "mData"     : "posicion",
            "bVisible"  : false
        },
        {
            "mData"     : "nombreComercial"
        },
        {
            "mData": "cantidad"
        },
        {
            "mData": "precio"
        },
        {
            "mData": "existencias"
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
            "mData"     : "nombreComercial",
        },
        {
            "mData"     : "precio",
        },
        {
            "mData"     : "existencias",
        },
        {
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="agregar('+data.posicion+')"></i></span>';
            },
            "sClass"    : "table-icon-button",
            "bSortable" : false
        }
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
                        nombreComercial: rowToAdd['nombreComercial'],
                        cantidad: 1,
                        precio: rowToAdd['precio'],
                        existencias: rowToAdd['existencias'],
                        posicion: posicion
                    }
                    var currentTotal = 0;
                    currentTotal += element.cantidad * element.precio.substr(1  );
                    for(var i = 0;i<$scope.datosProductosTabla.length;i++){
                        var precio = $scope.datosProductosTabla[i]['precio'];
                        precio=precio.substring(1);
                        currentTotal += $scope.datosProductosTabla[i]['cantidad'] * parseFloat(precio);
                    }
                    $scope.Prueba = currentTotal.toString();
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
                var currentTotal = parseFloat($scope.Prueba);
                var precio =$scope.datosProductosTabla[i]['precio'];
                precio=precio.substring(1);
                currentTotal  = currentTotal - precio * $scope.datosProductosTabla[i]['cantidad'];
                $scope.Prueba = currentTotal.toString();
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
                //checar la cantidad maxima del producto

                if(rowToReplace["cantidad"] < rowToReplace["existencias"]){
                    var newRow = {
                        "nombreComercial": rowToReplace['nombreComercial'],
                        "posicion": rowToReplace['posicion'],
                        "cantidad": rowToReplace['cantidad']+1,
                        "precio": rowToReplace['precio'],
                        "existencias": rowToReplace['existencias']
                    }
                    var currentTotal = parseFloat($scope.Prueba);
                    var precio =newRow.precio;
                    precio=precio.substring(1);
                    currentTotal  = currentTotal + parseFloat(precio);
                    $scope.Prueba = currentTotal.toString();
                    $scope.datosProductosTabla.splice(index,1,newRow);
                 }else{
                    alert("Ha llegado a la máxima cantidad de medicamentos disponibles en almacén...");
                }
            }
        },
        {
            name    : 'dec',
            event   : function(posicion) {
                var size = $scope.datosProductosTabla.length;
                var index = 0;
                for(var i = 0;i<size;i++){
                    if(posicion == $scope.datosProductosTabla[i]['posicion']){
                        break;
                    }
                    index++;
                }
                var rowToReplace = $scope.datosProductosTabla[index];
                //checar la cantidad maxima del producto

                if(rowToReplace["cantidad"] > 1){
                    var newRow = {
                        "nombreComercial": rowToReplace['nombreComercial'],
                        "posicion": rowToReplace['posicion'],
                        "cantidad": rowToReplace['cantidad']-1,
                        "precio": rowToReplace['precio'],
                        "existencias": rowToReplace['existencias']
                    }
                    var currentTotal = parseFloat($scope.Prueba);
                    var precio =newRow.precio;
                    precio=precio.substring(1);
                    currentTotal  = currentTotal - parseFloat(precio);
                    $scope.Prueba = currentTotal.toString();
                    $scope.datosProductosTabla.splice(index,1,newRow);

                }
            }
        }
    ];

    $scope.realizarCompra = function(){
        var monto = $scope.Prueba;
        alert(monto);
        BuscarFactory.saveMedicamento({ medicamentos: $scope.datosProductosTabla, monto: parseFloat(monto)}, function(response){
            alert(response.mensaje);
            location.reload();
        });
    };
});