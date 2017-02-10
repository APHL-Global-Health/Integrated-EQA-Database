/**
 * Created by Abno-44 on 1/13/2017.
 */

(function () {
    var samplesModule = angular.module('ReportModule');
    ReportModule.constant('serverSamplesURL', 'http://localhost:8082/admin/Bacteriologydbci/');
    samplesModule.controller('samplesController', function ($scope, $http, $location, serverSamplesURL, EptServices, $timeout) {
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
            if (tableName == 'tbl_bac_samples_to_users') {
                $scope.samples.samplesToUsers = data.data;
            }
            if (tableName == 'tbl_bac_rounds') {
                $scope.samples.rounds = data.data;
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
            $scope.samples.getAllSamples(tableName, whereData, 1)
        }
        $scope.samples.getAllSamples = function (tableName, where, whereDelivery) {

            try {
                $scope.samples.loaderProgressSpinner = 'fa-spinner'

                var url = serverSamplesURL + EptServices.EptServiceObject.returnServerUrl(tableName);
                if (angular.isDefined(whereDelivery)) {

                    url = serverSamplesURL + 'getwheredelivery';
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
            currentTemplate: '../partialHTMLS/labOperations/viewReceivedSamples.html'
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
            if (tableName == 'tbl_bac_panels_shipments') {

            }
        }

        $scope.samples.emptyFormData = function (tableName) {
            emptyFormData(tableName)
        }


        /*---------------------------------------------------------------------add panels to shipments-----------------------------------------------------------------------------*/
        $scope.samples.currentShipment = {}
        $scope.samples.showShipmentModal = false;
        $scope.samples.panelsToShipmentArray = [];
        $scope.samples.addPanelsToShipment = function (shipment) {
            $scope.samples.currentShipment = shipment;
            $scope.samples.showShipmentModal = true;
            $scope.samples.panelsToShipmentArray = [];


        }
        $scope.samples.hideShipmentModal = function () {
            $scope.samples.showShipmentModal = false;
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
        $scope.samples.getPanelFromShipment = function (shipmentId, status) {


            if (angular.isNumber(Number(shipmentId))) {
                console.log('shipment id ' + shipmentId)
                try {
                    var where = {shipmentId: shipmentId};

                    if (shipmentId !== $scope.samples.clickedShipment || (angular.isDefined(status) && status == 1)) {
                        $scope.samples.shopAngleArrows = true;
                        $scope.samples.getAllSamples('tbl_bac_panels_shipments', where);
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

        /*-------------------------------------------------------------------End function to add Panel To Shipment----------------------------------------------------------*/
        /*---------------------------------------------------------------------END of add panels to shipments---------------------------------------------------------------*/

        /*-----------------------------------------------------------samples from panels data------------------------------------------------------------------------*/

        $scope.samples.panelArrowDown = false;
        $scope.samples.getSampleFromPanel = function (panelId, tableName) {
            try {

                console.log(panelId);
                if (isNumeric(panelId)) {
                    try {
                        var where = {panelId: panelId};
                        if ($scope.samples.clickedPanel !== panelId || tableName == 'tbl_bac_sample_to_panel') {
                            $scope.samples.panelArrowDown = true;
                            $scope.samples.getAllSamples(tableName, where);
                        } else {
                            $scope.samples.panelArrowDown = !$scope.samples.panelArrowDown;
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

        $scope.samples.returnCheckedRow = function (id, data) {
            var position = false;
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        position = true;
                        break
                    }
                }
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


                        var postedData = {
                            where: {id: id},
                            tableName: tableName,
                            updateData: data
                        }
                        console.log(postedData)
                        $scope.samples.updateWhere(postedData);
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
                if (operation != 1) {
                    return data;
                }
            } catch (Exc) {
                console.log(Exc)
            }
        }


        /*-------------------------------------------------------------------------End of returing the correct data---------------------------------------------------------*/
        /*---------------------------------------------------------------------------------------Start of custom delete function------------------------------------*/
        $scope.samples.deleteCustomRow = function (id, tableName) {

            try {
                var data = sampleData(tableName, 0);
                console.log(data)
                data = EptServices.EptServiceObject.sliceRowFromDData(id, data);

                if (data.length >= 0) {
                    sampleData(tableName, 1, data);
                    $scope.samples.deleteCustomeRowFromDb(tableName, id);
                }
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
                        console.log(response);
                    })
                    .error(function (error) {
                        console.log(error)
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
        /*--------------------------------------------------------------dispatch shipment------------------------------------------*/
        $scope.samples.dispatchShipment = function (shipment, modal) {
            try {
                $scope.samples.addPanelsToShipment(shipment);
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
        $scope.samples.updateWhere = function (postedData) {
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
                        } else {

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
                dispatchShipmentData.dateDispatched = $scope.samples.getClickedDate();
                dispatchShipmentData.shipmentStatus = 2;
                console.log(dispatchShipmentData);


                var postedData = {};
                postedData.tableName = 'tbl_bac_shipments';
                postedData.updateData = dispatchShipmentData;
                postedData.where = {id: $scope.samples.currentShipment.id};
                if (angular.isDefined(postedData)) {
                    $scope.samples.updateWhere(postedData);
                }

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
            console.log('called hidden')
            $scope.samples.showBarcode = false;
            $("#demo").print();
            console.log(div)
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
                $scope.samples.samplesActivePage('addSamples', 0)
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

        /*===================================================================END OF RECEIVE FUNCTION==================================================================*/


        /*-----------------------------------------------------------------filter to capitialize the first letter of the word---------------------------------------*/

    }).controller('DatepickerPopupCtrl', function ($scope) {
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
    })

    /*-------------------------------------------------------------------END if of the capitalizing filter-------------------------------------------------------------------------------------*/


})
();
