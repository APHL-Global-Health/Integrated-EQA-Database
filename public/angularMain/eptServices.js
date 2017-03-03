/**
 * Created by Abno-44 on 1/13/2017.
 */

var EptServices = angular.module('ReportModule');

EptServices.service('EptServices', function () {
    this.EptServiceObject = {};
    this.EptServiceObject.loaderStatus = {};
    var itemsPerPage = 10;
    var alphaNumHyDashRegExp = /^[a-zA-Z0-9\-\/]+$/;
    var numericRegex = /^[0-9]*$/;
    var emailRegex = '';
    var alphaNumHyDashSpaceRegExp = /^[a-zA-Z0-9](?:[_\-. /]?[a-zA-Z0-9]+)*$/; ///^[a-zA-Z0-9. _\-\/]+$/;
    this.EptServiceObject.loaderStatus = {

        fbMessage: '',
        fbStatus: false,
        fbbgColor: 'alert-success'
    }
    this.EptServiceObject.returnBarcode = function () {
        var barcode = Math.random().toString();

        barcode = barcode.substring(2)

        return barcode;
    }
    this.EptServiceObject.returnNumericRegexRegExp = function () {
        return numericRegex;
    }
    this.EptServiceObject.returnEmailRegexRegExp = function () {
        return emailRegex;
    }
    this.EptServiceObject.returnAlphaNumHyDashSpaceRegExp = function () {
        return alphaNumHyDashSpaceRegExp;
    }
    this.EptServiceObject.returnAlphaNumHyDashRegExp = function () {
        return alphaNumHyDashRegExp;
    }
    this.EptServiceObject.returnTableColumn = function (table) {
        var message = '';
        if (table == 'tbl_bac_samples') {
            message = 'Batch name is already used';
        }
        else if (table == 'tbl_bac_panel_mst') {
            message = 'Panel name is already used';
        }
        else if (table == 'tbl_bac_shipment') {
            message = 'Shipment name is already used';
        }
        else if (table == 'tbl_bac_rounds') {
            message = 'round code/name already in use';
        }
        else if (table == 'tbl_bac_programs') {
            message = 'program code/name already in use';
        }
        else if (table == 'tbl_bac_expected_results') {
            message = 'Sample results already entered';
        }
        else if (table == 'tbl_bac_test_agents') {
            message = 'Test reagent already saved';
        }

        else{
            message = 'Unknown server error occurred';
        }
        return message;
    }

    this.EptServiceObject.returnLoaderStatus = function (status, message) {
        var loaderStatus = {};
        if (status == 0 || status == 3) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: angular.isDefined(message) ? message : 'Error : Bad server response,please contact admin',
                fbbgColor: 'alert-danger'
            }
        }
        if (status == 1) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: angular.isDefined(message) ? message : 'Data saved successfully',
                fbbgColor: 'alert-success'
            }
        }
        if (status == 2) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: angular.isDefined(message) ? message : 'No data available or missing fields',
                fbbgColor: 'alert-warning'
            }
        }
        if (status == 4) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: angular.isDefined(message) ? message : 'Please fill/select all the fields,or missing data',
                fbbgColor: 'alert-warning'
            }
        }
        if (status == 5) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: angular.isDefined(message) ? message : 'Unknown message',
                fbbgColor: 'alert-danger'
            }
        }

        // else {
        //     loaderStatus = {
        //         fbStatus: true,
        //         fbMessage: 'Unknown error occurred',
        //         fbbgColor: 'alert-warning'
        //     }
        // }

        return loaderStatus;
    }
    this.EptServiceObject.returnItemsPerPage = function () {
        return itemsPerPage;
    }
    this.EptServiceObject.returnServerUrl = function (table) {
        var url = '';
        if (table == 'tbl_bac_samples' || table == 'tbl_bac_panel_mst' || table == 'tbl_bac_shipments') {
            url = 'selectfromtable';
        }
        if (table == 'tbl_bac_panels_shipments' || table == 'tbl_bac_sample_to_panel') {
            url = 'selectfromtable';
        } else {
            url = 'selectfromtable';
        }
        console.log(url)

        return url;
    }
    this.EptServiceObject.sliceRowFromDData = function (id, data) {
        if (isNumeric(Number(id))) {
            if (angular.isArray(data)) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        data.splice(i, 1);
                        break;
                    }
                }
            }

            return data;
        } else {

        }
    }
    this.EptServiceObject.returnIdArrayFromObject = function (dataObject) {

        try {
            var ids = []

            if (dataObject.length > 0) {
                console.log(dataObject)
                for (var i = 0; i < dataObject.length; i++) {

                    ids.push(Number(dataObject[i]['dm_id']))
                }

            }
            console.log(ids)
            return ids;
        } catch (Exception) {
            console.log(Exception)
        }
    }
    this.EptServiceObject.EptFormatDate = function (cDate) {
        var dd = cDate.getDate();
        var mm = cDate.getMonth() + 1; //January is 0!
        var yyyy = cDate.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        return yyyy + '-' + mm + '-' + dd;
    }
    this.EptServiceObject.returnIdArray = function (arrayData, id, checker, quantity) {
        try {
            console.log(arrayData)
            if (angular.isNumber(Number(id))) {
                if (angular.isDefined(quantity)) {
                    if (checker) {
                        var ar = [];
                        ar['id'] = id;
                        ar['quantity'] = quantity;
                        var position = false;
                        if (angular.isNumber(quantity)) {
                            if (quantity > 1000) {
                                quantity = 1000;
                            }
                        } else {
                            quantity = 1;
                        }
                        if (arrayData.length > 0) {
                            for (var i = 0; i < arrayData.length; i++) {
                                if (arrayData[i]['id'] == id) {
                                    position = true;
                                    arrayData[i]['quantity'] = quantity;
                                    break
                                }
                            }
                        }
                        if (!position) {
                            arrayData.push({id: id, quantity: quantity});
                        }
                    } else {
                        var indexOf = arrayData.indexOf({id: id});
                        arrayData.splice(indexOf, 1);
                    }
                } else {
                    if (checker) {
                        arrayData.push(id);
                    } else {
                        var indexOf = arrayData.indexOf(id);
                        arrayData.splice(indexOf, 1);
                    }
                }
            } else {
                console.log('id not a number');
            }

            return arrayData;
        } catch (error) {
            console.log(error);
        }
    }


    this.EptServiceObject.returnLoaderInfo = function () {
        return EptServiceObject.loaderStatus;
    }


})
EptServices.factory('EptFactory', function () {
    var roundData = {};
return {
    setRoundsData:function(rounds){
        roundData =rounds
    },
    returnRoundData :function(){
      return  roundData ;
    }
}
})
EptServices.factory('loginDataCache', function ($cacheFactory) {
    return $cacheFactory('loginData');

})