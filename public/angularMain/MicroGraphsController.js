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

    $scope.Graphs.data = [];
    $scope.Graphs.options = {};

    $scope.Graphs.printGraph = function () {

        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);
        var divContents = $("#printgraph").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>DIV Contents</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
    $scope.Graphs.loadGraph = function () {
        $scope.Graphs.options = {
            chart: {
                type: 'multiBarChart',
                height: 450,
                margin: {
                    top: 20,
                    right: 20,
                    bottom: 50,
                    left: 55
                },
                x: function (d) {
                    return d.label;
                },
                y: function (d) {
                    return d.value;
                },
                showValues: true,
                valueFormat: function (d) {
                    return d3.format(',.4f')(d);
                },
                duration: 500,
                xAxis: {
                    axisLabel: 'Samples'
                },
                yAxis: {
                    axisLabel: 'Total Score'
                }
            }
        };

        $scope.Graphs.data = [
            {

                key: "sample A",
                values: [
                    {
                        "label": "Acceptable",
                        "value": -29.765957771107
                    },
                    {
                        "label": "Unacceptable",
                        "value": 12.565
                    }
                ]
            },
            {

                key: "Sample B",
                values: [
                    {
                        "label": "Acceptable",
                        "value": 3.765957771107
                    },
                    {
                        "label": "Unacceptable",
                        "value": 15.565
                    }
                ]
            }


        ]

    }
    $scope.Graphs.getGraph


})