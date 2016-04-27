/**
 * Created by Adriwr on 27/04/16.
 */
var app = angular.module('app',
        [
            'ngResource',
            'ui.bootstrap',
            'ngSanitize'
        ])
        .factory('httpInterceptor', function ($q, $rootScope, $log) {
            var loadingCount = 0;
            return {
                request: function (config) {
                    if(++loadingCount === 1) {
                        $rootScope.$broadcast('loading:progress');
                    }
                    return config || $q.when(config);
                },
                response: function (response) {
                    if(--loadingCount === 0) {
                        $rootScope.$broadcast('loading:finish');
                    }
                    return response || $q.when(response);
                },
                responseError: function (response) {
                    if(--loadingCount === 0) {
                        $rootScope.$broadcast('loading:finish');
                    }
                    return $q.reject(response);
                }
            };
        })
        .config(function($httpProvider, $interpolateProvider){
            $httpProvider.interceptors.push('httpInterceptor');
            // Se cambian los delimitadores default de angular para compatibilidad con twig
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        })
;
