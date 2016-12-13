'use strict';

var myapp = angular.module('ReportModule');

myapp.controller('myctrl', function ($scope, $http, $timeout) {

    $scope.chartTypes = [
//    {"id": "line", "title": "Line"},
//    {"id": "spline", "title": "Smooth line"},
//    {"id": "area", "title": "Area"},
//    {"id": "areaspline", "title": "Smooth area"},
//    {"id": "column", "title": "Column"},
//    {"id": "bar", "title": "Bar"},
//    {"id": "pie", "title": "Pie"},
//    {"id": "scatter", "title": "Scatter"}
    ];

    $scope.dashStyles = [
        {"id": "Solid", "title": "Solid"},
        {"id": "ShortDash", "title": "ShortDash"},
        {"id": "ShortDot", "title": "ShortDot"},
        {"id": "ShortDashDot", "title": "ShortDashDot"},
        {"id": "ShortDashDotDot", "title": "ShortDashDotDot"},
        {"id": "Dot", "title": "Dot"},
        {"id": "Dash", "title": "Dash"},
        {"id": "LongDash", "title": "LongDash"},
        {"id": "DashDot", "title": "DashDot"},
        {"id": "LongDashDot", "title": "LongDashDot"},
        {"id": "LongDashDotDot", "title": "LongDashDotDot"}
    ];

    $scope.chartSeries = [
        {"name": "Malaria", "data": [19, 78]},
        {"name": "HIV", "data": [11, 66]}
    ];


    $scope.chartStack = [
        {"id": '', "title": "No"},
        {"id": "normal", "title": "Normal"},
        {"id": "percent", "title": "Percent"}
    ];

    $scope.addPoints = function () {
        var seriesArray = $scope.chartConfig.series;
        var rndIdx = Math.floor(Math.random() * seriesArray.length);
        seriesArray[rndIdx].data = seriesArray[rndIdx].data.concat([1, 10, 20])
    };

    $scope.addSeries = function () {
        var rnd = []
        for (var i = 0; i < 10; i++) {
            rnd.push(Math.floor(Math.random() * 20) + 1)
        }
        $scope.chartConfig.series.push({
            data: rnd
        })
    }

    $scope.removeRandomSeries = function () {
        var seriesArray = $scope.chartConfig.series;
        var rndIdx = Math.floor(Math.random() * seriesArray.length);
        seriesArray.splice(rndIdx, 1)
    }

    $scope.removeSeries = function (id) {
        var seriesArray = $scope.chartConfig.series;
        seriesArray.splice(id, 1)
    }

    $scope.toggleHighCharts = function () {
        this.chartConfig.useHighStocks = !this.chartConfig.useHighStocks
    }

    $scope.replaceAllSeries = function () {
        var data = [
            {name: "first", data: [10]},
            {name: "second", data: [3]},
            {name: "third", data: [13]}
        ];
        $scope.chartConfig.series = data;
    };
    $scope.graphData = {};
    $scope.graphData.showGraphStatus = false;
//    $scope.graphData.showGraph = function (showGraphStatus) {
//
//        $scope.graphData.showGraphStatus = true;
//        



//    }

    $scope.showGraph = false;
    $scope.graphData.getBackendJason = function (title) {
        try {
            
           
            $http.get("http://localhost:8082/reports/repository/results")
                    .success(function (data) {
                      $scope.showGraph = true;
                        $timeout(function () {
                            $scope.chartConfig = {
                                options: {
                                    chart: {
                                        type: 'column'
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

                        }, 300)
                    })
                    .error(function (error) {
                        console.log(error)
                    })

        } catch (E) {

        }


    }

     // $scope.graphData.getBackendJason();

    $scope.reflow = function () {
        $scope.$broadcast('highchartsng.reflow');
    };


});