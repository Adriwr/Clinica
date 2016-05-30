app.
    /**
     * Factory para tener el resource de los productos
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('AgendarPacienteFactory', function($resource){
        var urlCitas  = decodeURIComponent(Routing.generate('api_get_paciente_citas', { month : ":month"}));
        var urlDoc  = decodeURIComponent(Routing.generate('api_get_medico_nombre', { fecha : ":fecha" , consultorio : ":consultorio"}));

        return $resource(urlCitas, null, {
            getCitas  : {
                method  : 'GET',
                isArray : true,
                params  : { month : '@month' },
                url     : urlCitas
            },
            getDoctor  : {
                method  : 'GET',
                isArray : true,
                params  : { fecha : '@fecha', consultorio : '@consultorio' },
                url     : urlDoc
            }

        });
    })
;