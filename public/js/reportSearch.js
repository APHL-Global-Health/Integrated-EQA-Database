

var ReportModule = angular.module('ReportModule', ['angularUtils.directives.dirPagination', 'highcharts-ng']);
ReportModule.constant('serverURL', 'http://localhost:8082/reports/repository/');
ReportModule.controller("ReportController", function ($scope, $rootScope, $timeout, $http, serverURL) {



    $scope.reports = {};
    $scope.reports.itemsPerPage = 40;
    $scope.reports.repositoryData = {};
    $scope.reports.reportShowTable = false;
    $scope.reports.showLoader = false;



    $scope.reports.doAjaxRequest = function () {


        $scope.reports.showLoader = true;
        $scope.reports.reportShowTable = false;
        var searchColumns = {};
        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
//        console.log(searchColumns);
        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
            $scope.reports.showLoader = false;
        } else {
            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {

                updateGraphMessages("No records found", false, 'btn-warning');
                $scope.reports.showGraphLoader = true;
                var url = serverURL + 'test';
                $http
                        .post(url, searchColumns)
                        .success(function (data) {
                            $scope.reports.createDataTable(data)

                            console.log(data);

                        })
                        .error(function (error) {

                            updateGraphMessages("Server error,please reload page", true, 'btn-warning');
                            $scope.reports.showLoader = false;
                        })


            } else {
                $scope.reports.showLoader = false;
                updateGraphMessages("Please choose a provider", true, 'btn-danger');
            }

        }
    }

    $scope.reports.createDataTable = function (tableData) {

        $scope.reports.repositoryData = tableData;
        if ($scope.reports.repositoryData.length > 0) {
            $scope.reports.reportShowTable = true;

        } else {

        }
        $scope.reports.showLoader = false;
        //$scope.$apply();
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
                        updateGraphMessages("Server error,please reload page", true, 'btn-warning');
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
      //  {"id": "line", "title": "Line"},
        {"id": "spline", "title": "Smooth line"},
       // {"id": "area", "title": "Area"},
       // {"id": "areaspline", "title": "Smooth area"},
        {"id": "column", "title": "Column"},
        {"id": "bar", "title": "Bar"},
       // {"id": "pie", "title": "Pie"},
        {"id": "scatter", "title": "Scatter"}
    ];
    $scope.reports.chartProgramResults = {};
    $scope.reports.loadGraphParameters = function (data, title) {
        console.log(data)
        $scope.reports.chartProgramResults = {};
        if (data.length > 0) {
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
                        text: title

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
        } else {
            updateGraphMessages("No records found", true, 'btn-warning');
        }

    }

    $scope.reports.reportType = '';
    $scope.reports.graphMessage = '';
    $scope.reports.graphMessageStatus = false;
    $scope.reports.graphMessageCSS = 'btn-info';

    function updateGraphMessages(message, status, css) {
        $scope.reports.graphMessage = message;
        $scope.reports.graphMessageStatus = status;
        $scope.reports.graphMessageCSS = css;
    }
    $scope.reports.dateRange = '';
    $scope.reports.showGraphClicked = function (graphType, graphName) {
        $scope.reports.searchedReport = '';
        $scope.reports.reportTypes = graphName;
        $scope.reports.showGraph = false;
        var filterData = {};
        filterData.dateRange = $("#dateRange").val();
        filterData.ProviderId = $("#provider").val();
        filterData.ProgramId = $("#program").val();
        $scope.reports.dateRange = filterData.dateRange;

        if (filterData.dateRange == '' || angular.isUndefined(filterData.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
            updateGraphMessages("listening to action", false, '');
            if (graphType == 'Round-tests Graph') {

                $scope.reports.getRoundIdSample(filterData);
            }
            if (graphType == 'Program-lab count Graph') {
                $scope.reports.getProgramsAgainstLabCount(filterData);
            }
            if (graphType == 'Provider-lab Graph') {
                $scope.reports.getProviderAgainstLabCount(filterData);
            }
            if (graphType == 'Lab-samples Graph') {
                $scope.reports.getLabAgainstSample(filterData);
            }

        }
    }
    $scope.reports.reportFilter = {};


    $scope.reports.getLabAgainstSample = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'labagainstsamples';
            $http
                    .post(url, filterData)
                    .success(function (data) {
                        $scope.reports.showGraph = true;

                        $scope.reports.loadGraphParameters(data, 'Lab Against Sample Graph');
                        $scope.reports.showGraphLoader = false;
                        console.log(data);

                    })
                    .error(function (error) {
                        updateGraphMessages("Server error,please reload page", true, 'btn-warning');
                    })
        } catch (e) {
            console.log(e)
        }
    }


    $scope.reports.getRoundIdSample = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'samples';
            $http
                    .post(url, filterData)
                    .success(function (data) {
                        $scope.reports.showGraph = true;

                        $scope.reports.loadGraphParameters(data, 'Round Against Test Count Graph');
                        $scope.reports.showGraphLoader = false;
                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showGraphLoader = false;
                        updateGraphMessages("Server error,please reload page", true, 'btn-warning');
                    })
        } catch (e) {
            console.log(e)
        }
    }



    $scope.reports.getProviderAgainstLabCount = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'providervslabs';
            console.log(filterData);
            $http
                    .post(url, filterData)
                    .success(function (data) {
                        console.log(data)
                        $scope.reports.showGraph = true;

                        $scope.reports.loadGraphParameters(data, 'Provider Against Lab Count Graph');
                        $scope.reports.showGraphLoader = false;
                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showGraphLoader = false;
                        updateGraphMessages("Server error,please reload page", true, 'btn-warning');

                    })
        } catch (e) {
            console.log(e)
        }
    }







    $scope.reports.getProgramsAgainstLabCount = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'programsvslabs';
            console.log(filterData);
            $http
                    .post(url, filterData)
                    .success(function (data) {
                        console.log(data)
                        $scope.reports.showGraph = true;

                        $scope.reports.loadGraphParameters(data, 'Program Against Lab Count Graph');
                        $scope.reports.showGraphLoader = false;
                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showGraphLoader = false;
                        updateGraphMessages("Server error,please reload page", true, 'btn-warning');

                    })
        } catch (e) {
            console.log(e)
        }
    }



    $scope.reports.showGraphLoader = false;
    $scope.reports.searchedReport = 'Repository Graphs';
    $scope.reports.getBackendJason = function (reportFilter) {
        try {
            console.log(reportFilter);
            var result = serverURL + 'results';
            var filterData = {};
            $scope.reports.showGraphLoader = true;
            filterData.ProgramId = $("#program").val();
            filterData.ProviderId = reportFilter.providerID;
            filterData.dateRange = $scope.reports.dateRange;
            console.log(filterData);
            if (filterData.ProgramId != '' && angular.isDefined(filterData.ProgramId)) {
                updateGraphMessages("please select a program to proceed", false, 'btn-danger')
                $http.post(result, filterData)
                        .success(function (data) {
                            $scope.reports.showGraphLoader = false;
                            $scope.reports.showGraph = true;
                            $scope.reports.searchedReport = filterData.ProgramId;
                            console.log(data);
                            if (data.length > 0) {

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
                            } else {
                                updateGraphMessages("No Records available", true, 'btn-warning');
                            }
                        })
                        .error(function (error) {
                            console.log(error)
                        })
            } else {
                updateGraphMessages("please select a program to proceed", true, 'btn-danger')
            }
        } catch (E) {

        }


    }

    $("#dateRange").click(function () {
        if ($("#dateRange").val() == '') {
            updateGraphMessages("Date OK", false, "btn-info");
        } else {
            updateGraphMessages("OK,proceed", true, "btn-info");
        }
        //$scope.reports.dateRange = $("#dateRange").val();
    })

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






