var ReportModule = angular.module('ReportModule', ['angularUtils.directives.dirPagination', 'highcharts-ng', 'nvd3ChartDirectives']);
ReportModule.constant('serverURL', 'http://localhost:8082/reports/repository/');
ReportModule.controller("ReportController", function ($scope, $rootScope, $timeout, $http, serverURL, reportCache,
                                                      graphDataCache, $filter, filterFilter) {

    function checkCacheMemory() {
        var cache = reportCache.get('reportData');
        if (cache) {
            $scope.reports.repositoryData = reportCache.get('reportData');
        } else {

            $scope.reports.repositoryData = {};// reportCache.get('reportData');
        }
        var reportData = $scope.reports.repositoryData;
        return reportData;
    }

    function returnChangeData() {
        var cache = graphDataCache.get('graphData');
        console.log(cache);
        if (cache) {
            $scope.reports.pieChartData = graphDataCache.get('graphData');
        } else {
            $scope.reports.pieChartData = {}
        }
        return $scope.reports.pieChartData;
    }

    $scope.reports = {};
    $scope.reports.repositoryData = {};
    $scope.reports.reportShowTable = false;
    $scope.reports.showLoader = false;

    $scope.reports.itemsPerPage = 50;
    $scope.reports.countyChange = function (county) {

        for (var i = 0; i < $scope.reports.allCounties.length; i++) {
            if (county == $scope.reports.allCounties[i]['CountyID']) {
                $scope.reports.searchFilters.countyName = $scope.reports.allCounties[i]['Description'];
                break;
            }
        }

    }
    $scope.reports.doAjaxRequest = function () {


        $scope.reports.reportShowTable = false;
        var searchColumns = {};
        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
        searchColumns.county = $("#county").val();
        $scope.reports.searchFilters = searchColumns;

        $scope.reports.countyChange(searchColumns.county);
//        console.log(searchColumns);
        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
                $scope.reports.showLoader = true;
                updateGraphMessages("No records found", false, 'btn-warning');

                var url = serverURL + 'results';
                $http
                    .post(url, searchColumns)
                    .success(function (data) {
                        $scope.reports.createDataTable(data)

                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showLoader = false;
                    })


            } else {
                updateGraphMessages("Please choose a provider", true, 'btn-danger');
            }

        }
    }
    $scope.reports.stringSearch = {}
    $scope.reports.clearSearch = function () {
        $scope.reports.stringSearch = {};
        $scope.reports.repositoryData = checkCacheMemory();
    }
    $scope.reports.filterRepositoryData = function (filterstring) {

        var reportData = checkCacheMemory();
        console.log(filterstring);
        $scope.reports.repositoryData = filterFilter(reportData, filterstring)

    }

    $scope.$watch('reports.chartProgramResults', function () {
            if ($scope.reports.chartProgramResults.length > 0) {
                //      console.log(reports.chartProgramResults);
                //        $scope.reports.pieChartData =$scope.reports.chartProgramResults.series;
            }
        }
    )

    $scope.reports.graphTest = 'Works';

    $scope.reports.pieChartFunction = function () {
        $scope.reports.pieChartData = returnChangeData();

    }
    $scope.reports.xFunction = function () {
        return function (d) {
            return d.name;
        };
    }
    $scope.reports.yFunction = function () {
        return function (d) {
            console.log(d.data[0]);
            return d.data[0];
        };
    }
    $scope.reports.testData = [];
    $scope.reports.testGraphicalData = function () {

        try {
            var url = serverURL + 'testgraph';
            $http
                .get(url)
                .success(function (data) {
                    console.log("Graphical test Data");
                    console.log(JSON.stringify(data));
                    if (data.length > 0) {
                        $scope.reports.testData = data;
                    }
                })
                .error(function (error) {

                })
        } catch (E) {
            console.log(E)
        }

    }

    $scope.reports.createDataTable = function (tableData) {

        $scope.reports.repositoryData = tableData;
        if ($scope.reports.repositoryData.length > 0) {
            reportCache.put('reportData', $scope.reports.repositoryData);
            $scope.reports.reportShowTable = true;

        } else {
            updateGraphMessages("No records found", true, 'btn-warning');
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
        // try {
        //     $('#repoReport').tableExport(
        //         {type: 'excel', escape: 'false'}
        //     );
        // } catch (E) {
        //
        // }
        if ($scope.reports.repositoryData.length > 0) {
            var url = serverURL + 'generatecsv';

            try {
                window.open(url);
            } catch (E) {
                console.log(E);
            }

        } else {
            updateGraphMessages("Not data to generate CSV,please make sure you have selected the filters correctly", true, 'btn-danger');
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

    $scope.reports.allCounties = {};

    $scope.reports.getCounties = function () {
        try {
            var url = serverURL + 'getcounties';
            $http
                .get(url)
                .success(function (data) {

                    if (data.length > 0) {
                        $scope.reports.allCounties = data;
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
        //  {"id": "spline", "title": "Smooth line"},
//        {"id": "area", "title": "Area"},
        //      {"id": "areaspline", "title": "Smooth area"},
        {"id": "column", "title": "Column"},
        {"id": "bar", "title": "Bar"},
        {"id": "pie", "title": "Pie"},
        //    {"id": "scatter", "title": "Scatter"}
    ];
    $scope.reports.chartProgramResults = {};

    $scope.reports.graphWidth = 7;
    $scope.reports.graphTableHeaders = {};
    $scope.reports.changeGraphWidth = function (value) {
        if ($scope.reports.graphWidth >= 7 && $scope.reports.graphWidth < 12) {
            if ($scope.reports.graphWidth == 7 && value == -1) {

            } else {
                $scope.reports.graphWidth += Number(value);
            }
        }

    }
    function changeGraphTableHeaders(title, dataName) {
        $scope.reports.graphTableHeaders.title = title;
        $scope.reports.graphTableHeaders.dataName = dataName;
    }

    $scope.svgExport = function () {
        $scope.chartExport({type: 'image/svg+xml', filename: 'my-svg'}, {subtitle: {text: ''}});
    }

    $scope.reports.loadGraphParameters = function (data, title, titleName, dataName) {

        console.log(data);
        changeGraphTableHeaders(titleName, dataName);
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
                    func: function (chart) {
                        $scope.chartExport = $.proxy(chart.exportChart, chart);
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

            graphDataCache.put('graphData', data);
        } else {
            updateGraphMessages("No records found", true, 'btn-warning');
        }

    }
    $scope.reports.loadGraphLabsResults = function (data, title, titleName, dataName) {

        console.log(data.category);
        changeGraphTableHeaders(titleName, dataName);
        $scope.reports.chartProgramResults = {};
        if (data.category.length > 0) {
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

                    series: data.data,
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
                                return data.data[this.value][0];
                            }
                        }
                    },
                    loading: false,
                    size: {}
                };
                $scope.showGraph = false;

            }, 30)
            graphDataCache.put('graphData', data.data);
        } else {
            updateGraphMessages("No Lab records found", true, 'btn-warning');
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
    $scope.reports.searchFilters = {};
    $scope.reports.showGraphClicked = function (graphType, graphName) {
        $scope.reports.searchedReport = '';
        $scope.reports.reportTypes = graphName;
        $scope.reports.showGraph = false;
        var filterData = {};
        filterData.dateRange = $("#dateRange").val();
        filterData.ProviderId = $("#provider").val();
        filterData.ProgramID = $("#program").val();
        filterData.county = $("#county").val();
        $scope.reports.dateRange = filterData.dateRange;
        $scope.reports.searchFilters = filterData;
        $scope.reports.countyChange(filterData.county);

        console.log(filterData);
        if (graphType != '') {
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
                if (graphType == 'Lab-results Graph') {
                    $scope.reports.getLabAgainstResults(filterData);
                }
                if (graphType == 'Round-results Graph') {
                    $scope.reports.getRoundAgainstResults(filterData);
                }

            }
        } else {
            updateGraphMessages("Select graph type from the downdrop", true, 'btn-danger');
        }
    }
    $scope.reports.reportFilter = {};


    $scope.reports.getRoundAgainstResults = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'roundagainstresults';
            $http
                .post(url, filterData)
                .success(function (data) {
                    $scope.reports.showGraph = true;

                    $scope.reports.loadGraphLabsResults(data, 'Round vs Results Count', 'Round Name', 'Round vs Results');
                    $scope.reports.showGraphLoader = false;
                    console.log(data);

                })
                .error(function (error) {
                    $scope.reports.showGraphLoader = false;
                    $scope.reports.showGraph = false;
                    updateGraphMessages("Server error,please try again", true, 'btn-danger');
                })
        } catch (e) {
            console.log(e)
        }
    }


    $scope.reports.getLabAgainstResults = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'labagainstresults';
            $http
                .post(url, filterData)
                .success(function (data) {
                    $scope.reports.showGraph = true;

                    $scope.reports.loadGraphLabsResults(data, 'Lab vs Results Count', 'Lab Code', 'Labs vs Results');
                    $scope.reports.showGraphLoader = false;
                    console.log(data);

                })
                .error(function (error) {
                    $scope.reports.showGraphLoader = false;
                    $scope.reports.showGraph = false;
                    updateGraphMessages("Server error,please try again", true, 'btn-danger');
                })
        } catch (e) {
            console.log(e)
        }
    }


    $scope.reports.getLabAgainstSample = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'labagainstsamples';
            $http
                .post(url, filterData)
                .success(function (data) {

                    $scope.reports.showGraph = true;

                    $scope.reports.loadGraphParameters(data, 'Lab vs Samples Graph', 'Lab Code', 'Total Samples');
                    $scope.reports.showGraphLoader = false;
                    ;

                })
                .error(function (error) {
                    $scope.reports.showGraph = false;
                    $scope.reports.showGraphLoader = false;
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

                    $scope.reports.loadGraphParameters(data, 'Round vs Test Count Graph', 'Round', 'Total Test');
                    $scope.reports.showGraphLoader = false;
                    console.log(data);

                })
                .error(function (error) {
                    $scope.reports.showGraphLoader = false;
                    $scope.reports.showGraph = false;
                    updateGraphMessages("Server error,please try again", true, 'btn-danger');
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

                    $scope.reports.loadGraphParameters(data, 'Provider-lab count Graph', 'Provider', 'Total Labs');
                    $scope.reports.showGraphLoader = false;
                    console.log(data);

                })
                .error(function (error) {
                    $scope.reports.showGraphLoader = false;
                    $scope.reports.showGraph = false;
                    updateGraphMessages("Server error,please try again", true, 'btn-danger');
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

                    $scope.reports.loadGraphParameters(data, 'Program-lab count Graph', 'Program', 'Total Labs');
                    $scope.reports.showGraphLoader = false;
                    console.log(data);

                })
                .error(function (error) {
                    $scope.reports.showGraphLoader = false;
                    $scope.reports.showGraph = false;
                    updateGraphMessages("Server error,please try again", true, 'btn-danger');
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
            var result = serverURL + 'progranvsresults';
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
                            changeGraphTableHeaders('Program', 'Result Count');
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
                                        },
                                        categories: [0, 1, 2, 3, 4]
                                    },
                                    loading: false,
                                    size: {}
                                };
                                $scope.showGraph = false;

                            }, 30)
                        } else {
                            $scope.reports.showGraphLoader = false;
                            $scope.reports.showGraph = false;
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
        "</ul> " + +"</dir-pagination-controls>  </div>"

    }


})
    .factory('reportCache', function ($cacheFactory) {
        return $cacheFactory('reportData');

    })
    .factory('graphDataCache', function ($cacheFactory) {
        return $cacheFactory('graphData');

    })

