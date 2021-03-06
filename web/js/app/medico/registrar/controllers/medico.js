app.
    /**
     * Control para manipular los datos de los medicos
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param MedicoFactory    - Factory de para obtener los medicos
     */
    controller('MedicoCtrl', function($scope, $modal, $filter, $rootScope, MedicoFactory) {

        $scope.datosTabla           = MedicoFactory.getMedicos();

        // Arreglo con los datos de las columnas que espera datatables
        $scope.aoCols =[
            {
                "mData"     : "nombre"
            },
            {
                "mData"     : "email"
            },
            {
                "mData"     : function(data, typeCall, dataCall){
                    return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="editar('+data.posicion+')"></i></span>';
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

        $scope.events = [
            {
                name    : 'editar',
                event   : function(id){
                }
            },
            {
                name    : 'eliminar',
                event   : function(id){
                }
            }
        ];


    })
;
