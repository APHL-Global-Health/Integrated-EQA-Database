

var ReportModule = angular.module('ReportModule', ['angularUtils.directives.dirPagination', 'highcharts-ng']);
ReportModule.constant('serverURL', 'http://localhost:8082/reports/repository/');
ReportModule.controller("ReportController", function ($scope, $rootScope, $timeout, $http, serverURL) {



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
//
//            var divContents = $("#repoReport").html();
//            var printWindow = window.open('', '', 'height=400,width=800');
//            printWindow.document.write('<html><head><title>DIV Contents</title>');
//            printWindow.document.write('</head><body >');
//            printWindow.document.write(divContents);
//            printWindow.document.write('</body></html>');
//            printWindow.document.close();
//            printWindow.print();

            var printDoc = new jsPDF();
            printDoc.fromHTML($('#repoReport').get(0), 10, 10, {'width': 180});
            printDoc.autoPrint();
            printDoc.output("dataurlnewwindow");
//            $('#repoReport').tableExport(
//                    {
//
//                        type: 'pdf',
//                        pdfFontSize: '10',
//                        escape: 'false',
//                        bootstrap: true,
//                        tableName: 'repoReport',
//                        pdfLeftMargin: 10,
//                        htmlContent: 'true',
//                        consoleLog: 'false'
//                    }
//            );
        } catch (E) {
            console.log(E)
        }
    }
    $scope.reports.createGraphData = function () {


    }
    $scope.reports.exportToCSV = function () {
        try {
            $('#repoReport').tableExport(
                    {
                        type: 'csv',
                        escape: 'true'
                    }
            );
        } catch (E) {
            console.log(E)
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


    $scope.reports.showGraph = false;
    $scope.reports.graphType = 'column';
    $scope.reports.allPrograms = {};
    $scope.reports.getPrograms = function () {
        try {
            var url = serverURL + 'getprograms';
            $http
                    .get(url)
                    .success(function (data) {
                        console.log(data)
                        if (data.length > 0) {
                            $scope.reports.allPrograms = data;
                        }
                    })
                    .error(function (error) {

                    })
        } catch (E) {
            console.log(E)
        }

    }

    $scope.reports.changeGraphType = function (graphType) {
        $scope.reports.chartProgramResults.options.chart.type = graphType;
        $scope.reports.graphType = graphType;
    }
    
    $scope.reports.chartTypes = [
    {"id": "line", "title": "Line"},
    {"id": "spline", "title": "Smooth line"},
    {"id": "area", "title": "Area"},
    {"id": "areaspline", "title": "Smooth area"},
    {"id": "column", "title": "Column"},
    {"id": "bar", "title": "Bar"},
    {"id": "pie", "title": "Pie"},
    {"id": "scatter", "title": "Scatter"}
    ];
    $scope.reports.showGraphLoader = false;
    $scope.reports.searchedReport = 'Repository Graphs';
    $scope.reports.getBackendJason = function (reportFilter) {
        try {
            console.log(reportFilter);
            var result = serverURL + 'results';
            var filterData = {};
            $scope.reports.showGraphLoader = true;
            filterData.ProgramId = reportFilter.programId;
            filterData.ProviderId = reportFilter.providerID;
            filterData.dateRange = $("#dateRange").val();// reportFilter.dateRange;//$("#dateRange").val();

            $http.post(result, reportFilter)
                    .success(function (data) {
                        $scope.reports.showGraphLoader = false;
                        $scope.reports.showGraph = true;
                        $scope.reports.searchedReport = filterData.ProgramId;


                        $timeout(function () {
                            $scope.reports.chartProgramResults = {
                                options: {
                                    chart: {
                                        type: $scope.reports.graphType
                                    },
                                    plotOptions: {
                                        series: {
                                            stacking: ''
                                        }
                                    }
                                },

                                series: data,
                                title: {
                                    text: reportFilter.programId

                                },
                                credits: {
                                    enabled: true
                                },
                                xAxis: {
                                    tickInterval: 1,
                                    labels: {
                                        enabled: true,
                                        formatter: function () {
                                            return data[this.value].title;
                                        },
                                    }
                                },
                                loading: false,
                                size: {}
                            };
                            $scope.showGraph = false;

                        }, 30)
                    })
                    .error(function (error) {
                        console.log(error)
                    })

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






