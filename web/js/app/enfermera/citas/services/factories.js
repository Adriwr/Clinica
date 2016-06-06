app.
    /**
     * Factory para tener el resource de las enfermeras
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('EnfermeraCitasFactory', function($resource){
        var url = Routing.generate('api_get_enfermeras_citas');

        return $resource(url, null, {
            getCitasEnfermera  : {
                method  : 'GET',
                isArray : true,
                url     : url
            }
        });
    });