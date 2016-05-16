app.
    /**
     * Factory para tener el resource de las enfermeras
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('EnfermeraFactory', function($resource){
        var url = Routing.generate('api_get_enfermeras');

        return $resource(url, null, {
            getEnfermeras  : {
                method  : 'GET',
                isArray : true,
                url     : url
            }
        });
    })
;