app.
    /**
     * Factory para tener el resource de los gerentes
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('GerenteFactory', function($resource){
        var urlGerente = Routing.generate('api_get_gerentes');

        return $resource(urlGerente, null, {
            getGerentes  : {
                method  : 'GET',
                isArray : true,
                url     : urlGerente
            }
        });
    })
;