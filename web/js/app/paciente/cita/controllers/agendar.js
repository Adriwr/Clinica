app.
    /**
     * Control para manipular los datos de las ares
     * @param $scope            - Scope del control
     * @param $modal            - Directiva para crear un modal
     * @param $filter           - para formato de fechas
     * @param $rootScope        - Root Scope para comunicar con otros controles
     * @param ProductosFactory  - Factory de para obtener los productos
     */
    controller('AgendarPacienteCtrl', function($scope,$log, $http, $modal, $filter, $rootScope, AgendarPacienteFactory) {
        var validViews = ['year', 'month', 'day', 'hour', 'minute'];
        var selectable = true;

        /* Bindable functions
         -----------------------------------------------*/
        $scope.beforeRender = beforeRender;
        $scope.changeConfig = changeConfig;
        $scope.checkboxOnTimeSet = checkboxOnTimeSet;
        $scope.configFunction = configFunction;
        $scope.getLocale = getLocale;
        $scope.guardianOnSetTime = guardianOnSetTime;
        $scope.inputOnTimeSet = inputOnTimeSet;
        $scope.renderOnBeforeRender = renderOnBeforeRender;
        $scope.renderOnClick = renderOnClick;
        $scope.setLocale = setLocale;

        moment.locale('es');
        $scope.dateRangeStart = new Date();
        $scope.cita = {
            fecha: ""
        };
        $scope.$watch('cita.fecha', function() {
            $scope.cita.fecha = $filter('date')($scope.cita.fecha, 'dd-MM-yyyy h:mm a');
        });

        $scope.config = {
            minuteStep: 30
        };

        function checkboxOnTimeSet() {
            $scope.data.checked = false;
        }

        function inputOnTimeSet(newDate) {
            // If you are not using jQuery or bootstrap.js,
            // this will throw an error.
            // However, can write this function to take any
            // action necessary once the user has selected a
            // date/time using the picker
            $log.info(newDate);
            $('#dropdown3').dropdown('toggle');
        }

        function getLocale() {
            return moment.locale();
        }

        function setLocale(newLocale) {
            moment.locale(newLocale);
        }

        function guardianOnSetTime($index, guardian, newDate, oldDate) {
            $log.info($index);
            $log.info(guardian.name);
            $log.info(newDate);
            $log.info(oldDate);
            angular.element('#guardian' + $index).dropdown('toggle');
        }

        function beforeRender($dates) {
            var index = Math.ceil($dates.length / 2);
            $log.info(index);
            $dates[index].selectable = false;
        }

        function configFunction() {
            return {
                startView: 'month'
            };
        }

        function changeConfig() {
            var newIndex = validViews.indexOf($scope.config.configureOnConfig.startView) + 1;
            console.log(newIndex);
            if (newIndex >= validViews.length) {
                newIndex = 0;
            }
            $scope.config.configureOnConfig.startView = validViews[newIndex];
            $scope.$broadcast('config-changed');
        }

        function renderOnBeforeRender($dates) {
            angular.forEach($dates, function (dateObject) {
                dateObject.selectable = selectable;
            });
        }

        function renderOnClick() {
            selectable = (!selectable);
            $scope.$broadcast('valid-dates-changed');
        }

        $scope.beforeRender = function ($view, $dates, $leftDate, $upDate, $rightDate) {
            if ($scope.dateRangeStart) {
                var activeDate = moment($scope.dateRangeStart).subtract(1, $view).add(1, 'minute');
                for (var i = 0; i < $dates.length; i++) {
                    if ($dates[i].localDateValue() <= activeDate.valueOf()) {
                        $dates[i].selectable = false;
                    }
                }
            }
        };
    })
;
