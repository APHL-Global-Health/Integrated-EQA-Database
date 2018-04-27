var graphsController = angular.module('ReportModule');
graphsController.config(function ($httpProvider, $routeProvider, $locationProvider) {


    $routeProvider.when('/labs', {
        templateUrl: '../partialViews/LabIndex.html'
    });
})
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

    $scope.Graphs.xAxisLabel = {
        exampleXLabel: "Sample Example Data",
        samplesXLabel: "Samples",
        labsXLabel: "Laboratories",
        roundsXLabel: "Rounds",
        countiesXLabel: "Counties"
    }
    ;

    $scope.Graphs.loadGraphConfigs = function (xAxisLabel) {
        $scope.Graphs.options = {
            "chart": {
                "type": "multiBarChart",
                "height": 500,
                "stacked": false,
                "rotateLabels": 0,
                "noData":"There is currently no data or you have not selected the filters",
                "margin": {
                    "top": 20,
                    "right": 20,
                    "bottom": 100,
                    "left": 45
                },
                "clipEdge": true,
                "duration": 500,
                "xAxis": {
                    "axisLabel": xAxisLabel,
                    "showMaxMin": false
                },
                "yAxis": {
                    "axisLabel": "%",
                    "axisLabelDistance": 0
                }
            }
        };
    }

    $scope.Graphs.loadGraph = function () {
        $scope.Graphs.options = {
            "chart": {
                "type": "multiBarChart",
                "height": 450,
                "stacked": false,
                "margin": {
                    "top": 20,
                    "right": 20,
                    "bottom": 45,
                    "left": 45
                },
                "clipEdge": true,
                "duration": 500,
                "stacked": true,
                "xAxis": {
                    "axisLabel": $scope.Graphs.xAxisLabel.exampleXLabel,
                    "showMaxMin": false
                },
                "yAxis": {
                    "axisLabel": "Y Axis",
                    "axisLabelDistance": -20
                }
            }
        };

        $scope.Graphs.data = [{
            "key": "ACCEPTABLE",
            "values": [{"x": "S001", "y": "2"}, {"x": "S002", "y": "2"}, {"x": "S003", "y": "3"}]
        }, {
            "key": "UNACCEPTABLE",
            "values": [{"x": "S001", "y": "2"}, {"x": "S002", "y": "1"}, {"x": "S003", "y": "1"}]
        }]

    }

    $scope.Graphs.getResponseDataOnRoundLabCounty = function (where) {

        try {
            $scope.Graphs.data = [];
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETGENRESPONSE;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.data = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            console.log(e)
        }


    }
    $scope.Graphs.genFilter = {};


    $scope.Graphs.filter = {
        rounds: {}, counties: {}, labs: {}
    }

    $scope.Graphs.getRounds = function (where) {


        try {
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETROUNDS;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.filter.rounds = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            console.log(e)
        }


    }

    $scope.Graphs.getCounties = function (roundId) {
        try {
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETCOUNTIES;


            var varData = {};

            if (angular.isDefined(roundId)) {
                varData.where = where;
            }


            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.filter.counties = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            console.log(e)
        }


    }
    $scope.Graphs.getLabs = function (filter) {
        try {
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'
            $scope.Graphs.filter.labs = {};
            var url = SERVER_API_URL.MICROGRAPHS + GETLABS;


            var varData = {};

            if (angular.isDefined(filter)) {
                varData.where = filter;
            }


            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.filter.labs = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            console.log(e)
        }

    }
    $scope.Graphs.labsGraphData = [];
    $scope.Graphs.getResultsOnLab = function (where) {
        try {
            $scope.Graphs.labsGraphData = [];
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETRESULSONLABS;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.labsGraphData = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            console.log(e)
        }
    }
    $scope.Graphs.roundsGraphData = [];
    $scope.Graphs.getResultsOnRound = function (where) {

        try {
            $scope.Graphs.roundsGraphData = [];
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETRESULTSONROUNDS;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.roundsGraphData = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            EptServices.EptServiceObject.returnServerErrorAlert();
            $scope.Graphs.loaderProgressSpinner = '';
            console.log(e)
        }

    }
    $scope.Graphs.countiesGraphData = [];
    $scope.Graphs.getResultsOnCounties = function (where) {
        try {
            $scope.Graphs.countiesGraphData = [];
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETRESULTSONCOUNTIES;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.countiesGraphData = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            EptServices.EptServiceObject.returnServerErrorAlert();
            $scope.Graphs.loaderProgressSpinner = '';
            console.log(e)
        }

    }
    $scope.Graphs.responsesGraphData = [];
    $scope.Graphs.getSampleResponses=function(where) {
        try {
            $scope.Graphs.responsesGraphData = [];
            $scope.Graphs.loaderProgressSpinner = 'fa-spinner'

            var url = SERVER_API_URL.MICROGRAPHS + GETSAMPLERESPONSES;


            var varData = {};

            if (angular.isDefined(where)) {
                varData.where = where;
            }

            console.log(varData);
            $http
                .post(url, varData)
                .success(function (data) {
                    console.log(data);
                    $scope.Graphs.loaderProgressSpinner = '';
                    if (data.status == 1) {
                        $scope.Graphs.responsesGraphData = data.data;
                    } else {


                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                    if (data.data == false) {
                        EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                    }
                })
                .error(function (error) {
                    console.log(error)
                    $scope.Graphs.loaderProgressSpinner = '';

                })
        } catch (e) {
            EptServices.EptServiceObject.returnServerErrorAlert();
            $scope.Graphs.loaderProgressSpinner = '';
            console.log(e)
        }

    }


})