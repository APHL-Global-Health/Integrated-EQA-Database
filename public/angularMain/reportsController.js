var reportsModule = angular.module('ReportModule');
reportsModule.constant('serverReportURL', 'http://localhost:8082/admin/reports/')
reportsModule.controller('ReportsController', function ($scope, $log, $http, serverSamplesURL, serverReportURL, EptServices, EptFactory, $timeout, loginDataCache) {

    $scope.$log = $log;
    $scope.reports = {};
    $scope.reports.loaderStatus = false;
    $scope.reports.currentReports = 'Issued Samples Report';

    $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/generalReport.html';
    $scope.reports.changeCurrentReport = function (report, htmlFile) {
        $scope.reports.loaderStatus = true;
        $scope.reports.currentReports = report;
        $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/' + htmlFile + '.html';
        $log.debug($scope.reports.loadedCurrentUrl);

    }
    $scope.reports.hideFaLoader = function () {
        $scope.reports.loaderStatus = false;
    }
    $scope.reports.generalRoundData = {};

    $scope.reports.whereGenRounds = {}
    $scope.reports.loader = '';

    function showAjaxLoader(status) {
        if (status) {
            $scope.reports.loader = 'fa-spinner';
        } else {
            $scope.reports.loader = '';
        }
    }

    function showResponseMessage(status) {
        var msg = '';
        if (status.status == 0) {

        }
        $.alert(status.msg)

    }

    $scope.reports.getGeneralRoundReport = function (where) {
        var url = serverReportURL + 'getgeneralroundreport';
        showAjaxLoader(true)
        $http.post(url, where)
            .success(function (response) {
                console.log(response)
                showAjaxLoader(false)
                if (response.status == 1) {
                    $scope.reports.generalRoundData = response.data;
                } else if (response.status == 0) {
                    showResponseMessage(response)
                } else {
                    $.alert('Unknown error occurred');
                }

            })
            .error(function (error) {
                showAjaxLoader(false)
            })

    }

})
