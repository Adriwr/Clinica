app.
    /**
     * Factory para tener el resource de los cajeros
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('BuscarFactory', function($resource){
        var url = Routing.generate('api_get_medicamentos');
        var url2 = Routing.generate('api_post_medicamento');
        return $resource(url, null, {
            getMedicamentos  : {
                method  : 'GET',
                isArray : true,
                url     : url
            },
            saveMedicamento:{
                method: 'POST',
                isArray: false,
                url : url2,
                data: {}
            }
        });
    })
    .factory('MedicamentoFactory', function($resource){
        var url = Routing.generate('api_');

        return $resource(url, null, {
            saveMedicamento  : {
                method  : 'POST',
                isArray : true,
                url     : url,
                data    : {}
            }
        });
    })
;