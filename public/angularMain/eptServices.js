/**
 * Created by Abno-44 on 1/13/2017.
 */

var EptServices = angular.module('ReportModule');

EptServices.service('EptServices', function () {
    this.EptServiceObject = {};
    this.EptServiceObject.loaderStatus = {};
    var alphaNumHyDashRegExp=/^[a-zA-Z0-9\-\/]+$/;
    var alphaNumHyDashSpaceRegExp=/^[a-zA-Z0-9\-\/]+$/;
    this.EptServiceObject.loaderStatus = {

        fbMessage: '',
        fbStatus: false,
        fbbgColor: 'alert-success'
    }


    this.EptServiceObject.returnAlphaNumHyDashSpaceRegExp =function(){
        return  alphaNumHyDashSpaceRegExp;
    }
    this.EptServiceObject.returnAlphaNumHyDashRegExp =function(){
        return  alphaNumHyDashRegExp;
    }
    this.EptServiceObject.returnLoaderStatus = function (status) {
        var loaderStatus = {};
        if (status == 0 || status == 3) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: 'Error : Bad server response,please contact admin',
                fbbgColor: 'alert-danger'
            }
        }
        if (status == 1) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: 'Data saved successfully',
                fbbgColor: 'alert-success'
            }
        }
        if (status == 2) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: 'No data available or missing fields',
                fbbgColor: 'alert-warning'
            }
        }
        if (status == 4) {
            loaderStatus = {
                fbStatus: true,
                fbMessage: 'Please fill all the fields,or missing data',
                fbbgColor: 'alert-warning'
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

    this.EptServiceObject.returnLoaderInfo = function () {
        return EptServiceObject.loaderStatus;
    }


})
EptServices.factory('EptFactory', function () {

})
