var reportsModule = angular.module('ReportModule');
reportsModule.constant('serverReportURL', 'http://localhost:8082/admin/reports/')
reportsModule.controller('ReportsController', function ($scope, $log, $http, EptServices, EptFactory, $timeout, loginDataCache) {
    var serverSamplesURL = SERVER_API_URL.sampleURL;
    var serverReportURL = SERVER_API_URL.reportsURL;
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
            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
        } else {
            EptServices.EptServiceObject.returnActionUnSuccessAlert();
        }
    }

    $scope.reports.grades = {};
    $scope.reports.getGrades = function () {
        var url = serverReportURL + 'getgrades';
        var where = {}
        showAjaxLoader(true);
        $timeout(function () {
            $http.post(url, where)
                    .success(function (response) {
                        showAjaxLoader(false);
                        if (response.status == 1) {
                            $scope.reports.grades = response.data;
                        }
                    })
                    .error(function () {
                        showAjaxLoader(false);
                    })
                    , 300
        })
    }


    $scope.reports.counties = {};
    $scope.reports.getCounties = function () {
        var url = serverReportURL + 'getcounties';
        var where = {}
        $http.post(url, where)
                .success(function (response) {
                    if (response.status == 1) {
                        $scope.reports.counties = response.data;
                    }
                })

    }

    $scope.reports.rounds = {};
    $scope.reports.getRounds = function () {
        var url = serverReportURL + 'getrounds';
        var where = {}
        $http.post(url, where)
                .success(function (response) {
                    if (response.status == 1) {
                        $scope.reports.rounds = response.data;
                    }
                })

    }
    $scope.reports.samples = {};
    $scope.reports.getSamples = function () {

        var url = serverReportURL + 'getsamples';
        var where = {}
        showAjaxLoader(true);
        $timeout(function () {
            $http.post(url, where)
                    .success(function (response) {
                        if (response.status == 1) {
                            $scope.reports.samples = response.data;
                        }
                    })
            showAjaxLoader(false);

        }, 1000)

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
    $scope.reports.getUserResults = function (where, type) {
        var url = serverReportURL + 'getresponsefeedback';
        showAjaxLoader(true)
        if (angular.isDefined(type)) {
            where.published = 1
        }

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

    $scope.reports.labPerformanceData = {};
    $scope.reports.labPerformanceDataStat = {};
    $scope.reports.getLabPerformanceReport = function (where) {
        try {
            showAjaxLoader(true)
            var url = serverReportURL + 'getlabperformance';
            $http.post(url, where)
                    .success(function (response) {
                        console.log(response)
                        showAjaxLoader(false)
                        if (response.status == 1) {
                            $scope.reports.labPerformanceData = response.data;
                            $scope.reports.labPerformanceDataStat = response.stat;
                        } else {
                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
                            $scope.reports.labPerformanceData = {};
                            $scope.reports.labPerformanceDataStat = {};
                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false)
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (exc) {

        }
    }
    $scope.reports.roundsPerformanceData = {};
    $scope.reports.roundsPerformanceDataStat = {};
    $scope.reports.getRoundPerformanceReport = function (where) {
        try {
            showAjaxLoader(true)
            var url = serverReportURL + 'getroundperformance';
            $http.post(url, where)
                    .success(function (response) {
                        console.log(response)
                        showAjaxLoader(false)
                        if (response.status == 1) {
                            $scope.reports.roundsPerformanceData = response.data;
                            $scope.reports.roundsPerformanceDataStat = response.stat;
                        } else {
                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
                            $scope.reports.roundsPerformanceData = {};
                            $scope.reports.roundsPerformanceDataStat = {};
                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false)
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (exc) {

        }
    }
    $scope.reports.getParticipatingLabsReport = function (where) {
        try {
            showAjaxLoader(true)

            console.log(where);
            var url = serverReportURL + 'getparticipatinglabs';
            $http.post(url, where)
                    .success(function (response) {
                        console.log(response)
                        showAjaxLoader(false)
                        if (response.status == 1) {
                            $scope.reports.labParticipatingData = response.data;

                        } else {
                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
                            $scope.reports.labParticipatingData = {};

                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false)
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (exc) {

        }
    }
    $scope.reports.whereLabGenStatResults = {};
    $scope.reports.genStatPerformance = {};
    $scope.reports.genStatPerformanceStat = {};
    $scope.reports.getGenStatPerformanceReport = function (where) {
        try {
            showAjaxLoader(true);
            console.log(where);
            var url = serverReportURL + 'getgenstatperformance';
            $http.post(url, where)
                    .success(function (response) {
                        console.log(response)
                        showAjaxLoader(false)
                        if (response.status == 1) {
                            $scope.reports.genStatPerformance = response.data;
                            $scope.reports.genStatPerformanceStat = response.stat;
                        } else {
                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
                            $scope.reports.genStatPerformance = {};
                            $scope.reports.genStatPerformanceStat = {};
                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false)
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (exc) {

        }
    }

    $scope.reports.whereLabGenStatResults = {};
    $scope.reports.genStatPerformance = {};
    $scope.reports.genStatPerformanceStat ={};
    $scope.reports.getGenStatPerformanceReport = function (where) {
        try {
            showAjaxLoader(true)
            var url = serverReportURL + 'getgenstatperformance';
            $http.post(url, where)
                .success(function (response) {
                    console.log(response)
                    showAjaxLoader(false)
                    if (response.status == 1) {
                        $scope.reports.genStatPerformance = response.data;
                        $scope.reports.genStatPerformanceStat = response.stat;
                    } else {
                        EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();
                        $scope.reports.genStatPerformance = {};
                        $scope.reports.genStatPerformanceStat = {};
                    }
                })
                .error(function (error) {
                    showAjaxLoader(false)
                    EptServices.EptServiceObject.returnServerErrorAlert();
                })

        } catch (exc) {

        }
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


                            $.alert({
                                title: '<i class="fa fa-check-circle"></i> Success',
                                content: 'Round Evaluation was successful!'
                            });

                        } else {
                            $.alert({
                                title: '<i class="fa fa-exclamation-triangle fa-warning"></i> Error',
                                content: 'Round Evaluation was unsuccessful'
                            });
                        }

                    })
                    .error(function (error) {
                        showAjaxLoader(false)
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        }


        $scope.reports.confirmDialog(message, evaluateRound)
    }


    $scope.reports.saveEnrolled = function (round, participant) {

        function insertEnrolled() {
            var dataLab = {
                roundId: round,
                labId: participant
            }
            var url = serverSamplesURL + 'saveenrollinglab';
            try {
                alertStartRound = $.alert({
                    title: '<i class="fa fa-spin fa-spinner  text-danger"></i> Enrolling..',
                    content: 'Enrolling,please wait ....'
                });
               
                $http
                        .post(url, dataLab)
                        .success(function (data) {
                            console.log(data)
                            $scope.samples.loaderProgressSpinner = '';
                            alertStartRound.close();
                            if (data.status == 0) {
                                alertStartRound = $.alert({
                                    title: '<i class="fa fa-remove  text-danger"></i> Error',
                                    content: 'You have successfully enrolled for the round.'
                                });
                            } else {
                                alertStartRound = $.alert({
                                    title: '<i class="fa fa-check-circle  text-success"></i> Success',
                                    content: 'You have successfully enrolled for the round.'
                                });
                                $scope.samples.getCurrentActiveRound();
                            }
                        })
                        .error(function (error) {
                            console.log(error)

                        })

            } catch (Exception) {

            }
        }

        $scope.reports.confirmDialog('Are you sure you want to enroll for this round,action cannot be undone', insertEnrolled);
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


                            $.alert({
                                title: '<i class="fa fa-check-circle"></i> Success',
                                content: ' Evaluation was successful!'
                            });

                        } else {
                            $.alert({
                                title: '<i class="fa fa-exclamation-triangle fa-warning"></i> Error',
                                content: 'Evaluation was unsuccessful'
                            });
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
    $scope.reports.currentResults = {};
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
                            EptServices.EptServiceObject.returnNoRecordsFoundAlert();
                        }
                    })
                    .error(function () {
                        showAjaxLoader(false);
                        EptServices.EptServiceObject.returnServerErrorAlert();
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
            alertStartRound = $.alert('<i class="fa fa-spin fa-spinner"> </i>publishing results,please wait,participnats are being notified through mail...')
            $http
                    .post(url, where)
                    .success(function (response) {
                        console.log(response)
                        alertStartRound.close();
                        if (response.status == 1) {
                            $scope.reports.getGeneralRoundReport($scope.reports.wherePublishRounds);

                            $.alert('<i class="fa fa-check-circle"> Results ' + action + ' successfully');

                        } else {
                            $.alert('<i class="fa fa-check-circle">results could not ' + action + ',please try again');
                        }
                    })
                    .error(function (error) {
                        alertStartRound.close();
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })
        }

        $scope.reports.confirmDialog(message, publishResults);
    }
    $scope.reports.individualLabsEvaluation = {};
    $scope.reports.whereIndividualLabs = {};

    $scope.reports.roundsParticipatoryData = {};

    $scope.reports.getRoundParticipatoryReport = function (where) {
        try {
            var url = serverReportURL + 'getroundparticipatory';
            var where = where;
            showAjaxLoader(true);
            $http
                    .post(url, where)
                    .success(function (response) {
                        console.log(response);
                        showAjaxLoader(false);
                        if (response.status == 1) {
                            $scope.reports.roundsParticipatoryData = response.data;
                        } else {

                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();

                            $scope.reports.roundsParticipatoryData = {};
                        }
                    })
                    .error(function (error) {
                        console.log(error)
                        showAjaxLoader(false);
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (Exc) {
            $log.debug('Serious error occurred');
        }
    }
    $scope.reports.correctiveActionData = {};
    $scope.reports.whereCorrectiveActionResults = {};
    $scope.reports.getCorrectiveActionReport = function (where) {
        try {
            var url = serverReportURL + 'getcorrectiveaactionreport';
            // var where = where;
            showAjaxLoader(true);
            $http
                    .post(url, where)
                    .success(function (response) {
                        console.log(response);
                        showAjaxLoader(false);
                        if (response.status == 1) {
                            $scope.reports.correctiveActionData = response.data;
                        } else {

                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();

                            $scope.reports.correctiveActionData = {};
                        }
                    })
                    .error(function (error) {
                        console.log(error)
                        showAjaxLoader(false);
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (Exc) {
            $log.debug('Serious error occurred');
        }
    }
    $scope.reports.shipmentReportData = {};
    $scope.reports.whereShipmentResults = {};
    $scope.reports.getShipmentReport = function (where) {
        try {
            var url = serverReportURL + 'getshipmentsreports';
            // var where = whereIndividualLabs;
            showAjaxLoader(true);
            $http
                    .post(url, where)
                    .success(function (response) {
                        console.log(response);
                        showAjaxLoader(false);
                        if (response.status == 1) {
                            $scope.reports.shipmentReportData = response.data;
                        } else {

                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();

                            $scope.reports.shipmentReportData = {};
                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false);
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (Exc) {
            $log.debug('Serious error occurred');
        }
    }
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

                            EptServices.EptServiceObject.returnNoRecordsFoundFiltersAlert();

                            $scope.reports.individualLabsEvaluation = {};
                        }
                    })
                    .error(function (error) {
                        showAjaxLoader(false);
                        EptServices.EptServiceObject.returnServerErrorAlert();
                    })

        } catch (Exc) {
            $log.debug('Serious error occurred');
        }
    }

    $scope.reports.calculateTotalScore = function (agent) {

        console.log(agent)
        var sumOfMicro = 0;
        if (agent != '' && angular.isDefined(agent)) {

            for (var i = 0; i < agent.length; i++) {
                sumOfMicro += Number(agent[i].score);
            }
        } else {
            // $.alert("<i class='fa fa-exclamation-triangle'></i> No test reagents found");
        }
        $scope.reports.currentClickedLabResults.totalMicroAgentsScore = sumOfMicro;
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
        var url = serverReportURL + 'getlabuserresponse';
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
                console.log(data);
                var url = serverReportURL + 'updatefunction';
                $http
                        .post(url, data)
                        .success(function (response) {
                            console.log(response)
                            if (response.status == 1) {

                                $.alert({
                                    title: '<i class="fa fa-check-circle"></i> Success',
                                    content: 'Lab evaluated successfully'
                                });


                                $scope.reports.getIndividualReport($scope.reports.whereIndividualLabs)
                            } else {
                                EptServices.EptServiceObject.returnServerErrorAlert();
                            }
                        })
                        .error(function (error) {
                            EptServices.EptServiceObject.returnServerErrorAlert();
                            console.log(error)
                        })

            }

            var message = 'Are you sure you want to evaluate the lab ' + individualResults.labDetails.institute_name;
            $scope.reports.confirmDialog(message, evaluateLab)
        } catch (exc) {

        }
    }
    $scope.reports.sumNumbers = function (num1, num2) {
        return Math.round((Number(num1) + Number(num2)), 2);
    }
    $scope.reports.evaluateBoth = function (primaryEvaluation, microEvaluation) {
        delete primaryEvaluation.daysLeft;
        delete primaryEvaluation.daysLeftOnTen;

        console.log(microEvaluation)
        $scope.reports.saveIndividualEvaluation(primaryEvaluation);

        $timeout(function () {

            $scope.reports.saveMicroAgentsEvaluation(microEvaluation)
        }, 2000)
    }
    $scope.reports.saveMicroAgentsEvaluation = function (microAgents) {
        if (microAgents.length > 0) {
            var error = false;
            for (var i = 0; i < microAgents.length; i++) {

                if (microAgents[i].score == '') {
                    error = true;
                    $.alert({
                        title: "<i class='fa fa-exclamation-triangle text-danger '></i> Error",
                        content: "Please fill score at row " + (i + 1) + " and should be a number"
                    });
                    break;
                }
            }
            if (!error) {
                function updateMicroAgents() {
                    var url = serverReportURL + 'saveMicroAgentsEvaluation';
                    var where = {
                        update: microAgents
                    }
                    showAjaxLoader(true);
                    $http.post(url, where)
                            .success(function (response) {
                                console.log(response)
                                showAjaxLoader(false);
                                if (response.status == 1) {
                                    $.alert({
                                        title: "<i class='fa fa-check-circle text-success'></i> Success ",
                                        content: " Micro agents update was successful"
                                    });
                                } else {
                                    $.alert({
                                        title: "<i class='fa fa-exclamation-triangle text-danger'></i> Error",
                                        content: "Error occured,please try again"
                                    });
                                }
                            }
                            )
                            .error(function (error) {
                                showAjaxLoader(false);
                                $.alert({
                                    title: "<i class='fa fa-exclamation-triangle text-danger '></i> Error",
                                    content: "Error occured,could not evaluate,try again"
                                });
                            })


                }

                var message = 'Are you sure you want to save this evaluation';
                $scope.reports.confirmDialog(message, updateMicroAgents);

            }

        } else {
            $.alert("<i class='fa fa-exclamation-circle'></i> please fill atleast one micro agent")
        }
    }


})
