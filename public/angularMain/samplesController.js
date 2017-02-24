/**
 * Created by Abno-44 on 1/13/2017.
 */

(function () {
    var samplesModule = angular.module('ReportModule');
    ReportModule.constant('serverSamplesURL', 'http://localhost:8082/admin/Bacteriologydbci/');
    samplesModule.controller('samplesController', function ($scope, $http, $location, serverSamplesURL, EptServices, EptFactory, $timeout) {
        $scope.samples = {};
        $scope.samples.menuLength = 2;

        $scope.samples.alphaNumHyDashRegExp = new RegExp(EptServices.EptServiceObject.returnAlphaNumHyDashRegExp());
        $scope.samples.numericOnly = new RegExp(EptServices.EptServiceObject.returnNumericRegexRegExp());
        $scope.samples.emailAddressRegex = new RegExp(EptServices.EptServiceObject.returnEmailRegexRegExp());
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
        $scope.samples.getRoundsWithFactorySave = function (round) {
            EptFactory.setRoundsData(round)
        }
        $scope.samples.changeItemsPerPage = function (pages) {
            $scope.samples.itemsPerPage = pages;
        }
        function changeFb(data) {
            $scope.samples.feedbackObject = data;
            $('.alert').show('slow');

            //  $(window).scrollTop($('#alert').offset().top);
            $("#alert").focus();
        }

        $scope.samples.samplesData = {};
        $scope.samples.feedbackObject = EptServices.EptServiceObject.loaderStatus;
        $scope.samples.labUsers = {}
        $scope.samples.loaderProgressSpinner = '';
        $scope.samples.panelsToShipment = {};
        $scope.samples.sampleToPanel = {};
        $scope.samples.samplesToUsers = {};
        $scope.samples.rounds = {};
        $scope.samples.couriers = {}
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
            if (tableName == 'tbl_bac_panels_shipments') {
                console.log(data)

                $scope.samples.panelsToShipment = data.data
            }
            if (tableName == 'tbl_bac_sample_to_panel') {
                $scope.samples.sampleToPanel = data.data;
            }
            if (tableName == 'participant') {
                $scope.samples.labs = data.data;
            }
            if (tableName == 'data_manager') {
                $scope.samples.labUsers = data.data;
            }
            if (tableName == 'tbl_bac_ready_labs') {
                $scope.samples.readyLabs = data.data;
            }
            if (tableName == 'tbl_bac_samples_to_users') {
                $scope.samples.samplesToUsers = data.data;
            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.rounds = data.data;
                EptFactory.setRoundsData(data.data);
            }
            if (tableName == 'tbl_bac_couriers') {
                $scope.samples.couriers = data.data;
            }

        }

        $scope.samples.returnSoundStatus = function (status, days) {
            if (Number(days) > 0) {
                return 'Active';
            }
            else if (Number(days) <= 0) {
                return 'Expired';
            }

            else {
                return 'Unknown';
            }
        }
        $scope.samples.shipmentsData = {};
        $scope.samples.panelsData = {};
        $scope.samples.labs = {}
        $scope.samples.getAllLabs = function () {

            var where = {status: 'active'};
            console.log(where)
            $scope.samples.getAllSamples('participant', where);
            console.log($scope.samples.labs);
        }

        $scope.samples.getShipmentsForDelivery = function (tableName, columnName, where) {
            var whereData = {
                column: columnName,
                status: where
            }
            $scope.samples.clickedShipmentData = {};
            $scope.samples.showShipmentInfoStatus = false;
            $scope.samples.getAllSamples(tableName, whereData, 1)
        }
        var alertStartRound = ''
        $scope.samples.startRound = function (round) {

            $.confirm({
                title: 'Confirm!',
                theme: 'supervan',
                content: 'Please confirm start of round! ' + round.roundName,
                buttons: {
                    'start round': {
                        btnClass: 'btn-blue',
                        action: function () {

                            alertStartRound = $.alert('starting round,please wait...!');
                            $scope.samples.startRoundHttp(round);
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

        }
        $scope.samples.startRoundHttp = function (round) {
            try {
                var postedData = {
                    where: {id: round.id},
                    tableName: 'tbl_bac_rounds',
                    updateData: {
                        startRoundFlag: 1
                    }
                }
                console.log(postedData)
                // $scope.samples.updateWhere(postedData, 1);
                var url = serverSamplesURL + 'updateroundstart';
                $http
                    .post(url, postedData)
                    .success(function (data) {
                        console.log(data)
                        alertStartRound.close();
                        $.alert('Round started OK!');
                        $scope.samples.showRoundFullDetails(round);
                        $scope.samples.currentRound.startRoundFlag = 1
                    })
                    .error(function (error) {
                        $.alert('Error Occurred');
                    })
            } catch (error) {
                console.log(error);
            }
        }
        $scope.samples.roundStatus = function (days, status) {
            if (days > 0 && status == 1) {
                return 'Running';
            }
            if (days > 0 && status == 0) {
                return 'Active,Not Started';
            }
            if (days == 0 && status == 1) {
                return 'Expired';
            }
            else {
                return 'Unknown';
            }

        }
        $scope.samples.getAllSamples = function (tableName, where, whereDelivery) {

            try {
                $scope.samples.loaderProgressSpinner = 'fa-spinner'

                var url = serverSamplesURL + EptServices.EptServiceObject.returnServerUrl(tableName);

                if (angular.isDefined(whereDelivery)) {

                    url = serverSamplesURL + 'getwheredelivery';

                    if (whereDelivery == 'panel') {
                        url = serverSamplesURL + 'getdistinctpanels';

                    }

                }

                var varData = {};
                console.log(url)
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
                            assignHTTPResponse({}, tableName);
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
        $scope.samples.returnSampleStatus = function (panelStatus) {
            if (panelStatus == 1) {
                return 'Delivered';
            }
            if (panelStatus == 0) {
                return 'Unshipped';
            }
            if (panelStatus == 2) {
                return 'Dispatched';
            }
            if (panelStatus == 3) {
                return 'Delivered ';
            }
            if (panelStatus == 4) {
                return 'Delivered & Checked Ok';
            }
            if (panelStatus == 5) {
                return 'Delivered & Rejected';
            }
        }
        $scope.samples.returnPanelStatus = function (panelStatus) {
            if (panelStatus == 2) {
                return 'Dispatched';
            }
            if (panelStatus == 0) {
                return 'Unshipped';
            }
            if (panelStatus == 1) {
                return 'Delivered';
            }
            if (panelStatus == 3) {
                return 'Delivered ';
            }
            if (panelStatus == 4) {
                return 'Delivered & Checked Ok';
            }
            if (panelStatus == 5) {
                return 'Delivered & Rejected';
            }
            if (panelStatus == 6) {
                return 'Del\'d,Good/Rejected';
            }
            else {
                return "Unknown status"
            }
        }
        $scope.samples.returnShipmentStatus = function (shipmentStatus) {

            if (shipmentStatus == 2) {
                return 'Dispatched';
            }
            if (shipmentStatus == 0) {
                return 'In Lab';
            }
            if (shipmentStatus == 1) {
                return 'Delivered Ok';
            }
            if (shipmentStatus == 3) {
                return 'Delivered ';
            }
            if (shipmentStatus == 5) {
                return 'Rejected ';
            }
            else {
                return 'Unknown';
            }
        }


        $scope.samples.linksObject = {
            samplesLink: 'viewsamples',
            currentTemplate: '../partialHTMLS/viewsamples.html'
        }

        $scope.samples.linksLabObject = {
            samplesLink: 'viewReceivedSamples',
            currentTemplate: '../partialHTMLS/labOperations/addReceivedSamples.html'
        }
        $scope.samples.getDistinctShipmentsForDelivery = function () {
            try {
                var where = {
                    type: 0
                }
                var
                    $http
            } catch (Exc) {
                console.log(Exc)
            }
        }
        $scope.samples.samplesActivePage = function (link, module) {
            $scope.samples.createNanobar(0)
            if (module == 1) {
                var currentTemplate = "../partialHTMLS/labOperations/" + link + ".html";

                $scope.samples.linksLabObject = {
                    samplesLink: link,
                    currentTemplate: currentTemplate
                }
                console.log($scope.samples.linksLabObject);
            } else {
                var currentTemplate = "../partialHTMLS/" + link + ".html";

                $scope.samples.linksObject = {
                    samplesLink: link,
                    currentTemplate: currentTemplate
                }
            }
            console.log($scope.samples.linksObject)

        }
        $scope.samples.returnPanelColorFromStatus = function (status, type) {

            if (status == 0) {
                return type == 1 ? 'panel-primary' : 'btn-primary';
            }
            else if (status == 1) {
                return type == 1 ? 'panel-primary' : 'btn-primary';
            } else if (status == 2) {
                return type == 1 ? 'panel-info' : 'btn-info';
            }
            else if (status == 3) {
                return type == 1 ? 'panel-warning' : 'btn-warning';
            }
            else if (status == 4) {
                return type == 1 ? 'panel-success' : 'btn-success';
            }
            else if (status == 5) {
                return type == 1 ? 'panel-danger' : 'btn-danger';
            }
            else {
                return type == 1 ? 'panel-default' : 'btn-default';
            }
        }
        $scope.samples.addSampleGrading = function (sample) {
            $scope.samples.samplesActivePage('addsamplegrading', 0);
            $scope.samples.clickedSample = sample;
        }


        $scope.samples.sampleFormData.materialOrigin = 'NPHL';
        $scope.samples.panelFormData = {};
        $scope.samples.shipmentFormData = {};

        $scope.samples.savingSpinner = '';
        $scope.samples.savingInProgress = false;
        $scope.samples.showPanelModal = false;
        $scope.samples.hidePanelModal = function () {
            $scope.samples.showPanelModal = false;
        }
        $scope.samples.addSamplesToPanel = function (panel) {

            $scope.samples.currentPanel = panel;
            $scope.samples.showPanelModal = true;
            console.log($scope.samples.samplesData.length)
            $scope.samples.samplePanelArray = [];
            if ($scope.samples.samplesData.length == 0) {

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
            console.log($scope.samples.savingSpinner)
        }

        $scope.samples.courierFormData = {};
        function emptyFormData(tableName) {

            $scope.samples.showMainTable(tableName)
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.sampleFormData = {};
            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.panelFormData = {};
            }
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.shipmentFormData = {};
            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.roundFormData = {};
            }
            if (tableName == 'tbl_bac_couriers') {
                $scope.samples.courierFormData = {};
            }
            if (tableName == 'tbl_bac_panels_shipments') {

            }

        }

        $scope.samples.showMainTable = function (tableName) {
            console.log(tableName)
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.samplesActivePage('viewshipments', 0);
                $scope.samples.getAllSamples('tbl_bac_shipments');
            }
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.samplesActivePage('viewsamples', 0);
                $scope.samples.getAllSamples('tbl_bac_samples');
            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.samplesActivePage('viewpanels', 0);
                $scope.samples.getAllSamples('tbl_bac_panel_mst');
            }
            if (tableName == 'tbl_bac_couriers') {
                $scope.samples.samplesActivePage('viewcouriers', 0);
                $scope.samples.getAllSamples('tbl_bac_couriers');
            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.samplesActivePage('viewrounds', 0);
                $scope.samples.getShipmentsForDelivery('tbl_bac_rounds', 'status', '0,1');

            }
        }
        $scope.samples.emptyFormData = function (tableName) {
            emptyFormData(tableName)
        }


        /*---------------------------------------------------------------------add panels to shipments-----------------------------------------------------------------------------*/
        $scope.samples.currentShipment = {}
        $scope.samples.showShipmentModal = false;
        $scope.samples.panelsToShipmentArray = [];
        $scope.samples.showPanel = '';
        $scope.samples.addPanelsToShipment = function (shipment) {
            $scope.samples.currentShipment = shipment;
            $scope.samples.showShipmentModal = true;
            $scope.samples.panelsToShipmentArray = [];
            $scope.samples.showPanel = 'panels'


        }
        $scope.samples.hideShipmentModal = function () {
            $scope.samples.showShipmentModal = false;
        }

        $scope.samples.saveLabsToRound = function (round) {
            try {
                if (angular.isDefined(round)) {
                    changeSavingSpinner(true);
                    var postedData = {};
                    postedData.roundId = round.id;
                    postedData.labId = $scope.samples.labsToRoundArray;
                    var url = serverSamplesURL + 'savelabstoround';
                    $http
                        .post(url, postedData)
                        .success(function (response) {
                            console.log(response)
                            changeSavingSpinner(false);
                            if (response.status == 1) {
                                $scope.samples.labsToRoundArray = [];


                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));

                                $scope.samples.samplesActivePage('viewRounds', 0);


                            } else {
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status, 'Error : possibly you trying to add a panel  to already add shipment'));
                            }

                        })
                        .error(function (error) {
                            changeSavingSpinner(false);
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                        })

                } else {
                    changeSavingSpinner(false);
                    console.log('error')
                }
            } catch (error) {
                changeFb(EptServices.EptServiceObject.returnLoaderStatus(0, error));
            }
        }
        $scope.samples.savePanelsToShipments = function (shipment) {
            try {
                if (angular.isDefined(shipment)) {
                    changeSavingSpinner(true);
                    var postedData = {};
                    postedData.shipmentId = shipment.id;
                    postedData.panelId = $scope.samples.panelsToShipmentArray;
                    var url = serverSamplesURL + 'savepaneltoshipment';
                    $http
                        .post(url, postedData)
                        .success(function (response) {
                            console.log(response)
                            changeSavingSpinner(false);
                            if (response.status == 1) {
                                $scope.samples.panelsToShipmentArray = [];

                                $scope.samples.getPanelFromShipment(shipment.id, 1);
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));

                                $scope.samples.showShipmentModal = false;


                            } else {
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status, 'Error : possibly you trying to add a panel  to already add shipment'));
                            }

                        })
                        .error(function (error) {
                            changeSavingSpinner(false);
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                        })

                } else {
                    changeSavingSpinner(false);
                    console.log('error')
                }
            } catch (error) {
                changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status, message));
            }
        }

        /*-------------------------------------------------------------------END savePanelsToShipments----------------------------------------------------------*/


        /*-------------------------------------------------------------------Get panels from a specific shipment----------------------------------------------------------*/
        $scope.samples.shopAngleArrows = false;

        $scope.samples.getDistinctPanel = function (tableName) {
            try {

            } catch (Exception) {
                console.log(Exception)
            }
        }
        $scope.samples.getPanelFromShipment = function (shipmentId, status) {


            if (angular.isNumber(Number(shipmentId))) {
                console.log('shipment id ' + shipmentId)
                try {
                    var where = {shipmentId: shipmentId};

                    if (shipmentId !== $scope.samples.clickedShipment || (angular.isDefined(status) && status == 1)) {
                        $scope.samples.shopAngleArrows = true;
                        $scope.samples.panelsToShipment = {};

                        $scope.samples.getAllSamples('tbl_bac_panels_shipments', where, 'panel');
                        /*select distinct getdistinctpanels*/
                        $scope.samples.getDistinctPanel('tbl_bac_panels_shipments');

                    } else {
                        $scope.samples.shopAngleArrows = !$scope.samples.shopAngleArrows;
                    }
                    $scope.samples.clickedShipment = shipmentId;
                } catch (Exc) {
                    console.log(Exc);
                }
            } else {
                console.log('id not numberic')
            }

        }
        /*-------------------------------------------------------------------END get Panel From Shipment----------------------------------------------------------*/


        /*-------------------------------------------------------------------End function to add Panel To Shipment------------------------------------------------------*/
        $scope.samples.addPanelToShipment = function (id, checker) {
            try {
                $scope.samples.panelsToShipmentArray = EptServices.EptServiceObject.returnIdArray($scope.samples.panelsToShipmentArray, id, checker);
            } catch (error) {
                console.log(error);
            }
        }
        $scope.samples.labsToRoundArray = [];
        $scope.samples.addLabsToRoundArray = function (id, checker) {
            try {
                $scope.samples.labsToRoundArray = EptServices.EptServiceObject.returnIdArray($scope.samples.labsToRoundArray, id, checker);
            } catch (error) {
                console.log(error);
            }
        }

        $scope.samples.shipmentsToRoundArray = [];
        $scope.samples.addShimentToRound = function (id, checker) {
            try {
                $scope.samples.shipmentsToRoundArray = EptServices.EptServiceObject.returnIdArray($scope.samples.shipmentsToRoundArray, id, checker);
            } catch (error) {
                console.log(error);
            }
        }
        /*-------------------------------------------------------------------End function to add Panel To Shipment----------------------------------------------------------*/
        /*---------------------------------------------------------------------END of add panels to shipments---------------------------------------------------------------*/

        /*-----------------------------------------------------------samples from panels data------------------------------------------------------------------------*/

        $scope.samples.panelArrowDown = false;
        $scope.samples.getSampleFromPanel = function (panelId, tableName) {
            try {


                if (isNumeric(panelId)) {
                    try {
                        var where = {panelId: panelId};
                        if ($scope.samples.clickedPanel !== panelId || tableName == 'tbl_bac_sample_to_panel') {

                            if ($scope.samples.clickedPanel !== panelId) {
                                $scope.samples.panelArrowDown = true;
                            } else {
                                $scope.samples.panelArrowDown = !$scope.samples.panelArrowDown;

                            }
                            $scope.samples.getAllSamples(tableName, where);
                            console.log('Called')
                        } else {
                            console.log('unknown tabke name')
                        }


                    } catch (Exc) {
                        console.log(Exc);
                    }
                }
                $scope.samples.clickedPanel = panelId;

            }
            catch (error) {
                console.log(error)
            }

        }

        /*---------------------------------------------------------------------------END of samples from panels data--------------------------------------------------------------------------------*/
        $scope.samples.checkerAll = '';
        /*-------------START  : check all rows ------*/
        $scope.samples.checkAll = function (checker) {

            $scope.samples.checkerAll = checker ? 'checked' : '';

        }

        /*array to hold checked samples*/
        $scope.samples.samplePanelArray = [];

        /*-------------------------------------------------------------------------START of function  for adding sample to a panel---------------------------------------------------------------------------------*/

        $scope.samples.addSampleToArray = function (id, checker, quantity) {
            try {
                //$scope.samples.samplePanelArray = EptServices.EptServiceObject.returnIdArray($scope.samples.samplePanelArray, id, checker);

                if (angular.isDefined(quantity)) {
                    $scope.samples.samplePanelArray = EptServices.EptServiceObject.returnIdArray($scope.samples.samplePanelArray, id, checker, quantity);
                } else {
                    $scope.samples.samplePanelArray = EptServices.EptServiceObject.returnIdArray($scope.samples.samplePanelArray, id, checker);
                }
                console.log($scope.samples.samplePanelArray)
            } catch (error) {
                console.log(error);
            }
        }
        /*-------------------------------------------------------------------------END of adding a sample to array---------------------------------------------------------------------------------*/

        /*-------------------------------------------------------------------------START of function to return row checked status---------------------------------------------------------------------------------*/
        function closeModal(id) {
            $('#' + id).modal('hide');
        }

        $scope.samples.indexOfId = function (id, arr) {

            return arr.indexOf(id) > -1;

        }
        $scope.samples.saveShipmentsToRound = function (arr, round) {
            if (round.id > 0) {
                $.confirm({
                    title: 'Confirm changes!',
                    theme: 'supervan',
                    content: 'Please note the current round will be overwritten to the shipments',
                    buttons: {
                        'Confirm': {
                            btnClass: 'btn-blue',
                            action: function () {

                                alertStartRound = $.alert('Saving information,please wait...!');
                                changeSavingSpinner(true);
                                var url = serverSamplesURL + 'saveshipmentstoround';
                                var data = {
                                    roundId: round.id,
                                    roundCode: round.id,
                                    shipmentIds: arr
                                }
                                $http.post(url, data)
                                    .success(function (response) {
                                        changeSavingSpinner(false);
                                        //changeFb(EptServices.EptServiceObject.returnLoaderStatus(1, 'shipments saved successfully'));
                                        alertStartRound.close();
                                        $.alert('Data save successfully');
                                        $scope.samples.showAddShipment = true
                                        $scope.samples.shipmentsToRoundArray = [];
                                    })
                                    .error(function (error) {
                                        changeSavingSpinner(false);
                                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                                    })

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


            }


        }
        $scope.samples.returnCheckedRow = function (id, data) {
            console.log(data)
            var position = false;
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        position = true;
                        break
                    }
                }
            } else {
                console.log('no datra')
            }
            return position;


        }
        /*-------------------------------------------------------------------------END of function to return checked Status---------------------------------------------------------------------------------*/

        /*-------------------------------------------------------------------------START watcher for slow feedback hiding---------------------------------------------------------------------------------*/

        $scope.$watch('samples.feedbackObject', function () {
            console.log($scope.samples.feedbackObject);
            if ($scope.samples.feedbackObject.fbStatus) {

                $timeout(function () {
                    $('.alert').hide('slow');
                    $timeout(function () {
                        $scope.samples.feedbackObject.fbStatus = false;
                    }, 1000)

                }, 3300)

            }
        });

        /*-------------------------------------------------------------------------End of watcher for feedback slow hiding---------------------------------------------------------------------------------*/


        /*-------------------------------------------------------------------------START of save samples to a selected Panel---------------------------------------------------------------------------------*/
        $scope.samples.saveSamplesToPanel = function (panel) {

            try {

                var url = serverSamplesURL + 'savesamplestopanel';
                var postedData = {};
                console.log(JSON.stringify($scope.samples.samplePanelArray))
                postedData = {
                    panelId: panel.id,
                    sampleIds: $scope.samples.samplePanelArray
                };
                console.log(panel);
                changeSavingSpinner(true);
                $http
                    .post(url, postedData)
                    .success(function (response) {
                        console.log(response)
                        changeSavingSpinner(false);
                        if (response.status == 1) {
                            $scope.samples.samplePanelArray = [];
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));
                        } else {
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(0, 'Error : possibly you trying to add sample   to already added panel'));
                        }
                    })
                    .error(function (error) {
                        changeSavingSpinner(false);
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                        console.log(error)
                    })
            } catch (error) {
                console.log(error);
            }

        }

        /*--------------------------------------------------------------------End of saving function------------------------------------------------------------------------------------------*/

        /*---------------------------------------------------------------------Save Data to DB generic function------------------------------------------------------------------------ */
        $scope.samples.saveSampleFormData = function (tableName, data) {

            try {
                if (angular.isDefined(tableName) && angular.isDefined(data)) {
                    var postedData = {};
                    if (angular.isUndefined(data.id)) {

                        if (tableName == 'tbl_bac_panel_mst' || tableName == 'tbl_bac_samples') {
                            data.barcode = EptServices.EptServiceObject.returnBarcode();
                        }
                        postedData.data = data;
                        postedData.tableName = tableName;
                        console.log(data);

                        var url = serverSamplesURL + 'insert';
                        changeSavingSpinner(true);
                        try {
                            console.log(data)
                            $http.post(url, postedData)
                                .success(function (response) {

                                    console.log('data')
                                    console.log(response.data)

                                    if (response.data.status == 1) {
                                        emptyFormData(tableName);
                                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.data.status));
                                    } else {
                                        var message = EptServices.EptServiceObject.returnTableColumn(tableName)
                                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.data.status, message));

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
                        var id = data.id;
                        delete data.id;
                        $scope.samples.currentEditingId = id

                        var postedData = {
                            where: {id: id},
                            tableName: tableName,
                            updateData: data
                        }
                        console.log(postedData)
                        $scope.samples.updateWhere(postedData, 1);
                    }
                }
                else {
                    changeFb(EptServices.EptServiceObject.returnLoaderStatus(4));
                }

            } catch (error) {
                changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                console.log(error)
            }


        }
        /*-------------------------------------------------------------------------------END of saving generic function------------------------------------------------------------------------------------*/
        /*-------------------------------------------------------------------------------return the correct sample data from table name---------------------------------*/
        $scope.samples.couriers = {}
        function sampleData(tableName, operation, changedData) {
            try {
                var data = {};

                if (tableName == 'tbl_bac_samples') {

                    data = $scope.samples.samplesData;
                    if (operation == 1) {
                        $scope.samples.samplesData = changedData;
                    }
                }
                if (tableName == 'tbl_bac_panel_mst') {
                    data = $scope.samples.panelsData;
                    if (operation == 1) {
                        $scope.samples.panelsData = changedData;
                    }
                }
                if (tableName == 'tbl_bac_couriers') {
                    data = $scope.samples.couriers;
                    if (operation == 1) {
                        $scope.samples.couriers = changedData;
                    }
                }
                if (tableName == 'tbl_bac_shipments') {
                    data = $scope.samples.shipmentsData;
                    if (operation == 1) {
                        $scope.samples.shipmentsData = changedData;
                    }
                }
                if (tableName == 'tbl_bac_panels_shipments') {
                    data = $scope.samples.panelsToShipment;
                    if (operation == 1) {
                        $scope.samples.panelsToShipment = changedData;
                    }
                    console.log($scope.samples.panelsToShipment)
                }
                if (tableName == 'tbl_bac_sample_to_panel') {

                    data = $scope.samples.sampleToPanel;
                    if (operation == 1) {
                        $scope.samples.sampleToPanel = changedData;
                    }
                }
                if (tableName == 'tbl_bac_samples_to_users') {

                    data = $scope.samples.samplesToUsers;
                    if (operation == 1) {
                        $scope.samples.samplesToUsers = changedData;
                    }
                }
                if (tableName == 'tbl_bac_rounds') {

                    data = $scope.samples.rounds;
                    if (operation == 1) {
                        $scope.samples.rounds = changedData;
                    }
                }
                if (operation != 1) {
                    return data;
                }
            } catch (Exc) {
                console.log(Exc)
            }
        }

        $scope.samples.showAddShipment = true;

        /*-------------------------------------------------------------------------End of returing the correct data---------------------------------------------------------*/
        /*---------------------------------------------------------------------------------------Start of custom delete function------------------------------------*/
        $scope.samples.deleteCustomRow = function (id, tableName) {

            try {
                $.confirm({
                    title: 'Confirm delete!',
                    theme: 'supervan',
                    content: 'Are you sure you wanna delete record',
                    buttons: {
                        'Delete': {
                            btnClass: 'btn-blue',
                            action: function () {

                                alertStartRound = $.alert('Deleting record,please wait...!');
                                var data = sampleData(tableName, 0);
                                console.log(data)
                                data = EptServices.EptServiceObject.sliceRowFromDData(id, data);

                                if (data.length >= 0) {
                                    sampleData(tableName, 1, data);
                                    $scope.samples.deleteCustomeRowFromDb(tableName, id);
                                }

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


            } catch (Exc) {
                console.log(Exc);
            }


        }
        /*---------------------------------------------------------------------------------------END of custom delte function-------------------*/
        /*----------------------------------------------------------------------STart custome function to delete from db-------------------------*/
        $scope.samples.deleteCustomeRowFromDb = function (tableName, id) {
            try {
                var postedData = {};
                postedData.tableName = tableName;
                postedData.where = id;
                var url = serverSamplesURL + 'customdelete';
                $http.post(url, postedData)
                    .success(function (response) {
                        alertStartRound.close();
                        $.alert('1 Record deleted');
                    })
                    .error(function (error) {
                        console.log(error)
                        alertStartRound.close();
                        $.alert('Error occurred,record could not be deleted');
                    })
            } catch (Exc) {
                console.log(Exc);
            }
        }


        /*--------------------------------------------------------------------end of custom data to delete from db--------------------------------*/
        /*create modal path*/
        $scope.samples.returnActiveModal = function (link) {

            var currentTemplate = "../partialHTMLS/modals/" + link + ".html";

            return currentTemplate;


        }
        $scope.samples.addShipmentsToRound = function (round) {
            $scope.samples.clickedRoundInfo = round;
            console.log(round)
            $scope.samples.showAddShipment = false;
        }
        /*--------------------------------------------------------------dispatch shipment------------------------------------------*/
        $scope.samples.dispatchShipment = function (shipment, modal) {
            try {
                $scope.samples.addPanelsToShipment(shipment);
                $scope.samples.showPanel = 'dispatch';
            } catch (Exc) {
                console.log(Exc)
            }

        }

        /*------------------------------------------------------end of dispatch shipping-----------------------------------------------*/
        /*-----------------------------------------------------------------------STart of mark as received shipment-----------------------*/
        $scope.samples.showClickedShipment = '';
        $scope.samples.receiveShipment = function (shipment, modal) {

            try {
                $scope.samples.addPanelsToShipment(shipment);
            } catch (Exc) {
                console.log(Exc)
            }

        }
        function addIdToEditing(tableName) {
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.sampleFormData.id = $scope.samples.currentEditingId;
            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.panelFormData.id = $scope.samples.currentEditingId;
                ;
            }
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.shipmentFormData.id = $scope.samples.currentEditingId;
            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.roundFormData.id = $scope.samples.currentEditingId;
            }
            if (tableName == 'tbl_bac_couriers') {
                $scope.samples.courierFormData.id = $scope.samples.currentEditingId;
            }
        }

        $scope.samples.updateWhere = function (postedData, type) {
            try {

                var url = serverSamplesURL + 'updatetablewhere';
                changeSavingSpinner(true);
                console.log(postedData)
                $http.post(url, postedData)
                    .success(function (response) {
                        console.log(response)
                        changeSavingSpinner(false);
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));


                        if (response.status == 1) {
                            emptyFormData(postedData.tableName);

                            $scope.samples.receiveShipmentFormData = {};
                            if (type == 1) {
                                $scope.samples.showMainTable(postedData.tableName)
                                if (postedData.tableName == 'tbl_bac_shipments') {
                                    $scope.samples.showShipmentModal = false;
                                    alertStartRound.close();
                                    $.alert('Data update successfully');
                                }
                            }

                        } else {
                            if (type == 1) {
                                addIdToEditing(postedData.tableName)
                            }
                            $scope.samples.sampleFormData.id = postedData.where.id;
                        }
                    })
                    .error(function (error) {
                        changeSavingSpinner(false);
                        console.log(error);
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                    })
            } catch (Exc) {
                changeSavingSpinner(true);
                console.log(Exc)
            }
        }
        $scope.samples.saveDispatchShipmentForm = function (dispatchShipmentData) {
            try {

                dispatchShipmentData.shipmentStatus = 2;
                console.log(dispatchShipmentData);

                $.confirm({
                    title: 'Confirm!',
                    theme: 'supervan',
                    content: 'Are you sure you want to dispatch,this action can not be undone! ',
                    buttons: {
                        'Dispatch Shipment': {
                            btnClass: 'btn-blue',
                            action: function () {

                                alertStartRound = $.alert('Dispatching shipment,please wait...!');
                                var postedData = {};
                                postedData.tableName = 'tbl_bac_shipments';
                                postedData.updateData = dispatchShipmentData;
                                postedData.where = {id: $scope.samples.currentShipment.id};
                                if (angular.isDefined(postedData)) {
                                    $scope.samples.updateWhere(postedData, 1);
                                }

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


            } catch (Exc) {
                console.log(Exc);
            }
        }
        $scope.samples.updateStatus = function (tableName, status, id) {
            var postedData = {};
            try {
                postedData.updateData = {deliveryStatus: status};
                postedData.tableName = tableName;
                postedData.where = {id: id}
                $scope.samples.updateWhere(postedData);
                if ($scope.samples.clickedShipmentData.id > 1) {
                    $scope.samples.getPanelFromShipment($scope.samples.clickedShipmentData.id, 1);
                } else {
                    $scope.samples.getSampleFromPanel($scope.receive.clickedPanel.id, 'tbl_bac_sample_to_panel');
                }

            } catch (Exception) {
                console.log(Exception)
            }
        }
        $scope.samples.updateStatusShipment = function (tableName, status, id) {
            var postedData = {};
            try {
                postedData.updateData = {shipmentStatus: status};
                postedData.tableName = tableName;
                postedData.where = {id: id}
                $scope.samples.updateWhere(postedData);
                $timeout(function () {
                    $scope.samples.getShipmentsForDelivery('tbl_bac_shipments', 'shipmentStatus', '2,3,4,5');
                }, 100)

            } catch (Exception) {
                console.log(Exception)
            }
        }
        $scope.samples.samplesIssuedToUser = {}


        $scope.samples.showRoundFullUsers = function (sample) {
            $scope.samples.clickedSample = sample;
            $scope.samples.samplesActivePage('sampleFullInfo', 0);
        }
        $scope.samples.sampleToUsers = {};
        $scope.samples.getSampleAllUsers = function (sample) {
            try {
                var url = serverSamplesURL + 'getsampleallusers';
                var wherer = {
                    sampleId: sample.id
                }
                $scope.samples.sampleToUsers = {}
                changeSavingSpinner(true);
                $http
                    .post(url, where)
                    .success(function (response) {
                        changeSavingSpinner(false);
                        if (response.status == 1) {
                            $scope.samples.sampleToUsersr = response.data;
                        } else {
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(1, 'No Records available'));
                        }
                    })
                    .error(function (error) {
                        changeSavingSpinner(false);
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0, 'Server Err ' + error));
                    })
            } catch (Exception) {

            }
        }
        $scope.samples.getReadyLabs = function () {

        }
        $scope.samples.readyLabs = {}
        $scope.samples.addLabsToRound = function (round, all) {


            if (all == 1) {

            } else {
                $scope.samples.samplesActivePage('addLabsToRound', 0);
            }
            $scope.samples.readyLabs = {};
            console.log(round)
            var where = {
                roundId: round.id,
                status: 1
            }
            if (all == 1) {
                where.status = 2
            }
            $scope.samples.currentRound = round;
            $scope.samples.getAllSamples('tbl_bac_ready_labs', where);

        }
        $scope.samples.returnFormattedLeft = function (daysLeft) {
            var delta = Math.abs(daysLeft * 24 * 3600);

// calculate (and subtract) whole days
            var days = Math.floor(delta / 86400);
            delta -= days * 86400;

// calculate (and subtract) whole hours
            var hours = Math.floor(delta / 3600) % 24;
            delta -= hours * 3600;

// calculate (and subtract) whole minutes
            var minutes = Math.floor(delta / 60) % 60;
            delta -= minutes * 60;

// what's left is seconds
            var seconds = Math.round(delta % 60);

            return days + " Days " + hours + " Hours " + minutes + " Minutes " + seconds + " Seconds";
        }
        $scope.samples.timerCountDown = function (daysLeft) {

            var timer = daysLeft * 24 * 60 * 60;
            console.log(daysLeft)
            if (timer > 0) {
                var timout = $timeout(function () {
                    try {
                        if (timer > 0) {
                            timer = timer - 1;
                            $scope.samples.currentRound.daysLeft = (timer / (24 * 3600));
                            $timeout.cancels(timout);
                        } else {

                        }
                    } catch (e) {
                        console.log(e)
                    }
                }, 1000)
            }

        }
        $scope.samples.getUserIssuedSamples = function (where) {
            try {
                var url = serverSamplesURL + 'getusersamplesissued';
                changeSavingSpinner(true);
                $http
                    .post(url, where)
                    .success(function (response) {
                        changeSavingSpinner(false);
                        if (response.status == 1) {
                            $scope.samples.samplesIssuedToUser = response.data;
                        } else {
                            changeFb(EptServices.EptServiceObject.returnLoaderStatus(1, 'No Records available'));
                        }
                    })
                    .error(function (error) {
                        changeSavingSpinner(false);
                        changeFb(EptServices.EptServiceObject.returnLoaderStatus(0, 'Server Err ' + error));
                    })


            } catch (Exception) {
                console.log(Exception);
            }

        }
        $scope.samples.saveSampleToUser = function () {
            try {

                var users = $scope.samples.usersToSamples;
                if (users.length > 0) {

                    try {

                        var url = serverSamplesURL + 'saveuserstosample';
                        var postedData = {};
                        postedData = {
                            sampleId: $scope.samples.clickedSample.sampleId,
                            panelToSampleId: $scope.samples.clickedSample.id,
                            roundId: $scope.samples.clickedSample.roundId,
                            userIds: users
                        };
                        console.log(postedData);
                        changeSavingSpinner(true);
                        $http
                            .post(url, postedData)
                            .success(function (response) {
                                console.log(response)
                                changeSavingSpinner(false);
                                if (response.status == 1) {
                                    $scope.samples.samplePanelArray = [];
                                    $scope.samples.addUsersToSamples(1, 2)
                                    changeFb(EptServices.EptServiceObject.returnLoaderStatus(response.status));

                                } else {
                                    changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                                }
                                $scope.samples.showMultiSelect('', 1);
                            })
                            .error(function (error) {
                                changeSavingSpinner(false);
                                changeFb(EptServices.EptServiceObject.returnLoaderStatus(0));
                                console.log(error)
                            })
                    } catch (error) {
                        console.log(error);
                    }

                } else {
                    changeFb(EptServices.EptServiceObject.returnLoaderStatus(4, 'please select atleas'));
                }
            } catch (Exception) {
                console.log(Exception)
            }
        }
        $scope.samples.usersToSamples = []
        $scope.samples.addUsersToSamples = function (id, status) {
            console.log(id)

            if (status == 1) {
                if (angular.isDefined(id)) {
                    if ($scope.samples.usersToSamples.indexOf(Number(id)) < 0) {
                        $scope.samples.usersToSamples.push(Number(id));
                    }
                }
            }
            if (status == 0) {
                console.log(id)
                var position = $scope.samples.usersToSamples.indexOf(Number(id));
                console.log(position)
                if (Number(position) > -1) {
                    console.log('should splice')
                    $scope.samples.usersToSamples.splice(position, 1)
                }
            }
            if (status == 2) {
                $scope.samples.usersToSamples = []
            }
            if (status == 3) {

                $scope.samples.usersToSamples = EptServices.EptServiceObject.returnIdArrayFromObject($scope.samples.labUsers);
            }

            $scope.samples.userIds = '';
            console.log($scope.samples.usersToSamples);

        }
        $scope.samples.showMultiSelectFlag = false;
        $scope.samples.showMultiSelect = function (sample, type) {
            $scope.samples.clickedSample = sample;
            if (type == 1) {
                $("#users_table").show('fast');
                $("#multi_select").hide('fast');
                $scope.samples.showMultiSelectFlag = false;
            } else {
                $scope.samples.showMultiSelectFlag = true;
                $("#users_table").hide('fast');
                $("#multi_select").show('fast');

                console.log($scope.samples.showMultiSelectFlag);
            }
        }
        $scope.samples.getAllFacilityUsers = function (tableName) {
            try {
                $scope.samples.getAllSamples(tableName);
            } catch (Exception) {
                console.log(Exception)
            }
        }
        function checkIfAllSamplesAdded() {
            var samples = $scope.samples.sampleToPanel;
            try {
                if (samples.length > 0) {
                    var goodcounter = 0;
                    var rejectedcounter = 0;
                    console.log('checking length')
                    for (var i = 0; i < samples.length; i++) {
                        console.log('Running inside looop')
                        console.log(samples[i])
                        if (samples[i]['deliveryStatus'] == 4) {

                            console.log('checking okay delivery')
                            goodcounter++;

                        }
                        if (samples[i]['deliveryStatus'] == 5) {

                            console.log('checking bad delivery')
                            rejectedcounter++;

                        }
                        console.log($scope.receive.clickedPanel.totalSamplesAdded + ',counter ' + rejectedcounter)
                        if ((goodcounter + rejectedcounter) == $scope.receive.clickedPanel.totalSamplesAdded) {

                            var update;
                            if (rejectedcounter > 0 && goodcounter > 0) {
                                update = 6
                            }
                            else if (goodcounter == $scope.receive.clickedPanel.totalSamplesAdded) {
                                update = 4
                            } else {
                                update = 5
                            }
                            console.log(samples[i]);
                            $scope.samples.panelReceived(samples[i], 'tbl_bac_panels_shipments', update, 1);

                        }
                    }

                }
            }
            catch (Exception) {
                console.log(Exception)
            }

        }

        $scope.samples.updateStatus = function (tableName, status, id) {
            var postedData = {};
            try {
                postedData.updateData = {deliveryStatus: status};
                postedData.tableName = tableName;
                postedData.where = {id: id}
                $scope.samples.updateWhere(postedData);


                $timeout(function () {
                    // $scope.samples.getSampleFromPanel(panelInfo.panelId, 'tbl_bac_sample_to_panel');
                    $scope.samples.getSampleFromPanel($scope.receive.clickedPanel.panelId, 'tbl_bac_sample_to_panel');
                }, 200)
                $timeout(function () {
                    if (tableName == 'tbl_bac_sample_to_panel') {
                        console.log('trying to update panel data')
                        checkIfAllSamplesAdded()
                    }
                }, 1000)

            } catch (Exception) {
                console.log(Exception)
            }
        }

        $scope.samples.panelReceived = function (panel, table, status, from) {
            try {

                if (angular.isDefined(panel.panelId)) {
                    if (from == 1) {
                        postedData = {
                            where: {
                                panelId: panel['panelId'],
                                participantId: panel['participantId'],
                                shipmentId: panel.shipmentId
                            },
                            tableName: table,
                            updateData: {deliveryStatus: status}
                        }
                        console.log(postedData)

                        $scope.samples.updateWhere(postedData);
                    } else {
                        var postedData = {
                            where: {
                                panelId: panel.panelId,
                                participantId: panel.participantId,
                                shipmentId: panel.shipmentId
                            },
                            tableName: table,
                            updateData: {deliveryStatus: status}
                        }

                        $scope.samples.updateWhere(postedData);
                        var postedData = {
                            where: {
                                panelId: panel.panelId,
                                participantId: panel.participantId,
                                shipmentId: panel.shipmentId
                            },
                            tableName: 'tbl_bac_panels_shipments',
                            updateData: {deliveryStatus: status}
                        }

                        $scope.samples.updateWhere(postedData);

                        postedData = {
                            where: {id: panel.panelId},
                            tableName: 'tbl_bac_panel_mst',
                            updateData: {panelStatus: status}
                        }
                        console.log(postedData)

                        $scope.samples.updateWhere(postedData);


                    }
                    $timeout(function () {
                        $scope.samples.getShipmentsForDelivery('tbl_bac_panels_shipments', 'deliveryStatus', '3,4,5,6');
                    }, 200)
                }
            } catch (Exc) {
                console.log(Exc)
            }
        }

        $scope.samples.showShipmentInfoStatus = false;
        $scope.samples.showShipmentAndPanels = function (link, shipment) {
            $scope.samples.samplesActivePage(link, 1)
            $scope.samples.showShipmentInfoStatus = true;

            $scope.samples.clickedShipmentData = shipment;

            $scope.samples.getPanelFromShipment(shipment.id, 1)
        }
        $scope.samples.currentBarcodeData = 'test code'

        $scope.samples.showBarcode = function () {
            // try {
            //     $("#barcode").barcode("124512652", "ean13",
            //         {barWidth: 2, barHeight: 50}
            //     );
            //     console.log($scope.samples.currentBarcodeData + ' works')
            // } catch (Exc) {
            //     console.log(Exc)
            // }
        }
        $scope.samples.printDiv = function (div) {
            // $("#demo").clone().printThis(
            //     {
            //         debug: true,        //     * show the iframe for debugging
            //         importCSS: true,           // * import page CSS
            //         importStyle: false,         //* import style tags
            //         printContainer: true,       //* grab outer container as well as the contents of the selector
            //         // loadCSS: "path/to/my.css",  //* path to additional css file - use an array [] for multiple
            //         pageTitle: "",           //   * add title to print page
            //         removeInline: false,       // * remove all inline styles from print elements
            //         printDelay: 333,            //* variable print delay; depending on complexity a higher value may be necessary
            //         header: null,               //* prefix to html
            //         footer: null,               //* postfix to html
            //         base: false,                //* preserve the BASE tag, or accept a string for the URL
            //         formValues: true,           //* preserve input/form values
            //         canvas: false,
            //     }
            // );
            console.log('div loaded ' + div);
            $scope.samples.showBarcode = false;
            $("#" + div).print();
            console.log(div)
        }
        $scope.samples.printLabels = function (id, total) {
            var url = serverSamplesURL + 'generateLabels/?id=' + id + '&total=' + total;
            var win = window.open(url, '_blank');
            win.focus();
        }
        $scope.samples.showBarcode = false;
        $scope.samples.generateBarcode = function (data) {
            try {
                $scope.samples.showBarcode = true;
                $timeout(function () {
                    $scope.samples.currentBarcodeData = data;

                    var barcodeString = data.barcode;
                    console.log(barcodeString)
                    $("#demo").barcode(barcodeString, "ean13",
                        {barWidth: 3, barHeight: 60}
                    );
                }, 300)


            } catch (Exc) {
                console.log(Exc)
            }
        }
        $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
        $scope.samples.saveReceiveShipmentForm = function (receiveShipmentData) {
            try {
                receiveShipmentData.dateReceived = $scope.samples.getClickedDate();
                receiveShipmentData.shipmentStatus = 3;
                console.log(receiveShipmentData);


                var postedData = {};
                postedData.tableName = 'tbl_bac_shipments';
                postedData.updateData = receiveShipmentData;
                postedData.where = {id: $scope.samples.currentShipment.id};
                if (angular.isDefined(postedData)) {
                    $scope.samples.updateWhere(postedData);
                }

            } catch (Exc) {
                console.log(Exc);
            }
        }
        /*---------------------------------------------------------------------End of receiving function--------------------------------*/
        /*onloader function*/

        $scope.samples.showLoadingFile = function () {


        }

        $scope.samples.currenctClickedDate = new Date();

        $scope.samples.sampleFormData.datePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
        $scope.samples.panelFormData.panelDatePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
        $scope.samples.panelFormData.panelDateOfDelivery = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
        $scope.samples.shipmentFormData.datePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);

        $scope.samples.setDatePrepared = function () {

            $scope.samples.panelFormData.panelDatePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);

        }
        $scope.samples.setShipmentDatePrepared = function () {
            $scope.samples.shipmentFormData.datePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
        }
        $scope.samples.setSampleDatePrepared = function () {
            $scope.samples.sampleFormData.datePrepared = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
        }
        $scope.samples.setExpectedDeliveryDate = function () {

            $scope.samples.panelFormData.panelDateOfDelivery = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);

        }

        $scope.samples.changeCurrentDate = function (cDate) {
            try {
                $scope.samples.currenctClickedDate = cDate;
            } catch (Exc) {
                console.log(Exc);
            }

        }

        $scope.samples.getClickedDate = function () {

            var cDate = EptServices.EptServiceObject.EptFormatDate($scope.samples.currenctClickedDate);
            $scope.samples.currenctClickedDate = cDate;
            return cDate;

        }
        $scope.samples.showRoundFullDetails = function (round) {
            $scope.samples.shipmentsData = {};
            $scope.samples.currentRound = round;
            $scope.samples.showRoundInfo = !$scope.samples.showRoundInfo;
            console.log(round)
            var where = {roundId: round.id}
            if (round != '') {
                $scope.samples.getAllSamples('tbl_bac_shipments', where)
            }

        }
        $scope.samples.createNanobar = function (len) {

            var options = {};
            var simplebar = new Nanobar();
            simplebar.go(len);

        }

        //===============================================================edit functions=============================================================================

        $scope.samples.editFunction = function (data, tableName) {
            if (tableName == 'tbl_bac_shipments') {
                $scope.samples.shipmentFormData = data;
                $scope.samples.samplesActivePage('addShipments', 0)
            }
            if (tableName == 'tbl_bac_samples') {
                $scope.samples.sampleFormData = data;
                $scope.samples.samplesActivePage('addSamples', 0);


            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.roundFormData = data;
                console.log(data)
                $scope.samples.samplesActivePage('addrounds', 0);


            }
            if (tableName == 'tbl_bac_couriers') {
                $scope.samples.courierFormData = data;
                console.log(data)
                $scope.samples.samplesActivePage('addcourier', 0);


            }
            if (tableName == 'tbl_bac_panel_mst') {
                $scope.samples.panelFormData = data;
                $scope.samples.samplesActivePage('addPanels', 0)
            }
            if (tableName == 'tbl_bac_panel_to_shipment') {
                $scope.samples.shipmentFormData = data;
                $scope.samples.samplesActivePage('addShipments', 0)
            }
        }
        //===================================================================end of edit function===================================================================

        //===========================================================================================================================================================
        //--------------------------------------------------------------RECEIVE PANELS AND SHIPMENT FUNCTIONS START HERE---------------------------------------------
        //===========================================================================================================================================================

        $scope.receive = {}
        $scope.receive.showPanelStatus = false;
        $scope.receive.showPanelFullDetails = function (panelInfo) {
            $scope.samples.sampleToPanel = {};
            console.log(panelInfo)
            $scope.receive.clickedPanel = panelInfo;
            $scope.samples.getSampleFromPanel(panelInfo.panelId, 'tbl_bac_sample_to_panel');
            $scope.samples.samplesActivePage('panelFullDetails', 1);
            $scope.receive.showPanelStatus = true;
        }
        $scope.samples.showFullShipmentInfo = function (shipment) {
            $scope.samples.sampleToPanel = {};
            $scope.samples.samplesActivePage('viewShipmentFullInfo', 0);
            $scope.samples.clickedShipmentFull = shipment;
            $scope.samples.getPanelFromShipment(shipment.id, 1);
        }

        /*===================================================================END OF RECEIVE FUNCTION==================================================================*/


        /*-----------------------------------------------------------------filter to capitialize the first letter of the word---------------------------------------*/

    });
    samplesModule.controller('DatepickerPopupCtrl', function ($scope) {
        $scope.today = function () {
            $scope.dt = new Date();
        };
        $scope.today();

        $scope.clear = function () {
            $scope.dt = null;
        };

        $scope.inlineOptions = {
            customClass: getDayClass,
            minDate: new Date(),
            showWeeks: true
        };

        $scope.dateOptions = {
            dateDisabled: disabled,
            formatYear: 'yy',
            maxDate: new Date(2020, 5, 22),
            minDate: new Date(),
            startingDay: 1
        };

        // Disable weekend selection
        function disabled(data) {
            var date = data.date,
                mode = data.mode;
            return false;//mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
        }

        $scope.toggleMin = function () {
            $scope.inlineOptions.minDate = $scope.inlineOptions.minDate ? null : new Date();
            $scope.dateOptions.minDate = $scope.inlineOptions.minDate;
        };

        $scope.toggleMin();

        $scope.open1 = function () {
            $scope.popup1.opened = true;
        };

        $scope.open2 = function () {
            $scope.popup2.opened = true;
        };

        $scope.setDate = function (year, month, day) {
            $scope.dt = new Date(year, month, day);
        };

        $scope.formats = ['dd-MMMM-yyyy'];
        $scope.format = $scope.formats[0];
        $scope.altInputFormats = ['M!/d!/yyyy'];

        $scope.popup1 = {
            opened: false
        };

        $scope.popup2 = {
            opened: false
        };

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 1);
        $scope.events = [
            {
                date: tomorrow,
                status: 'full'
            },
            {
                date: afterTomorrow,
                status: 'partially'
            }
        ];

        function getDayClass(data) {
            var date = data.date,
                mode = data.mode;
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0, 0, 0, 0);

                for (var i = 0; i < $scope.events.length; i++) {
                    var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);

                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        }
    }).directive("datePicker", function () {
        return {
            template: "<div class='' ng-controller='DatepickerPopupCtrl'>" +
            "<p class='input-group'>" +
            "<input type='text' class='form-control' ng-change='samples.changeCurrentDate(dt)' " +
            " required uib-datepicker-popup ng-model='dt' is-open='popup2.opened' datepicker-options='dateOptions' ng-required='true' close-text='Close'/>" +
            "<span class='input-group-btn'>" +
            "<button type='button' class='btn btn-default' ng-click='open2()'>" +
            "<i class='glyphicon glyphicon-calendar'></i>" +
            "</button>" +
            "</span>" +
            "</p>" +
            "</div>"
        };
    })
        .filter('capitalizeLetter', function () {
            return function (input) {
                return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
            }
        }).filter('spaceCapitals', function () {
        return function (input) {
            return input.replace(/([A-Z])/g, ' $1').trim();
        }
    });
    samplesModule.controller('CalendarCtrl', function ($scope, $compile, $timeout, uiCalendarConfig, EptFactory) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        $scope.calendar = {};
        $scope.changeTo = 'Kiswahili';
        $scope.events = []
        $scope.calendar.showCalendar = true;
        $scope.calendar.getRoundData = function () {

            var rounds = EptFactory.returnRoundData();
            console.log(rounds)
            var roundArray = [];
            for (var i = 0; i < rounds.length; i++) {
                var tempSmall = {
                    title: rounds[i]['roundName'],
                    id: rounds[i]['id'],
                    start: rounds[i]['startDate'],
                    end: rounds[i]['endDate']
                };
                roundArray.push(tempSmall)
            }
            console.log(roundArray)

            $scope.events = roundArray;

            $scope.eventsF();


        }

        /* event source that pulls from google.com */

        /* event source that contains custom events on the scope */

        /* event source that calls a function on every view switch */
        $scope.eventsF = function (start, end, timezone, callback) {

            $scope.calendar.showCalendar = false;
            var s = new Date(start).getTime() / 1000;
            var e = new Date(end).getTime() / 1000;
            var m = new Date(start).getMonth();
            var events = [{
                title: 'Feed Me ' + m,
                start: s + (50000),
                end: s + (100000),
                allDay: false,
                className: ['customFeed']
            }];
            try {
                callback(events);
            } catch (e) {

            }

            $scope.calendar.showCalendar = true;
        };

        $scope.calEventsExt = {
            color: '#f00',
            textColor: 'yellow',
            events: [
                {
                    type: 'party',
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    type: 'party',
                    title: 'Lunch 2',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    type: 'party',
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        };
        /* alert on eventClick */
        $scope.alertOnEventClick = function (date, jsEvent, view) {
            $scope.alertMessage = (date.title + ' was clicked ');
        };
        /* alert on Drop */
        $scope.alertOnDrop = function (event, delta, revertFunc, jsEvent, ui, view) {
            $scope.alertMessage = ('Event Dropped to make dayDelta ' + delta);
        };
        /* alert on Resize */
        $scope.alertOnResize = function (event, delta, revertFunc, jsEvent, ui, view) {
            $scope.alertMessage = ('Event Resized to make dayDelta ' + delta);
        };
        /* add and removes an event source of choice */
        $scope.addRemoveEventSource = function (sources, source) {
            var canAdd = 0;
            angular.forEach(sources, function (value, key) {
                if (sources[key] === source) {
                    sources.splice(key, 1);
                    canAdd = 1;
                }
            });
            if (canAdd === 0) {
                sources.push(source);
            }
        };
        /* add custom event*/
        $scope.addEvent = function () {
            $scope.events.push({
                title: 'Open Sesame',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                className: ['openSesame']
            });
        };
        /* remove event */
        $scope.remove = function (index) {
            $scope.events.splice(index, 1);
        };
        /* Change View */
        $scope.changeView = function (view, calendar) {
            uiCalendarConfig.calendars[calendar].fullCalendar('changeView', view);
        };
        /* Change View */
        $scope.renderCalender = function (calendar) {
            $timeout(function () {
                if (uiCalendarConfig.calendars[calendar]) {
                    uiCalendarConfig.calendars[calendar].fullCalendar('render', 'agendaWeek');
                }
            });
        };
        /* Render Tooltip */
        $scope.eventRender = function (event, element, view) {
            element.attr({
                'tooltip': event.title,
                'tooltip-append-to-body': true
            });
            $compile(element)($scope);
        };
        /* config object */
        $scope.uiConfig = {
            calendar: {
                height: 450,
                editable: true,
                header: {
                    left: 'title',
                    center: '',
                    right: 'today prev,next'
                },
                eventClick: $scope.alertOnEventClick,
                eventDrop: $scope.alertOnDrop,
                eventResize: $scope.alertOnResize,
                eventRender: $scope.eventRender
            }
        };

        $scope.changeLang = function () {
            if ($scope.changeTo === 'Kiswahili') {
                $scope.uiConfig.calendar.dayNames = ["Jumapili", "Jumatatu", "Jumanne", "Jumatano", "Alamisi", "Ijumaa", "Jumamosi"];
                $scope.uiConfig.calendar.dayNamesShort = ["Jumapili", "Jumatatu", "Jumanne", "Jumatano", "Alamisi", "Ijumaa", "Jumamosi"];
                $scope.changeTo = 'English';
            } else {
                $scope.uiConfig.calendar.dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                $scope.uiConfig.calendar.dayNamesShort = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                $scope.changeTo = 'Kiswahili';
            }
        };
        /* event sources array*/
        $scope.eventSources = [$scope.events, $scope.eventSource, $scope.eventsF];

    });

    /*-------------------------------------------------------------------END if of the capitalizing filter-------------------------------------------------------------------------------------*/


})

();
