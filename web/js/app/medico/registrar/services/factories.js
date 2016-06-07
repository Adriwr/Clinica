app.
    /**
     * Factory para tener el resource de los gerentes
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('MedicoFactory', function($resource){
        var url = Routing.generate('api_get_medicos');

        return $resource(url, null, {
            getMedicos  : {
                method  : 'GET',
                isArray : true,
                url     : url
            }
        });
    }).
    factory('TratamientoFactory', function($resource){
        var url = Routing.generate('api_post_medico_tratamiento');

        return $resource(url, null, {
            saveTratamiento  : {
                method  : 'POST',
                isArray : false,
                url     : url,
                data    : {}
            }
        });
    })
;