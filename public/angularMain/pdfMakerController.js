var pdfModule = angular.module('ReportModule')

pdfModule.controller('PdfController', function ($scope, EptServices, $http, $timeout) {
    $scope.pdfMake = {};

    var serverReportURL = SERVER_API_URL.bacteriologyURL;
    function today() {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + "." + today.getMinutes() + "." + today.getSeconds();
        var dateTime = date + ' ' + time;

        return dateTime;
    }

    $scope.pdfMake.mainGeneratorFunction = function GenerateReport(reportTitle, reportData, tableWidth, reportHeader) {
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


    $scope.pdfMake.generateCorrectiveActionPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*', '*', '*', '*', '*', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'Sample Name', style: 'subHeader'},
                    {text: 'Round Name', style: 'subHeader'},
                    {text: 'Remarks', style: 'subHeader'},
                    {text: 'Date', style: 'subHeader'},
                    {text: 'Corrective Action', style: 'subHeader'}

                ];

        reportData.push(reportHeader);
        console.log(data)
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.lab.institute_name, style: ['content']},
                    {text: ' ' + lab.sample.batchName, style: ['content']},
                    {text: ' ' + lab.round.roundName, style: ['content']},
                    {text: ' ' + lab.remarks, style: ['content']},
                    {text: ' ' + lab.dateCreated, style: ['content']},
                    {text: ' YES ', style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'CORRECTIVE ACTION REPORT';
            var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
    $scope.pdfMake.userFeedbackResults = {};
    var alerts = '';
    $scope.pdfMake.userResponseGeneratorPdf = function (reportTitle, reportData, tableWidth, reportHeader, dataDetails, microAgents, expectedResults) {
        // var schoolName = '@Session["SchoolName"]';
        console.log(expectedResults);
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
                contentHeader: {

                    bold: true,

                },
                content: {
                    fontSize: 8,
                    bold: false,
                },
                contentBold: {
                    fontSize: 8,
                    bold: true,
                    italic: true,
                },
                numeric: {
                    alignment: 'right'
                },

                centerData: {
                    alignment: 'center'
                }, leftData: {
                    alignment: 'left'
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
                    text: 'Laboratory Name : ' + dataDetails.lab.institute_name,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Laboratory Unique Identifier : ' + dataDetails.lab.unique_identifier,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {text: 'County : ' + dataDetails.lab.region, style: ['content', 'leftData'], margin: [0, 0, 0, 5]},
                {text: 'Address : ' + dataDetails.lab.address, style: ['content', 'leftData'], margin: [0, 0, 0, 5]},
                {text: 'Email : ' + dataDetails.lab.email, style: ['content', 'leftData'], margin: [0, 0, 0, 5]},
                {text: 'Mobile : ' + dataDetails.lab.mobile, style: ['content', 'leftData'], margin: [0, 0, 0, 5]},
                {
                    text: "_______________________________________________________________________________________________",
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Round Of Testing : ' + dataDetails.sampleDetails.roundName,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Round Code : ' + dataDetails.sampleDetails.roundCode,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Start Of Round  : ' + dataDetails.sampleDetails.startDate + ' - End Of Round  : ' +
                            dataDetails.sampleDetails.endDate, style: ['content', 'leftData'], margin: [0, 0, 0, 5]
                },
                {
                    text: 'Sample : ' + dataDetails.sampleDetails.batchName,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },

                {
                    text: "_______________________________________________________________________________________________",
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Gram Stain Identified : ' + dataDetails.results.grainStainReaction +
                            ' | Your score ' + dataDetails.results.grainStainReactionScore + '%',
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Expected Gram Stain : ' + expectedResults.expectedBacterialResults.grainStainReaction
                            + ' | Possible score ' + expectedResults.expectedBacterialResults.grainStainReactionScore,
                    style: ['content', 'leftData', 'contentBold'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: "-----------------------------------------------------------------------------------------------------------------------------------------------------",
                    style: ['content'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Final identification : ' + dataDetails.results.finalIdentification +
                            ' | Your score ' + dataDetails.results.finalIdentificationScore + '%',
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Expected Final identification : ' + expectedResults.expectedBacterialResults.finalIdentification
                            + ' : Possible score ' + expectedResults.expectedBacterialResults.finalIdentificationScore,
                    style: ['content', 'leftData', 'contentBold'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: "------------------------------------------------------------------------------------------------------------------------------------------------------",
                    style: ['content'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Micro Agents Used : ' + microAgents.length + ' : ' + microAgents.toString() +
                            ' | Your score ' + dataDetails.results.totalMicroAgentsScore + '%',
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Expected Micro Agents : ' + expectedResults.microAst.length + ' : ' + expectedResults.microAst.toString() + ' | Total Possible score ' + expectedResults.totalScore,
                    style: ['content', 'leftData', 'contentBold'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: "_______________________________________________________________________________________________",
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Total Average Score : ' + Number(dataDetails.results.finalScore) + '%',
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Remarks : ' + dataDetails.results.remarks,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {text: 'Grade : ' + dataDetails.results.grade, style: ['content', 'leftData'], margin: [0, 0, 0, 5]},
                {
                    text: 'Recommedations : ' + dataDetails.results.adminRemarks,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },
                {
                    text: 'Date : ' + dataDetails.results.dateCreated,
                    style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
                },

                {
                    text: "_______________________________________________________________________________________________",
                    margin: [0, 0, 0, 5]
                },
                {text: 'CORRECTIVE ACTION', style: ['subHeader', 'leftData'], margin: [0, 0, 0, 5]},
                {
                    text: 'CORRECTIVE ACTION  : ' + dataDetails.results.correctiveAction == 0 ? 'Corrective action should be taken ' : 'N/A'
                    , style: ['content', 'leftData'],
                    margin: [0, 0, 0, 5]
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
    $scope.pdfMake.generateCorrectiveAction = function (samples, labDetails, type) {
        try {
            var url = serverReportURL + 'getlabuserresponse';
            if (angular.isDefined(url)) {
                url = SERVER_API_URL.bacteriologyParticipant + 'getlabuserresponse';
            }


            alerts = $.alert({
                title: "<i class='fa fa-spin fa-spinner text-success'></i> Fetching data",
                content: "please wait..."
            });
            $http.post(url, samples)
                    .success(function (response) {
                        console.log(response);
                        alerts.close();
                        if (response.status == 1) {
                            response.data.sampleDetails = samples;
                            createUserResponseData(response.data, labDetails)
                            $scope.pdfMake.userFeedbackResults = response.data;
                        } else {
                            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                        }
                    })
                    .error(function () {
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })
        } catch (err) {
            console.log(err);
        }
    }
    //Sample Report
    function returnGradeDetails(microScore, microAgents) {
        var reportData = new Array();

        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Gram Stain', style: 'subHeader'},
                    {text: 'Gram Stain Score', style: 'subHeader'},
                    {text: 'Grade', style: 'subHeader'},
                ];

        reportData.push(reportHeader);

        for (var i = 0; i < 1; i++) {
            var rowData = [
                {text: '' + (i + 1), style: ['content']},
                {text: ' ' + microScore.grainStainReaction, style: ['content']},
                {text: ' ' + microScore.grainStainReactionScore, style: ['content']},
                {text: ' ' + microScore.grade, style: ['content']}

            ];

            reportData.push(rowData);

        }

        var allData = {}
        allData.reportData = reportData;
        var microAst = [];

        for (var j = 0; j < microAgents.length; j++) {

            microAst.push(microAgents[j].antiMicroAgent + ' - ' + microAgents[j].finalScore);

        }
        allData.reportData = reportData;
        allData.microAgents = microAst;
        return allData;
    }

    function returnExpectedAsts(expectedResutls) {

        var microAst = [];
        var totalScore = 0;
        for (var j = 0; j < expectedResutls.length; j++) {
            totalScore = expectedResutls[j].agentScore;
            microAst.push(expectedResutls[j].antiMicroAgent + ' - ' + expectedResutls[j].finalScore);

        }


        var result = {
            microAst: microAst, totalScore: totalScore
        };
        return result;
    }

    function createUserResponseData(data, labDetails) {
        var tableWidth1 = ['auto', '*', '*', '*']

        var allData = returnGradeDetails(data.results, data.microAgents);
        // console.log(allData)
        var reportData = allData.reportData;
        var microAgents = allData.microAgents;
        var expectedResults = returnExpectedAsts(data.expectedResults.expectedASTs);
        console.log(data);
        expectedResults.expectedBacterialResults = data.expectedResults.expectedResults;

        var reportSubHeader = 'USER/LAB PERFORMANCE REPORT';
        var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';

        data.lab = labDetails
        $scope.pdfMake.userResponseGeneratorPdf(reportSubHeader, reportData, tableWidth1, reportTitle, data, microAgents, expectedResults);
        alerts = $.alert({
            title: "<i class='fa fa-check text-success'></i> Success",
            content: "PDF Generated successfully"
        });


    }

    $scope.pdfMake.generateShipmentPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*', '*', '*', '*', '*', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'Sample Name', style: 'subHeader'},
                    {text: 'Round Name', style: 'subHeader'},
                    {text: 'Total Sent', style: 'subHeader'},
                    {text: 'Total Rejected', style: 'subHeader'},
                    {text: 'Received', style: 'subHeader'}

                ];

        reportData.push(reportHeader);
        console.log(data)
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.lab.institute_name, style: ['content']},
                    {text: ' ' + lab.sample.batchName, style: ['content']},
                    {text: ' ' + lab.round.roundName, style: ['content']},
                    {text: ' ' + lab.totalSent, style: ['content']},
                    {text: ' ' + lab.rejected, style: ['content']},
                    {text: ' ' + lab.received, style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'SHIPMENT RECEIVING REPORT';
            var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }

    $scope.pdfMake.generateRepositoryPdf = function (reportData) {
        console.log(reportData)
    }
    $scope.pdfMake.generateParticipatoryReportPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*', '*', '*', '*', '*', 'auto', '*', '*']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Sample Name', style: 'subHeader'},
                    {text: 'Round Name', style: 'subHeader'},
                    {text: 'Enrolled Labs', style: 'subHeader'},
                    {text: ' Unresponded', style: 'subHeader'},
                    {text: ' Responded', style: 'subHeader'},
                    {text: ' Evaluated', style: 'subHeader'},
                    {text: ' Unevaluated', style: 'subHeader'},
                    {text: 'Response %', style: 'subHeader'}

                ];

        reportData.push(reportHeader);
        console.log(data)
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var sample = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + sample.sample.batchName, style: ['content']},
                    {text: ' ' + sample.round.roundName, style: ['content']},
                    {text: ' ' + sample.totalLabsAndSamples, style: ['content']},
                    {text: ' ' + sample.totalUnresponded, style: ['content']},
                    {text: ' ' + sample.totalResponded, style: ['content']},
                    {text: ' ' + sample.totalTotalEvaluated, style: ['content']},
                    {text: ' ' + sample.totalTotalUnevaluated, style: ['content']},
                    {text: ' ' + sample.responseRate, style: ['content']}

                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'PARTICIPATORY REPORT';
            var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    $scope.pdfMake.generateLabPerformancePdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*','*', '*', 'auto', '*', '*', 'auto', '*', '*', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'Mfl Code', style: 'subHeader'},
                    {text: 'County', style: 'subHeader'},
                    {text: 'Sample', style: 'subHeader'},
                    {text: 'Round', style: 'subHeader'},
                    {text: 'Micro', style: 'subHeader'},
                    {text: 'Micro Agents', style: 'subHeader'},
                    {text: 'Remarks', style: 'subHeader'},
                    {text: 'Grade', style: 'subHeader'},
                    {text: 'Total', style: 'subHeader'}

                ];

        reportData.push(reportHeader);
        console.log(data)
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.labName, style: ['content']},
                    {text: ' ' + lab.MflCode, style: ['content']},
                    {text: ' ' + lab.county, style: ['content']},
                    {text: ' ' + lab.batchName, style: ['content']},
                    {text: ' ' + lab.roundCode, style: ['content']},
                    {text: ' ' + lab.finalScore, style: ['content']},
                    {text: ' ' + lab.totalMicroAgentsScore, style: ['content']},
                    {text: ' ' + lab.remarks, style: ['content']},
                    {text: ' ' + lab.grade, style: ['content']},
                    {text: ' ' + (Number(lab.finalScore) + Number(lab.totalMicroAgentsScore)), style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'LABORATORY PERFORMANCE REPORT';
            var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }

    $scope.pdfMake.generateSurveyReportPdf = function (data) {
        var reportData = new Array();
        var tableWidth = ['auto', '*', 'auto', 'auto', '*', '*', 'auto', 'auto', 'auto', 'auto', 'auto']
        var reportHeader =
                [
                    {text: ' # ', style: 'subHeader'},
                    {text: 'Lab Name', style: 'subHeader'},
                    {text: 'Lab Code', style: 'subHeader'},
                    {text: 'County', style: 'subHeader'},
                    {text: 'Sample', style: 'subHeader'},
                    {text: 'Round', style: 'subHeader'},
                    {text: 'Micro', style: 'subHeader'},
                    {text: 'Agents', style: 'subHeader'},
                    {text: 'Remarks', style: 'subHeader'},
                    {text: 'Grade', style: 'subHeader'},
                    {text: 'Total', style: 'subHeader'}

                ];

        reportData.push(reportHeader);
        console.log(data)
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var lab = data[i];
                var rowData = [
                    {text: '' + (i + 1), style: ['content']},
                    {text: ' ' + lab.labName, style: ['content']},
                    {text: ' ' + lab.unique_identifier, style: ['content']},
                    {text: ' ' + lab.county, style: ['content']},
                    {text: ' ' + lab.batchName, style: ['content']},
                    {text: ' ' + lab.roundCode, style: ['content']},
                    {text: ' ' + lab.finalScore, style: ['content']},
                    {text: ' ' + lab.totalMicroAgentsScore, style: ['content']},
                    {text: ' ' + lab.remarks, style: ['content']},
                    {text: ' ' + lab.grade, style: ['content']},
                    {text: ' ' + (Number(lab.finalScore) + Number(lab.totalMicroAgentsScore)), style: ['content']}
                ];

                reportData.push(rowData);
            }


            var reportSubHeader = 'ROUND PERFORMANCE REPORT';
            var reportTitle = 'NATIONAL MICROBIOLOGY REFERENCE LABORATORY - NAIROBI, KENYA';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    function returnRoundExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'Laboratory Name': excelData[i].labName,
                    'Lab Code': excelData[i].unique_identifier,
                    'County': excelData[i].county,
                    'Sample': excelData[i].batchName,
                    'Round': excelData[i].roundCode,
                    'Micro Identification Score': excelData[i].finalScore,
                    'Anti-Baterial Agents': excelData[i].totalMicroAgentsScore,
                    'Grade': excelData[i].grade,
                    'Remarks': excelData[i].remarks,
                    'Total': (Number(excelData[i].finalScore) + Number(excelData[i].totalMicroAgentsScore)),
                    'Material Source': excelData[i].materialSource

                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }

    $scope.pdfMake.exportToExcel = function (filename, id) {
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
    $scope.pdfMake.generateSurveyReportExcel = function (data, searchData) {
        if (data.length > 0) {
            var excelData = returnRoundExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'ROUNDS SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'Round Data,Round ',
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
            var res = alasql('SELECT INTO XLSX("ROUNDS REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    function returnLabPerformanceExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'Laboratory Name': excelData[i].labName,
                    'MFL Code': excelData[i].MflCode,
                    'County': excelData[i].county,
                    'Sample': excelData[i].batchName,
                    'Round': excelData[i].roundCode,
                    'Micro Identification Score': excelData[i].finalScore,
                    'Anti-Baterial Agents': excelData[i].totalMicroAgentsScore,
                    'Grade': excelData[i].grade,
                    'Remarks': excelData[i].remarks,
                    'Total': (Number(excelData[i].finalScore) + Number(excelData[i].totalMicroAgentsScore)),
                    'Material Source': excelData[i].materialSource

                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }


    $scope.pdfMake.generateLabPerformanceExcel = function (data, searchData) {
        if (data.length > 0) {
            var excelData = returnLabPerformanceExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'LABORATORY PERFORMANCE SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'LABORATORY PERFORMANCE ',
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
            var res = alasql('SELECT INTO XLSX("LABORATORY PERFORMANCE REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    function returnParticipatoryReportExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'Sample Name': excelData[i].sample.batchName,
                    'Round Name': excelData[i].round.roundCode,
                    'Total Enrolled Labs': excelData[i].totalLabsAndSamples,
                    'Total Unresponded': excelData[i].totalUnresponded,
                    'Total Responded': excelData[i].totalResponded,
                    'Total Evaluated': excelData[i].totalTotalEvaluated,
                    'Total Unevaluated': excelData[i].totalTotalUnevaluated,
                    'Response %': excelData[i].responseRate,

                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }


    $scope.pdfMake.generateParticipatoryReportExcel = function (data, searchData) {
        if (data.length > 0) {
            var excelData = returnParticipatoryReportExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'PARTICIPATORY SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'PARTICIPATORY REPORT ',
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
            var res = alasql('SELECT INTO XLSX("PARTICIPATORY REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }


    function returnShipmentExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'NO.': i + 1,
                    'Lab Name': excelData[i].lab.institute_name,
                    'Round Name': excelData[i].round.roundCode,
                    'Sample Name': excelData[i].sample.batchName,
                    'Sent': excelData[i].totalSent,
                    'Received': excelData[i].received,
                    'Rejected': excelData[i].rejected,
                    'Comment': excelData[i].conditionStatus


                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }


    $scope.pdfMake.generateShipmentExcel = function (data, searchData) {
        if (data.length > 0) {
            var excelData = returnShipmentExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'SHIPMENT SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'SHIPMENT REPORT ',
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
            var res = alasql('SELECT INTO XLSX("SHIPMENT REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
    function returnCorrectiveActiontExcelData(excelData) {

        if (excelData.length > 0) {
            var returnArray = [];

            for (var i = 0; i < excelData.length; i++) {
                var tempArray = {
                    'NO.': i + 1,
                    'Lab Name': excelData[i].lab.institute_name,
                    'Round Name': excelData[i].round.roundCode,
                    'Sample Name': excelData[i].sample.batchName,
                    'Remarks': excelData[i].remarks,
                    'Grade': excelData[i].grade,
                    'Date': excelData[i].dateCreated,
                    'Corr. Status': 'Yes'


                }
                returnArray.push(tempArray);
            }
            console.log(returnArray);
            return returnArray;
        } else {
            return {};
        }
    }


    $scope.pdfMake.generateCorrectiveActionExcel = function (data, searchData) {
        if (data.length > 0) {
            var excelData = returnCorrectiveActiontExcelData(data);
            console.log(excelData);
            var opts = [{
                    sheetid: 'CORRECTIVE ACTION SHEET', header: true,
                    style: "background:#00ff00",

                    caption: {
                        title: 'CORRECTIVE ACTION REPORT ',
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
            var res = alasql('SELECT INTO XLSX("CORRECTIVE ACTION REPORTS ' + today() + '.xlsx",?) FROM ?', [opts, [excelData]]);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
})