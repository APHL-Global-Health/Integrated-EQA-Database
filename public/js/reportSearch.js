

var ReportModule = angular.module('ReportModule', ['angularUtils.directives.dirPagination']);

ReportModule.controller("ReportController", function ($scope, $rootScope, $timeout) {



    $scope.reports = {};
    $scope.reports.repositoryData = {};
    $scope.reports.reportShowTable = false;
    $scope.reports.showLoader = false;
    $scope.reports.doAjaxRequest = function () {
        $scope.reports.showLoader = true;
        $scope.reports.reportShowTable = false;
        var searchColumns = {};
        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#dateRange").val() : null;
        searchColumns.provider = angular.isDefined($("#provider").val()) ? $("#dateRange").val() : null;
//        console.log(searchColumns);
        $.ajax({
            url: "http://localhost:8082/reports/repository/test",
            data: {
                dateRange: $("#dateRange").val(),
                reportType: $("#reportType").val(),
                ProviderID: $("#provider").val()
            },
            type: "POST",
            success: function (data) {
                //              console.log(data);
//                    var res = JSON.parse(data);
//                    console.log(res);
                $scope.reports.createDataTable(data)

            },
            error: function (error) {
                $scope.reports.showLoader = false;
            }
        });
    }

    $scope.reports.createDataTable = function (tableData) {
        tableData = JSON.parse(tableData)
        $scope.reports.repositoryData = tableData;
        if ($scope.reports.repositoryData.length > 0) {
            $scope.reports.reportShowTable = true;
            $scope.reports.showLoader = false;
        }
        $scope.$apply();
    }
    $scope.reports.exportToPDF = function () {
        try {
            $('#repoReport').tableExport(
                    {type:'pdf',pdfFontSize:'7',escape:'false'}
            );
        } catch (E) {
            console.log(E)
        }
    }
    $scope.reports.exportToCSV = function () {
        try {
            $('#repoReport').tableExport(
                    {type: 'csv', escape: 'false'}
            );
        } catch (E) {

        }
    }

    $scope.reports.exportToExcelFile = function () {
        try {
            $('#repoReport').tableExport(
                    {type: 'excel', escape: 'false'}
            );
        } catch (E) {

        }
    }
    $scope.reports.exportToExcel = function (filename, id) {
        alert("called");
        $scope.reports.actionMenu = 0;
        var date = new Date();

        $timeout(function () {


            filename += '-' + date;
            $("#" + id).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: filename,
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });
            $scope.reports.actionMenu = 1;
        }, 100)

    }

}).directive('pagination', function () {
    return {
        template: "<div class='text-right pull-right'><dir-pagination-controls boundary-links='true' pagination-id='dataPagination' on-page-change='pageChangeHandler(newPageNumber)'" +
                ">" +
                "  <ul class='pagination' ng-if='1 < pages.length'>" +
                "<li ng-if=iboundaryLinks' ng-class='{ disabled : pagination.current == 1 }'>" +
                " <a href='' ng-click='setCurrent(1)'>&laquo;</a>" +
                "</li>" +
                "<li ng-if='directionLinks' ng-class='{ disabled : pagination.current == 1 }' class='ng-scope'>" +
                "<a href='' ng-click='setCurrent(pagination.current - 1)' class='ng-binding'>‹</a>" +
                " </li>" +
                "<li ng-repeat='pageNumber in pages track by $index' ng-class='{ active : pagination.current == pageNumber, disabled : pageNumber == '...' }'>" +
                "<a href='' ng-click='setCurrent(pageNumber)'>{{ pageNumber }}</a>" +
                "</li>" +
                "<li ng-if='directionLinks' ng-class='{ disabled : pagination.current == pagination.last }' class='ng-scope'>" +
                " <a href=''' ng-click='setCurrent(pagination.current + 1)' class='ng-binding'>›</a>" +
                "</li>" +
                "<li ng-if='boundaryLinks'  ng-class='{ disabled : pagination.current == pagination.last }'>" +
                "<a href='' ng-click='setCurrent(pagination.last)'>&raquo;</a>" +
                "</li>" +
                "</ul> " +
                +"</dir-pagination-controls>  </div>"

    }


})






