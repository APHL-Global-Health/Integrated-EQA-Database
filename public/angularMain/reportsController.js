var reportsModule = angular.module('ReportModule');
reportsModule.constant('serverReportURL', 'http://localhost:8082/admin/reports/')
reportsModule.controller('ReportsController', function ($scope, $log, $http, serverSamplesURL, serverReportURL, EptServices, EptFactory, $timeout, loginDataCache) {

    $scope.$log = $log;
    $scope.reports = {};
    $scope.reports.loaderStatus = true;
    $scope.reports.currentReports = 'Issued Samples Report';
    console.log($scope.reports.currentReports)
    $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/generalReport.html';
    $scope.reports.changeCurrentReport = function (htmlFile, report) {
        $scope.reports.loaderStatus = true;
        $scope.reports.currentReports = report;
        $scope.reports.loadedCurrentUrl = '../partialHTMLS/reports/' + htmlFile + '.html';
        console.log($scope.reports.loadedCurrentUrl);

    }
    $scope.reports.hideFaLoader = function () {
        $scope.reports.loaderStatus = false;
    }
    $scope.reports.generalRoundData = {};

    $scope.reports.whereGenRounds = {}
    $scope.reports.loader = '';

    function showAjaxLoader(status) {
        if (status) {
            $scope.reports.loader = 'fa-spinner';
        } else {
            $scope.reports.loader = '';
        }
    }

    function showResponseMessage(status) {
        var msg = '';
        if (status.status == 0) {

        }
        $.alert(status.msg)

    }

    $scope.reports.getGeneralRoundReport = function (where) {
        var url = serverReportURL + 'getgeneralroundreport';
        showAjaxLoader(true)
        console.log(where);
        $http.post(url, where)
            .success(function (response) {
                console.log(response)
                showAjaxLoader(false)
                if (response.status == 1) {
                    $scope.reports.generalRoundData = response.data;
                } else if (response.status == 0) {
                    $scope.reports.generalRoundData = {};
                    showResponseMessage(response)
                } else {
                    $.alert('Unknown error occurred');
                }

            })
            .error(function (error) {
                showAjaxLoader(false)
            })

    }
    $scope.reports.shipmentsToRound = {};
    $scope.reports.showShipmentEvaluationForRound = function (round, check) {
        if (angular.isDefined(round)) {
            if (!angular.isDefined(check)) {
                $scope.reports.changeCurrentReport('shipmentEvaluation');
            }
            $scope.reports.currentRoundEvaluation = round;


            var where = {roundId: round.id}
            var url = serverReportURL + 'getshipmentsforround';
            console.log(where);
            $http.post(url, where)
                .success(function (response) {
                    console.log(response)
                    showAjaxLoader(false)
                    if (response.status == 1) {
                        $scope.reports.shipmentsToRound = response.data;
                    } else if (response.status == 0) {
                        $scope.reports.shipmentsToRound = {};
                        showResponseMessage(response)
                    } else {
                        $.alert('Unknown error occurred');
                    }

                })
                .error(function (error) {
                    showAjaxLoader(false)
                })


        }
    }
    $scope.reports.responseInfoData = {};
    $scope.reports.getUserResults = function (where) {
        var url = serverReportURL + 'getresponsefeedback';
        showAjaxLoader(true)
        $http.post(url, where)
            .success(function (response) {
                console.log(response)
                showAjaxLoader(false)
                if (response.status == 1) {
                    $scope.reports.responseInfoData = response.data;
                } else if (response.status == 0) {
                    $scope.reports.responseInfoData = {};
                    showResponseMessage(response)
                } else {
                    $.alert('Unknown error occurred');
                }

            })
            .error(function (error) {
                showAjaxLoader(false)
            })
    }
    var alertStartRound = '';
    $scope.reports.evaluateRound = function () {
        var where = $scope.reports.currentRoundEvaluation;
        var message = 'are you sure you want to evaluate this round ' + where.roundName;
        var evaluateRound = function () {
            alertStartRound = $.alert('<i class="fa fa-spin fa-spinner"></i> Evaluating round,please wait...!');
            var url = serverReportURL + 'evaluateround';
            showAjaxLoader(true)
            $http.post(url, where)
                .success(function (response) {
                    console.log(response)
                    showAjaxLoader(false)
                    alertStartRound.close();
                    if (response.status == 1) {
                        $scope.reports.currentRoundEvaluation.evaluated = 1;
                        $scope.reports.showShipmentEvaluationForRound($scope.reports.currentRoundEvaluation, true);


                        $.alert('<i class="fa fa-check-circle"></i>Round Evaluation was successful!');

                    } else {
                        $.alert('<i class="fa fa-exclamation-triangle fa-warning"></i>Round Evaluation was unsuccessful');
                    }

                })
                .error(function (error) {
                    showAjaxLoader(false)
                    $.alert('<i class="fa fa-exclamation-triangle text-danger"></i> Server error occurred,please try again.');
                })

        }


        $scope.reports.confirmDialog(message, evaluateRound)
    }
    $scope.reports.evaluateShipment = function (shipment) {
        function evaluateShipment() {
            var url = serverReportURL + 'evaluateresults';
            showAjaxLoader(true)
            $http.post(url, shipment)
                .success(function (response) {
                    console.log(response)
                    showAjaxLoader(false)
                    alertStartRound.close();
                    if (response.status == 1) {
                        $scope.reports.showShipmentEvaluationForRound($scope.reports.currentRoundEvaluation, true);


                        $.alert('<i class="fa fa-check-circle"></i> Evaluation was successful!');

                    } else {
                        $.alert('<i class="fa fa-exclamation-triangle fa-warning"></i> Evaluation was unsuccessful');
                    }

                })
                .error(function (error) {
                    showAjaxLoader(false)
                })
        }

        var msg = '';
        msg = shipment.evaluated == 1 ? ' AGAIN' : '';
        $.confirm({
            title: 'Confirm Evaluation!',
            theme: 'supervan',
            content: 'Are you want to evaluate this shipment ' + shipment.shipmentName + msg,
            buttons: {
                'Evaluate': {
                    btnClass: 'btn-blue',
                    action: function () {

                        alertStartRound = $.alert('<i class="fa fa-spin fa-spinner"></i> Evaluating shipment,please wait...!');
                        evaluateShipment();

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
    $scope.reports.confirmDialog = function (message, callbackFunction) {
        $.confirm({
            title: 'Confirm !',
            theme: 'supervan',
            content: message,
            buttons: {
                'Confirm': {
                    btnClass: 'btn-blue',
                    action: function () {
                        callbackFunction();

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
    $scope.reports.showResults = true;
    $scope.samples.currentResults = {};
    $scope.reports.userResults = {};


    $scope.reports.showReponseFullInfo = function (samples) {
        try {
            $scope.reports.showResults = false;
            $scope.reports.userResults = {};
            $scope.reports.currentResults = samples;
            console.log($scope.reports.currentResults);
            var url = serverReportURL + 'getlabuserresponse';
            showAjaxLoader(true)
            $http.post(url, samples)
                .success(function (response) {
                    console.log(response);
                    showAjaxLoader(false)
                    if (response.status == 1) {
                        $scope.reports.userResults = response.data;
                    } else {
                        $.alert('<i class="fa fa-exclamation-triangle fa-warning"></i> Could not retrieve report data');
                    }
                })
                .error(function () {
                    showAjaxLoader(false)
                })
        } catch (Exc) {

        }
    }
    $scope.reports.wherePublishRounds = {};
    $scope.reports.publishRoundResults = function (round, published) {
        var message = '';
        published == 1 ? message = 'Are you sure you want ot publish results for ' + round.roundName : message = 'Are you sure you want to cancel publication of results for ' + round.roundName;
        var action = '';
        published == 1 ? action = 'published' : action = 'cancelled';

        function publishResults() {
            //console.log($scope.reports.whereGenRounds);
            var where = {id: round.id, published: published};
            var url = serverReportURL + 'updatepublication';
            alertStartRound = $.alert('<i class="fa fa-spin fa-spinner"> </i>publishing results,please wait...')
            $http
                .post(url, where)
                .success(function (response) {
                    console.log(response)
                    alertStartRound.close();
                    if (response.status == 1) {
                        $scope.reports.getGeneralRoundReport(reports.wherePublishRounds);

                        $.alert('<i class="fa fa-check-circle"> Results ' + action + ' successfully');

                    } else {
                        $.alert('<i class="fa fa-check-circle">results could not ' + action + ',please try again');
                    }
                })
                .error(function (error) {
                    alertStartRound.close();
                    $.alert('<i class="fa fa-exclamation-triangle"> Error occured,please try again');
                })
        }

        $scope.reports.confirmDialog(message, publishResults);
    }
    $scope.reports.individualLabsEvaluation = {};
    $scope.reports.whereIndividualLabs = {};
    $scope.reports.getIndividualReport = function (whereIndividualLabs) {
        try {
            var url = serverReportURL + 'getindividuallabs';
            var where = whereIndividualLabs;
            showAjaxLoader(true);
            $http
                .post(url, where)
                .success(function (response) {
                    console.log(response);
                    showAjaxLoader(false);
                    if (response.status == 1) {
                        $scope.reports.individualLabsEvaluation = response.data;
                    } else {
                        $.alert('<i class="fa fa-exclamation-triangle fa-warning"></i> Could not retrieve report data');
                        $scope.reports.individualLabsEvaluation = {};
                    }
                })
                .error(function (error) {
                    showAjaxLoader(false);
                    $.alert('<i class="fa fa-exclamation-triangle"> Error occured,please try again');
                })

        } catch (Exc) {
            $log.debug('Serious error occurred');
        }
    }
    $scope.reports.currentClickedLabResults = {};
    $scope.reports.microagentsData = {};
    $scope.reports.evaluateIndividual = function (individual) {
        $scope.reports.currentClickedLabResults = individual;
        $scope.reports.changeCurrentReport('evaluateIndividualLabs');
        showAjaxLoader(true);
        var where = {
            userId: individual.userId,
            sampleId: individual.sampleId,
            participantId: individual.participantId,
            roundId: individual.roundId
        }
        var url = serverReportURL + 'getmicroagentswhere';
        $http.post(url, where)
            .success(function (response) {
                showAjaxLoader(false);
                console.log(response);
                if (response.status == 1) {
                    $scope.reports.microagentsData = response.data;
                }
            })
            .error(function (error) {
                showAjaxLoader(false);
            })

    }

    $scope.reports.saveIndividualEvaluation = function (individualResults) {
        try {

            function evaluateLab() {
                var data = {
                    update: individualResults,
                    id: individualResults.id
                }
                // delete data.update.id;
                // delete data.update.batchName;
                // delete data.update.materialSource;
                // delete data.update.sampleDetails;
                // delete data.update.sampleInstructions;
                // delete data.update.labDetails;
                // delete data.update.evaluatedStatus;
                console.log(individualResults);
                var url = serverReportURL + 'updatefunction';
                $http
                    .post(url, data)
                    .success(function (response) {
                        if (response.status == 1) {
                            $.alert('<i class="fa fa-check-circle"></i> Lab evaluated successfully');
                        } else {
                            $.alert('<i class="fa fa-exclamation"></i> Error occured,please try again');
                        }
                    })
                    .error(function (error) {
                        $.alert('<i class="fa fa-exclamation-triangle "></i> Error occurred,could not evaluate');
                        console.log(error)
                    })

            }

            var message = 'Are you sure you want to evaluate the lab ' + individualResults.labDetails.institute_name;
            $scope.reports.confirmDialog(message, evaluateLab)
        } catch (exc) {

        }
    }

})
