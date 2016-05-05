app.
    /**
     * Control para manipular los datos de las ares
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param ProductosFactory  - Factory de para obtener los productos
     */
    controller('ProductosCtrl', function($scope, $modal, $filter, $rootScope, ProductosFactory) {

        $scope.datosTabla           = ProductosFactory.getProductos();
        $scope.comunidad            = {};

        // Arreglo con los datos de las columnas que espera datatables
        $scope.aoCols =[
            {
                "mData"     : "nombre"
            },
            {
                "mData"     : "precio"
            },
            {
                "mData"     : "stock"
            }

        ];

        $scope.events = [];


    })
;
