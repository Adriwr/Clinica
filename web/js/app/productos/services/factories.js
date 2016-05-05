app.
    /**
     * Factory para tener el resource de los productos
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('ProductosFactory', function($resource){
        var urlProductos = Routing.generate('api_get_productos');

        return $resource(urlProductos, null, {
            getProductos  : {
                method  : 'GET',
                isArray : true,
                url     : urlProductos
            }
        });
    })
;