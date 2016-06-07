app.
    /**
     * Factory para tener el resource de los gerentes
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('GerenteFactory', function($resource){
        var url = Routing.generate('api_get_gerente_medicos');
        var url2 = Routing.generate('api_get_gerente_horario_medico');

        return $resource(url, null, {
            getMedicos  : {
                method  : 'GET',
                isArray : true,
                url     : url
            },
            getHorarioMedico  : {
                method  : 'GET',
                isArray : true,
                url     : url2,
                data    : {}
            }
        });
    })
;