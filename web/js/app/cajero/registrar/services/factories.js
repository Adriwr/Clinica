app.
    /**
     * Factory para tener el resource de los cajeros
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('CajeroFactory', function($resource){
        var url = Routing.generate('api_get_cajeros');

        return $resource(url, null, {
            getCajeros  : {
                method  : 'GET',
                isArray : true,
                url     : url
            }
        });
    })
;