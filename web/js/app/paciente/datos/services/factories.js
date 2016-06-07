app.
    /**
     * Factory para tener el resource de los productos
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('DatosPacienteFactory', function($resource){
        var urlDoc  = Routing.generate('api_get_pacientes');

        return $resource(urlDoc, null, {
            updatePat  : {
                method  : 'PUT',
                isArray : true,
                url     : urlDoc
            }

        });
    })
;