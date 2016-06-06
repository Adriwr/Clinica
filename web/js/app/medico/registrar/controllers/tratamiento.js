app.controller('TratamientoCtrl', function($scope){
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
                'Nombre':$scope.medicamento.nombre,
                'Cantidad': $scope.medicamento.cantidad,
                'Frecuencia':$scope.medicamento.frecuencia,
                'Duracion': $scope.medicamento.duracion});
        $scope.medicamento = {};
    };
    
    $scope.agregarRecomendacion = function () {
        console.log($scope.recomendacion.descripcion);
        $scope.recomendaciones.push(
            {
                'Descripcion': $scope.recomendacion.descripcion,
                'Duracion': $scope.recomendacion.duracion
            }
        );
        $scope.recomendacion = {};
    };

    $scope.agregarTratamiento = function () {
        $scope.tratamiento.push(
            {
                'idConsulta': $scope.idConsulta,
                'Medicamentos': $scope.medicamentos,
                'Recomendaciones': $scope.recomendaciones
            }
        );
    };
});