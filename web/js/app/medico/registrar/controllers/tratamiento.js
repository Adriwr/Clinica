app.
    controller('TratamientoCtrl', function($scope, TratamientoFactory){
    $scope.medicamentos = [];
    $scope.recomendaciones = [];
    $scope.tratamiento = [];
    $scope.medicamento = {};
    $scope.recomendacion = {};
    $scope.url = location.href.split("/");
    $scope.idConsulta = $scope.url.pop();

    $scope.agregarMedicamento = function () {
        $scope.medicamentos.push(
            {
                'nombre':$scope.medicamento.nombre,
                'cantidad': $scope.medicamento.cantidad,
                'frecuencia':$scope.medicamento.frecuencia,
                'duracion': $scope.medicamento.duracion});
        $scope.medicamento = {};
    };
    
    $scope.agregarRecomendacion = function () {
        console.log($scope.recomendacion.descripcion);
        $scope.recomendaciones.push(
            {
                'descripcion': $scope.recomendacion.descripcion,
                'duracion': $scope.recomendacion.duracion
            }
        );
        $scope.recomendacion = {};
    };

    $scope.agregarTratamiento = function () {
        $scope.tratamiento = {
                'idConsulta': $scope.idConsulta,
                'medicamentos': $scope.medicamentos,
                'recomendaciones': $scope.recomendaciones
        };
        console.log($scope.tratamiento);
        TratamientoFactory.saveTratamiento( { tratamiento : $scope.tratamiento} ,  function(result){
            alert(result.mensaje);
            history.go(-1);
        } );

    };
});