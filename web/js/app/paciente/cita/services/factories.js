app.
    /**
     * Factory para tener el resource de los citas
     * @param {type} $resource
     * @returns {undefined}
     */
    factory('AgendarPacienteFactory', function($resource){
        var urlCitas  = Routing.generate('api_get_paciente_citas');
        var urlDoc  = decodeURIComponent(Routing.generate('api_get_medico_nombre', { fecha : ":fecha" , consultorio : ":consultorio"}));

        return $resource(urlCitas, null, {
            getCitas  : {
                method  : 'GET',
                isArray : true,
                url     : urlCitas
            },
            getDoctor  : {
                method  : 'GET',
                isArray : true,
                params  : { fecha : '@fecha', consultorio : '@consultorio' },
                url     : urlDoc
            }

        });
    }).
    factory('ConsultarCitaFactory', function($resource){
        var urlDelete = decodeURIComponent(Routing.generate('api_delete_paciente_cita', { id : ":id"}));

        return $resource(urlDelete, null, {
            cancelDate      :  {
                method      : 'DELETE',
                params      : { id : '@id' },
                isArray     : false,
                url         : urlDelete
            }
        });
    })
;