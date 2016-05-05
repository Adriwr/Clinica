app.
    /**
     * Directiva para mostrar datos en una tabla DataTables
     * @returns {_L19.Anonym$3}
     */
    directive('datatables', function($compile){
        var linker = function($scope, element, attrs) {
            var table;
            /**
             * Se observa el contenido de la tabla
             */
            $scope.$watchCollection('content', function(newData, old){
                if( newData !== undefined ){
                    element.DataTable().clear().rows.add( newData).draw();
                }
            });

            /**
             * Se observa el contenido de la tabla
             */
            $scope.editElement = function(idx){
                $scope.edit(idx);
            };

            $scope.deleteElement = function(idx){
                $scope.remove(idx);
            };

            $scope.changeElement = function(idx){
                $scope.change(idx);
            };

            $scope.$watch('dtSearch', function(newData){
                if( newData !== undefined ){
                    table.search(newData).draw();
                }
            });

            /**
             * Se agregan las funciones disponibles de la tabla
             */
            if($scope.events !== undefined){
                $scope.events.forEach(function(element, index){
                    $scope[element.name] = function(id){
                        $scope.events[index].event(id);
                    };
                });
            }

            table = element.DataTable( {
                "bLengthChange"     : $scope.dtLength !== undefined ? $scope.dtLength : true,
                "bFilter"           : $scope.dtFilter !== undefined ? $scope.dtFilter : true ,
                "paging"            : $scope.dtPaging !== undefined ? $scope.dtPaging : true ,
                "serrMode" : "none" ,
                "aoColumns"         : $scope.columns,
                "fnDrawCallback"    : function( oSettings ) {
                    $compile(element.contents())($scope);
                },
                "language"          : {
                    "sProcessing":     "Procesando...",
                        "sLengthMenu":     "_MENU_",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                        "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

            $('.dataTables_filter label input[type=search]').attr('placeholder', 'Buscar')
        };

        return {
            restrict: 'A',
            link : linker,
            scope: {
                content  : '=',
                events   : '=',
                columns  : '=',
                dtFilter : '=',
                dtLength : '=',
                dtPaging : '=',
                dtSearch : '='
            }
        };
    });