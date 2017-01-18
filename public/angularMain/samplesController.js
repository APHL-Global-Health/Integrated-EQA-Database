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
        $scope.samples.itemsPerPage = EptServices.EptServiceObject.returnItemsPerPage();

        $scope.samples.toggleSamplesMenu = function () {
            if ($scope.samples.menuLength == 2) {
                $scope.samples.menuLength = 0;
            } else {
                $scope.samples.menuLength = 2;
            }

        }


        $scope.samples.changeItemsPerPage = function (pages) {
            $scope.samples.itemsPerPage = pages;
        }
        function changeFb(data) {
            $scope.samples.feedbackObject = data;
        }

        $scope.samples.samplesData = {};
        $scope.samples.feedbackObject = EptServices.EptServiceObject.loaderStatus;

        $scope.samples.loaderProgressSpinner = '';

        function assignHTTPResponse(data, tableName) {
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.samplesData = data.data;
            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.panelsData = data.data;
            }
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.shipmentsData = data.data;
            }

        }

        $scope.samples.shipmentsData = {};
        $scope.samples.panelsData = {};
        $scope.samples.getAllSamples = function (tableName, where) {

            try {
                $scope.samples.loaderProgressSpinner = 'fa-spinner'
                var url = serverSamplesURL + EptServices.EptServiceObject.returnServerUrl(tableName);

                var varData = {};
                varData.tableName = tableName;
                if (angular.isDefined(where)) {
                    varData.where = where;
                }


                $http
                    .post(url, varData)
                    .success(function (data) {
                        console.log(data);
                        $scope.samples.loaderProgressSpinner = '';
                        if (data.status == 1) {
                            assignHTTPResponse(data, tableName);
                        } else {
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(data.status));
                        }

                    })
                    .error(function (error) {
                        console.log(error)
                        $scope.samples.loaderProgressSpinner = '';
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                    })
            } catch (e) {
                console.log(e)
            }

        }

        $scope.samples.returnPanelStatus = function (panelStatus) {
            if (panelStatus == 1) {
                return 'Shipped';
            }
            if (panelStatus == 0) {
                return 'Unshipped';
            }
            if (panelStatus == 2) {
                return 'Delivered Ok';
            }
            if (panelStatus == 3) {
                return 'Delivered Broken';
            }
        }
        $scope.samples.returnShipmentStatus = function (shipmentStatus) {
            if (shipmentStatus == 1) {
                return 'Dispatched';
            }
            if (shipmentStatus == 0) {
                return 'In Lab';
            }
            if (shipmentStatus == 2) {
                return 'Delivered Ok';
            }
            if (shipmentStatus == 3) {
                return 'Delivered Broken';
            } else {
                return 'Unknown';
            }
        }


        $scope.samples.linksObject = {
            samplesLink: 'viewsamples',
            currentTemplate: '../partialHTMLS/viewsamples.html'
        }
        $scope.samples.samplesActivePage = function (link) {

            var currentTemplate = "../partialHTMLS/" + link + ".html";

            $scope.samples.linksObject = {
                samplesLink: link,
                currentTemplate: currentTemplate
            }


        }
        $scope.samples.sampleFormData.materialOrigin = 'NPHL';
        $scope.samples.panelFormData = {};


        $scope.samples.savingSpinner = '';
        $scope.samples.savingInProgress = false;
        $scope.samples.addSamplesToPanel = function (panel) {

            $scope.samples.currentPanel = panel;
            console.log($scope.samples.samplesData.length)
            if (angular.isUndefined($scope.samples.samplesData.length0)) {

                $scope.samples.getAllSamples('tbl_bac_samples');
            }

        }
        function changeSavingSpinner(status) {

            if (status) {
                $scope.samples.savingSpinner = 'fa-spinner';
                $scope.samples.savingInProgress = true;
            } else {
                $scope.samples.savingSpinner = '';
                $scope.samples.savingInProgress = false;
            }
        }

        function emptyFormData(tableName) {
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.sampleFormData = {};
            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.panelFormData = {};
            }
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.shipmentFormData = {};
            }
        }

        $scope.samples.checkerAll = '';
        $scope.samples.checkAll = function (checker) {

            $scope.samples.checkerAll = checker ? 'checked' : '';

        }


        $scope.samples.samplePanelArray = [];
        $scope.samples.addSampleToArray = function (id, checker) {
            try {
                $scope.samples.samplePanelArray = EptServices.EptServiceObject.returnIdArray($scope.samples.samplePanelArray, id, checker);
            } catch (error) {
                console.log(error);
            }
        }

        $scope.samples.saveSamplesToPanel = function (panel) {

            try {
                var url = serverSamplesURL + 'savesamplestopanel';
                var postedData = {};
                postedData = {
                    panelId: panel.id,
                    sampleIds : $scope.samples.samplePanelArray
                };

                $http
                    .post(url, postedData)
                    .success(function (response) {
                        console.log(response)
                    })
                    .error(function (error) {
console.log(error)
                })
            } catch (error) {

            }

        }
        $scope.samples.saveSampleFormData = function (tableName, data) {

            try {
                if (angular.isDefined(tableName) && angular.isDefined(data)) {
                    var postedData = {};
                    postedData.data = data;
                    postedData.tableName = tableName;
                    var url = serverSamplesURL + 'insert';
                    changeSavingSpinner(true);
                    try {
                        console.log(url)
                        $http.post(url, postedData)
                            .success(function (response) {

                                console.log('data')
                                console.log(response.data)
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.data.status));
                                if (response.status == 1) {
                                    emptyFormData(tableName);

                                }
                                changeSavingSpinner(false);
                            })
                            .error(function (error) {
                                changeSavingSpinner(false);
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


    }).filter('capitalizeLetter', function () {
        return function (input) {
            return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
        }
    });


})();
