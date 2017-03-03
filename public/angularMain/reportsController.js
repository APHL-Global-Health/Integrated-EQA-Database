var reportsModule = angular.module('ReportModule')
reportsModule.controller('ReportsController', function ($scope, $log, $http, serverSamplesURL, EptServices, EptFactory, $timeout, loginDataCache) {

    $scope.$log = $log;
    $scope.reports = {};
    $scope.reports.loaderStatus = true;
    $scope.reports.currentReports = 'Issued Samples Report';
    $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/issuedSamplesReport.html';
    $scope.reports.changeCurrentReport = function (report, htmlFile) {
        $scope.reports.loaderStatus = true;
        $scope.reports.currentReports = report;
        $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/'+htmlFile + '.html';
        $log.debug($scope.reports.loadedCurrentUrl);

    }
    $scope.reports.hideFaLoader = function () {
        $scope.reports.loaderStatus = false;
    }


})
