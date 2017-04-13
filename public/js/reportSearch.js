var ReportModule = angular.module('ReportModule', ['angularUtils.directives.dirPagination',
    'ngAnimate', 'ngSanitize', 'ui.bootstrap', 'highcharts-ng', 'nvd3ChartDirectives', 'ui.calendar',
    'mgcrea.ngStrap.datepicker', 'mgcrea.ngStrap.tooltip', 'mgcrea.ngStrap.typeahead']);

ReportModule.controller("ReportController", function ($scope, $rootScope, $timeout, $http, reportCache,
        graphDataCache, $filter, filterFilter, EptServices) {
    var serverURL = SERVER_API_URL.repositoryURL;
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

    $scope.reports.generatePdfMainFunction = function GenerateReport(reportTitle, reportData, tableWidth, reportHeader) {
        // var schoolName = '@Session["SchoolName"]';

        var docDefinition = {
            styles: {
                header: {
                    fontSize: 12,
                    bold: true,
                },

                subHeader: {
                    fontSize: 10,
                    bold: true,

                },

                content: {
                    fontSize: 8,
                    bold: false,
                },

                numeric: {
                    alignment: 'right'
                },

                centerData: {
                    alignment: 'center'
                }
            },

            content: [
                //{
                //    image: schoolLogo,
                //    width: 60,
                //    style: ['centerData'],
                //    margin: [0, 0, 0, 5]
                //},
                {text: 'Nation Public Health Laboratories'.toUpperCase(), style: ['header', 'centerData']},
                {text: reportHeader, style: ['content', 'centerData'], margin: [0, 0, 0, 5]},

                {text: 'P.O BOX 145-00100,Nairobi', style: ['content', 'centerData']},
                {text: 'info@nphl.co.ke', style: ['content', 'centerData']},
                {
                    text: 'www.nphl.or.ke',
                    link: "http://www.nphl.or.ke",
                    style: ['content', 'centerData'],
                    fillColor: 'yellow',
                    decoration: "underline"
                },
                {text: reportTitle, style: ['subHeader', 'centerData'], margin: [0, 5, 0, 0]},
                // {text:"Google", link:"http://www.google.com", decoration:"underline",fillColor: 'blue', margin: [0, 5, 0, 0]},
                {
                    text: "_______________________________________________________________________________________________",
                    margin: [0, 0, 0, 5]
                },
                {
                    table: {
                        headerRows: 1,
                        widths: tableWidth,
                        body: reportData,
                    },
                    layout: {
                        hLineWidth: function (i, node) {
                            return (i === 0 || i === node.table.body.length) ? 0.5 : 0.5;
                        },
                        vLineWidth: function (i, node) {
                            return (i === 0 || i === node.table.widths.length) ? 0.5 : 0.5;
                        },
                        hLineColor: function (i, node) {
                            return (i === 0 || i === node.table.body.length) ? 'black' : 'black';
                        },
                        vLineColor: function (i, node) {
                            return (i === 0 || i === node.table.widths.length) ? 'black' : 'black';
                        },
                        paddingLeft: function (i, node) {
                            return 1;
                        },
                        paddingRight: function (i, node) {
                            return 1;
                        }
                        // paddingTop: function(i, node) { return 2; },
                        // paddingBottom: function(i, node) { return 2; }
                    }
                },
            ],

            footer: function (page, pages) {
                return {
                    columns: [
                        {
                            text: 'ABNO Softwares International',
                            style: ['content']
                        },
                        {
                            alignment: 'right',
                            text: [
                                {text: 'Page: ' + page.toString(), style: ['content']},
                                {text: ' of ', italics: true, style: ['content']},
                                {text: pages.toString(), style: ['content']},
                            ],
                        },
                    ],
                    margin: [40, 10, 40, 0]
                }
            },
        }

        pdfMake.createPdf(docDefinition).open();
    }
    function today() {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + "." + today.getMinutes() + "." + today.getSeconds();
        var dateTime = date + ' ' + time;

        return dateTime;
    }

    $scope.reports.generateRepositoryParticipantPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', 'auto', 'auto', '*', '*', 'auto', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'County', style: 'subHeader'},
                    {text: 'Contact Name', style: 'subHeader'},
                    {text: 'Contact Email', style: 'subHeader'},
                    {text: 'Telephone', style: 'subHeader'},
                    {text: 'Status', style: 'subHeader'}

                ];

        reportData.push(reportHeader);

        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.LabID, style: ['content']},
                    {text: ' ' + lab.county, style: ['content']},
                    {text: ' ' + lab.contactName, style: ['content']},
                    {text: ' ' + lab.contactEmail, style: ['content']},
                    {text: ' ' + lab.telephone, style: ['content']},
                    {text: ' Active ', style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'PARTICIPANTS REPORT';
            var reportTitle = 'NATIONAL HOSPITAL REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.reports.generatePdfMainFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
    $scope.reports.generateRepositorySummaryPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'County', style: 'subHeader'},
                    {text: 'Round', style: 'subHeader'},
                    {text: 'Date', style: 'subHeader'},
                    {text: 'Acceptable', style: 'subHeader'},
                    {text: 'Not Accepted', style: 'subHeader'},
                    {text: 'Percentage', style: 'subHeader'}

                ];

        reportData.push(reportHeader);

        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.LID, style: ['content']},
                    {text: ' ' + lab.county, style: ['content']},
                    {text: ' ' + lab.RoundID, style: ['content']},
                    {text: ' ' + lab.ReleaseDate, style: ['content']},
                    {text: ' ' + lab.acceptable, style: ['content']},
                    {text: ' ' + lab.unacceptable, style: ['content']},
                    {text: ' ' + lab.percent + '%', style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'PERFORMANCE SUMMARY REPORT';
            var reportTitle = 'NATIONAL HOSPITAL REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.reports.generatePdfMainFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    $scope.reports.generateRepositoryGenPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*', 'auto', 'auto', '*', '*', 'auto', 'auto', '*']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Provider Name', style: 'subHeader'},
                    {text: 'Program', style: 'subHeader'},
                    {text: 'Lab', style: 'subHeader'},
                    {text: 'PT Round Code', style: 'subHeader'},
                    {text: 'Release Date', style: 'subHeader'},
                    {text: 'Grade', style: 'subHeader'},
                    {text: 'Analyte ID', style: 'subHeader'},
                    {text: 'Sample Code', style: 'subHeader'}

                ];

        reportData.push(reportHeader);

        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.ProviderID, style: ['content']},
                    {text: ' ' + lab.ProgramID, style: ['content']},
                    {text: ' ' + lab.LabID, style: ['content']},
                    {text: ' ' + lab.RoundID, style: ['content']},
                    {text: ' ' + lab.ReleaseDate, style: ['content']},
                    {text: ' ' + lab.Grade, style: ['content']},
                    {text: ' ' + lab.AnalyteID, style: ['content']},
                    {text: ' ' + lab.SampleCode, style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'REPOSITORY MAIN REPORT';
            var reportTitle = 'NATIONAL HOSPITAL REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.reports.generatePdfMainFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
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
//            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
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


//            } else {
//                updateGraphMessages("Please choose a provider", true, 'btn-danger');
//            }

        }
    }

    $scope.reports.participantingLabs = {};

    $scope.reports.getParticipants = function () {
        $scope.reports.reportShowTable = false;
        var searchColumns = {};

        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
        searchColumns.county = $("#county").val();
        searchColumns.AnalyteID = $scope.reports.reportFilter.AnalyteID;
        $scope.reports.searchFilters = searchColumns;

        $scope.reports.countyChange(searchColumns.county);

        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
//            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
            $scope.reports.showLoader = true;
            updateGraphMessages("No records found", false, 'btn-warning');

            var url = serverURL + 'participantlabsresults';
            $http
                    .post(url, searchColumns)
                    .success(function (data) {
                        $scope.reports.showLoader = false;
                        $scope.reports.reportShowTable = true;
                        if (data.length > 0) {
                            $scope.reports.participantingLabs = data;
                        } else {
                            $scope.reports.participantingLabs = {};
                            updateGraphMessages("No records found", true, 'btn-warning');
                        }

                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showLoader = false;
                    })


//            } else {
//                updateGraphMessages("Please choose a provider", true, 'btn-danger');
//            }

        }
    }

    $scope.reports.participantionResultCode = {};

    $scope.reports.getParticipantionResultCode = function () {
        $scope.reports.reportShowTable = false;
        var searchColumns = {};

        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
        searchColumns.county = $("#county").val();
        $scope.reports.searchFilters = searchColumns;
        searchColumns.AnalyteID = $scope.reports.reportFilter.AnalyteID;
        $scope.reports.countyChange(searchColumns.county);

//        console.log(searchColumns);
        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
//            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
            $scope.reports.showLoader = true;
            updateGraphMessages("No records found", false, 'btn-warning');

            var url = serverURL + 'getparticipantionresultcode';
            $http
                    .post(url, searchColumns)
                    .success(function (data) {
                        $scope.reports.showLoader = false;
                        $scope.reports.reportShowTable = true;
                        if (data.length > 0) {
                            $scope.reports.participantionResultCode = data;
                        } else {
                            $scope.reports.participantionResultCode = {};
                            updateGraphMessages("No records found", true, 'btn-warning');
                        }

                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showLoader = false;
                    })


//            } else {
//                updateGraphMessages("Please choose a provider", true, 'btn-danger');
//            }

        }
    }


    $scope.reports.validationData = {};

    $scope.reports.getValidationData = function () {
        $scope.reports.reportShowTable = false;
        var searchColumns = {};

        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
        searchColumns.county = $("#county").val();
        $scope.reports.searchFilters = searchColumns;
        searchColumns.MflCode = $scope.reports.reportFilter.MflCode;
        $scope.reports.countyChange(searchColumns.county);

//        console.log(searchColumns);
        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
//            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
            $scope.reports.showLoader = true;
            updateGraphMessages("No records found", false, 'btn-warning');

            var url = serverURL + 'getvalidationdata';
            $http
                    .post(url, searchColumns)
                    .success(function (data) {
                        $scope.reports.showLoader = false;
                        $scope.reports.reportShowTable = true;
                        if (data.length > 0) {
                            $scope.reports.validationData = data;
                        } else {
                            $scope.reports.validationData = {};
                            updateGraphMessages("No records found", true, 'btn-warning');
                        }

                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showLoader = false;
                    })


//            } else {
//                updateGraphMessages("Please choose a provider", true, 'btn-danger');
//            }

        }
    }


    $scope.reports.qaApproveUserData = function (BID) {
        var BatchID = {BatchID: BID}
        var alertStartRound = {};
        $.confirm({
            title: 'Confirm Delete!',
            theme: 'supervan',
            content: 'Are you want to approve this batch,this action can not be undone ',
            buttons: {
                'Evaluate': {
                    btnClass: 'btn-blue',
                    action: function () {

                        alertStartRound = $.alert({title: 'Progess', content: '<i class="fa fa-spin fa-spinner fa-2x"></i> Approving batch,please wait...!'});
                        qaAproveBatchFinal(BatchID)

                    }
                },
                cancel: {
                    btnClass: 'btn-red',
                    action: function () {
                        // $.alert('cancelled !');
                    }
                }
            }
        })
        function qaAproveBatchFinal(BatchID) {
            var url = serverURL + 'qaapprovevalidationdata';
            $http
                    .post(url, BatchID)
                    .success(function (data) {
                        
                        console.log(data);
                        alertStartRound.close();
                        if (data.status == 1) {
                            $scope.reports.getValidationData();
                            EptServices.EptServiceObject.returnActionSuccessAlert();
                            
                        } else {
                            EptServices.EptServiceObject.returnActionUnSuccessAlert();
                        }

                        console.log(data);

                    })
                    .error(function (error) {
                        console.log(error);
                        alertStartRound.close();
                        EptServices.EptServiceObject.returnServerErrorAlert();
//                        updateGraphMessages("Server error,please try again", true, 'btn-danger');
                    })
        }

    }


    $scope.reports.getLabPerformance = function () {
        $scope.reports.reportShowTable = false;
        var searchColumns = {};

        searchColumns.dateRange = angular.isDefined($("#dateRange").val()) ? $("#dateRange").val() : null;
        searchColumns.reportType = angular.isDefined($("#reportType").val()) ? $("#reportType").val() : null;
        searchColumns.ProviderId = angular.isDefined($("#provider").val()) ? $("#provider").val() : null;
        searchColumns.ProgramId = $("#program").val();
        searchColumns.county = $("#county").val();
        $scope.reports.searchFilters = searchColumns;
        searchColumns.sample = $scope.reports.reportFilter.sample;
        $scope.reports.countyChange(searchColumns.county);
//        console.log(searchColumns);
        console.log(searchColumns);
        if (searchColumns.dateRange == '' || angular.isUndefined(searchColumns.dateRange)) {
            updateGraphMessages("Please choose date range", true, 'btn-danger');
        } else {
//            if (searchColumns.ProviderId != '' && angular.isDefined(searchColumns.ProviderId)) {
            $scope.reports.showLoader = true;
            updateGraphMessages("No records found", false, 'btn-warning');

            var url = serverURL + 'getlabperformance';
            $http
                    .post(url, searchColumns)
                    .success(function (data) {
                        $scope.reports.showLoader = false;
                        $scope.reports.reportShowTable = true;
                        if (data.length > 0) {
                            $scope.reports.performanceLabs = data;
                        } else {
                            $scope.reports.performanceLabs = {};
                            updateGraphMessages("No records found", true, 'btn-warning');
                        }

                        console.log(data);

                    })
                    .error(function (error) {
                        $scope.reports.showLoader = false;
                    })


//            } else {
//                updateGraphMessages("Please choose a provider", true, 'btn-danger');
//            }

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
        if ($scope.reports.repositoryData.length > 0 && tableData != 0) {
            reportCache.put('reportData', $scope.reports.repositoryData);
            $scope.reports.reportShowTable = true;

        } else {
            $scope.reports.repositoryData = {};
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


//-------------------------generate excel data from file---------------------------------------------//

    function returnSummaryExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'Lab Name': excelData[i].LID,
                    'County': excelData[i].county,
                    'Round': excelData[i].RoundID,
                    'Date': excelData[i].ReleaseDate,
                    'Acceptable': excelData[i].acceptable,
                    'Not Accepted': excelData[i].unacceptable,
                    'Percentage': excelData[i].percent

                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }

    $scope.reports.generateSummaryExcel = function (data) {
        if (data.length > 0) {
            var excelData = returnSummaryExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'PERFORMANCE SUMMARY SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'PERFORMANCE SUMMARY',
                        style: 'font-size: 50px; color:blue;'
                    },
                    caption: {
                        title: 'My Big Table',
                        style: 'font-size: 50px; color:blue;' // Sorry, styles do not works
                    },
                    style: 'background:#00FF00',
                    column: {
                        style: 'font-size:30px'
                    }
                }]
                    ;
            var res = alasql('SELECT INTO XLSX("PERFORMANCE SUMMARY REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//-------------------------generate excel data from file---------------------------------------------//

    function returnParticpantsExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'Lab Name': excelData[i].LabID,
                    'County': excelData[i].county,
                    'Contact name': excelData[i].contactName,
                    'Contact Email': excelData[i].contactEmail,
                    'Telephone': excelData[i].telephone,
                    'status': 'Active'

                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }

    $scope.reports.generateParticipantsExcel = function (data) {
        if (data.length > 0) {
            var excelData = returnParticpantsExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'PARTICIPANTS SUMMARY SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'PARTICIPANTS SUMMARY',
                        style: 'font-size: 50px; color:blue;'
                    },
                    caption: {
                        title: 'My Big Table',
                        style: 'font-size: 50px; color:blue;' // Sorry, styles do not works
                    },
                    style: 'background:#00FF00',
                    column: {
                        style: 'font-size:30px'
                    }
                }]
                    ;
            var res = alasql('SELECT INTO XLSX("PARTICIPANTS REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////

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
                if (graphType == 'County-labs Graph') {
                    $scope.reports.getCountyAgainstLabs(filterData);
                }
                if (graphType == 'County-Results Graph') {
                    $scope.reports.getCountyAgainstLabs(filterData);
                }

            }
        } else {
            updateGraphMessages("Select graph type from the downdrop", true, 'btn-danger');
        }
    }

    $scope.reports.getCountyAgainstLabs = function (filterData) {
        try {
            $scope.reports.showGraphLoader = true;
            var url = serverURL + 'countyagainstlabs';
            $http
                    .post(url, filterData)
                    .success(function (data) {
                        $scope.reports.showGraph = true;
                        console.log(data);
                        $scope.reports.loadGraphParameters(data, 'County VS Total Labs', 'County Name', 'Total Labs');
                        $scope.reports.showGraphLoader = false;


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
            filterData.county = $("#county").val();

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

})
        .factory('reportCache', function ($cacheFactory) {
            return $cacheFactory('reportData');

        })
        .factory('graphDataCache', function ($cacheFactory) {
            return $cacheFactory('graphData');

        })
        .directive('itemsPerPage', function () {
            return {
                restrict: 'EA',
                template: "<div class='dropdown col-md-3 col-sm-12  pull-right'>" +
                        "<button class='text-capitalize btn btn-success btn-sm dropdown-toggle' type='button'" +
                        "id='menu1' data-toggle='dropdown'>Items Per Page {{samples.itemsPerPage}}" +
                        "<span class='caret'></span></button>" +
                        "<ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>" +
                        "<li role='presentation'>" +
                        "<a href='#' ng-click='samples.changeItemsPerPage(10)'>10</a>" +
                        "</li>" +
                        "<li role='presentation'>" +
                        "<a href='#' ng-click='samples.changeItemsPerPage(25)'>25</a>" +
                        "</li>" +
                        "<li role='presentation'>" +
                        "<a href='#' ng-click='samples.changeItemsPerPage(50)'>50 </a>" +
                        "</li>" +
                        "<li role='presentation'>" +
                        "<a href='#' ng-click='samples.changeItemsPerPage(100)'>100</a>" +
                        "</li>" +
                        "</ul>" +
                        "</div>"
            }
        })

