var graphsController = angular.module('ReportModule');
// graphsController.config(function ($httpProvider, $routeProvider, $locationProvider) {
//     $httpProvider.defaults.headers.common = {};
//     $httpProvider.defaults.headers.post = {};
//     $httpProvider.defaults.headers.put = {};
//     $httpProvider.defaults.headers.patch = {};
//     $locationProvider.hashPrefix('');
//
//     $routeProvider.when('/labs', {
//         templateUrl: '../partialViews/LabIndex.html'
//     });

graphsController.controller('GraphsController', function ($scope, $http, $location, serverSamplesURL, EptServices, $timeout) {
    $scope.Graphs = {};

})