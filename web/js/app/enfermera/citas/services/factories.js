app.
    /**
     * Factory para tener el resource de los cajeros
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('BuscarFactory', function($resource){
        var url = Routing.generate('api_get_enfermeras_citas');

        return $resource(url, null, {
            getCitasEnfermera  : {
                method  : 'GET',
                isArray : true,
                url     : url
            }
        });
    })
;