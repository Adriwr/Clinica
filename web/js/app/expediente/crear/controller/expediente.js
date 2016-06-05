app.
    /**
     * Control para manipular los datos de los medicos
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     */
    controller('ExpedienteCtrl', function($scope, $modal, $filter, $rootScope, ExpedienteFactory) {
        var url = location.href.split("/");
        $scope.expediente = {
            id : url.pop(),
            alergias : [],
            antecedentesFam : [],
            antecedentesPer : {},
            anticonceptivos : [],
            cirugias        : [],
            embarazos       : [],
            enfermedades    : [],
            mastografias    : [],
            papanicolaous   : []
        };
        //alert($scope.expediente.id);
        $scope.enfermedad = {};
        $scope.alergia = {};
        $scope.antecedenteFamiliar = {};
        $scope.anticonceptivo = {};
        $scope.cirugia = {};
        $scope.embarazo = {};
        $scope.mastografia = {};
        $scope.papanicolaou = {};

        $scope.colsPapanicolaous =[
            { "mData"     : "year" }, { "mData"     : "notas" }
        ];

        $scope.eventsPapanicolaous = [];

        $scope.colsMastografias =[
            { "mData"     : "year" }, { "mData"     : "notas" }
        ];

        $scope.eventsMastografias = [];

        $scope.colsEnfermedades =[
            { "mData"     : "codigo" }, { "mData"     : "nombre" }, { "mData"     : "fecha" } , { "mData"     : "tratada" }
        ];

        $scope.eventsEmfermedades = [];

        $scope.colsEmbarazos =[
            { "mData"     : "fecha" }, { "mData"     : "descripcion" }
        ];

        $scope.eventsEmbarazos = [];

        $scope.colsCirugias =[
            { "mData"     : "tipo" }, { "mData"     : "year" }, { "mData"     : "lugar" }, { "mData"     : "estado" }
        ];

        $scope.eventsCirugias = [];


        $scope.colsAnteFam =[
            { "mData"     : "nombre" }, { "mData"     : "sexo" }, { "mData"     : "edad" }, { "mData"     : "parentesco" }
        ];

        $scope.eventsAnteFam = [];

        $scope.colsAnticonceptivos =[
            { "mData"     : "nombre" }
        ];

        $scope.eventsAnticonceptivos = [];

        $scope.colsAlergias =[
            { "mData"     : "sustancia" }, { "mData"     : "fecha" }, { "mData"     : "controlada" }
        ];

        $scope.eventsAlergias = [];

        $scope.addEnfermedad = function(){

            $scope.expediente.enfermedades.push(
               $scope.enfermedad
            );
            $scope.enfermedad = {};
        };

        $scope.addAlergia = function(){
            $scope.expediente.alergias.push(
                $scope.alergia
            );
            $scope.alergia = {};
        };

        $scope.addFamiliar = function(){
            $scope.expediente.antecedentesFam.push(
                $scope.antecedenteFamiliar
            );
            $scope.antecedenteFamiliar = {};
        };


        $scope.addAnticonceptivo = function(){
            $scope.expediente.anticonceptivos.push(
                $scope.anticonceptivo
            );
            $scope.anticonceptivo = {};
        };


        $scope.addCirugia = function(){
            $scope.expediente.cirugias.push(
                $scope.cirugia
            );
            $scope.cirugia = {};
        };


        $scope.addEmbarazo = function(){
            $scope.expediente.embarazos.push(
                $scope.embarazo
            );
            $scope.embarazo = {};
        };


        $scope.addMastografia = function(){
            $scope.expediente.mastografias.push(
                $scope.mastografia
            );
            $scope.mastografia = {};
        };

        $scope.addPapani = function(){
            $scope.expediente.papanicolaous.push(
                $scope.papanicolaou
            );
            $scope.papanicolaou = {};
        };

        $scope.enviarDatos = function(){
            alert("fin papu");
            ExpedienteFactory.postExpediente({ expediente : $scope.expediente }, function(result){
                console.log(result);
            });
        };



    })
;
