app.
    /**
     * Control para manipular los datos de los gerentes
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param GerenteFactory    - Factory de para obtener los gerentes
     */
    controller('GerenteCtrl', function($scope, $modal, $filter, $rootScope, GerenteFactory) {

        $scope.datosTabla           = GerenteFactory.getMedicos();
        $scope.datosTablaHorario           = {};

    // Arreglo con los datos de las columnas que espera datatables
        $scope.aoCols =[
            {
                "mData"     : "nombre"
            },
            {
                "mData"     : function(data, typeCall, dataCall){
                    return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="verHorario('+data.posicion+')"></i></span>';
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

    $scope.aoColsHorario =[
        {
            "mData"     : "nombre"
        },
        /*{
            "mData"     : function(data, typeCall, dataCall){
                return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="verHorario('+data.posicion+')"></i></span>';
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

    $scope.eventsHorario =[

        /*{
         "mData"     : function(data, typeCall, dataCall){
         return '<span class="text-info"><i class="fa fa fa-pencil-square-o" ng-click="verHorario('+data.posicion+')"></i></span>';
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

        $scope.events = [
            {
                name    : 'verHorario',
                event   : function(posicion){
                    alert(posicion);
                    var id = $scope.datosTabla[posicion]['id'];
                    alert(id);
                    GerenteFactory.getHorarioMedico({ idMedico: id}, function(response){
                        alert(response.idMedico);
                    });
                }
            }


           /* {
                name    : 'editar',
                event   : function(id){
                }
            },
            {
                name    : 'eliminar',
                event   : function(id){
                }
            }*/
        ];


    })
;
