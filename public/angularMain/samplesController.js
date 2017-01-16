/**
 * Created by Abno-44 on 1/13/2017.
 */

(function () {
    var samplesModule = angular.module('ReportModule');
    ReportModule.constant('serverSamplesURL', 'http://localhost:8082/admin/Bacteriologydbci/');
    samplesModule.controller('samplesController', function ($scope, $http, serverSamplesURL, EptServices) {
        $scope.samples = {};
        $scope.samples.menuLength = 2;

        $scope.samples.alphaNumHyDashRegExp = new RegExp(EptServices.EptServiceObject.returnAlphaNumHyDashRegExp());

        $scope.samples.alphaNumHyDashSpaceRegExp = new RegExp(EptServices.EptServiceObject.returnAlphaNumHyDashSpaceRegExp());

        $scope.samples.sampleFormData = {}
        $scope.samples.toggleSamplesMenu = function () {
            if ($scope.samples.menuLength == 2) {
                $scope.samples.menuLength = 0;
            } else {
                $scope.samples.menuLength = 2;
            }

        }
        function changeFb(data) {
            $scope.samples.feedbackObject = data;
        }

        $scope.samples.samplesData = {};
        $scope.samples.feedbackObject = EptServices.EptServiceObject.loaderStatus;
        $scope.samples.getAllSamples = function () {

            try {
                var url = serverSamplesURL + 'selectfromtable';
                $http
                    .post(url)
                    .success(function (data) {

                        console.log(data.status)
                        if (data.status == 1) {
                            $scope.samples.samplesData = 'called';
                            $scope.samples.samplesData = data.data;
                        } else {
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(data.status));
                        }

                    })
                    .error(function (error) {
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                    })
            } catch (e) {
                console.log(e)
            }
        }
        $scope.samples.linksObject = {
            samplesLink: 'view'
        }
        $scope.samples.samplesActivePage = function (link) {

            $scope.samples.linksObject = {
                samplesLink: link
            }


        }
        $scope.samples.sampleFormData.materialOrigin = 'NPHL';


        $scope.samples.saveSampleFormData = function (tableName, data) {

            try {
                if (angular.isDefined(tableName) && angular.isDefined(data)) {
                    var postedData = {};
                    postedData.data = data;
                    postedData.tableName = tableName;
                    var url = serverSamplesURL + 'insert';
                    try {
                        console.log(url)
                        $http.post(url, postedData)
                            .success(function (response) {
                                console.log(response)
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));
                                if (response.status == 1) {
                                    $scope.samples.sampleFormData = {};


                                }
                            })
                            .error(function (error) {
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                            })
                    } catch (error) {
                        console.log(error)
                    }

                } else {
                    changeFb(EptServices.EptServiceObject.returnLoaderStatus(4));
                }
            } catch (error) {
                changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                console.log(error)
            }


        }


    })


})();
