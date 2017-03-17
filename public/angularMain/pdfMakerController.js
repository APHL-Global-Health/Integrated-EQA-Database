var pdfModule = angular.module('ReportModule')

pdfModule.controller('PdfController', function ($scope, EptServices) {
    $scope.pdfMake = {};
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
                {text: reportHeader.toUpperCase(), style: ['header', 'centerData'], margin: [0, 0, 0, 5]},
                {text: 'Nation Public Health Laboratories', style: ['content', 'centerData']},
                {text: 'P.O BOX 145-00100,Nairobi', style: ['content', 'centerData']},
                {text: 'info@nphl.co.ke', style: ['content', 'centerData']},
                {text: 'www.nphl.or.ke',link:"http://www.nphl.or.ke", style: ['content', 'centerData'],fillColor: 'yellow', decoration:"underline"},
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
                        // paddingLeft: function(i, node) { return 4; },
                        // paddingRight: function(i, node) { return 4; },
                        // paddingTop: function(i, node) { return 2; },
                        // paddingBottom: function(i, node) { return 2; }
                    }
                },
            ],

            footer: function (page, pages) {
                return {
                    columns: [
                        {
                            text:'ABNO Softwares International',
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


    //Sample Report

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
            var reportTitle = 'NPHL Microbiology Reporting';
            $scope.pdfMake.mainGeneratorFunction(reportSubHeader, reportData, tableWidth, reportTitle);
        } else {
            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
        }
    }
})