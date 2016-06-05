app.
    /**
     * Factory para tener el resource de los gerentes
     * @param {type} $resource
     * @returns {undefined}
     */
        factory('ExpedienteFactory', function($resource){
        var url = Routing.generate('api_post_expediente');

        return $resource(url, null, {
            postExpediente :  {
                method:'POST',
                data: {},
                isArray: false,
                url : url
            }
        });
    })
;