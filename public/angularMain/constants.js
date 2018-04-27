const BASE_URL = window.location.href.replace(window.location.pathname, "/");
const SERVER_API_URL = {
    sampleURL: BASE_URL + 'admin/Bacteriologydbci/',
    bacteriologyURL: BASE_URL + 'admin/Bacteriologydbci/',
    bacteriologyParticipant: BASE_URL + 'Bacteriologydbci/',
    reportsURL: BASE_URL + 'admin/reports/',
    MICROGRAPHS: BASE_URL + 'admin/microreports/',
    repositoryURL: BASE_URL + 'reports/repository/'
}

const GETROUNDS = 'getrounds';
const GETCOUNTIES = 'getcounties';
const GETLABS = 'getlabs';
// const GETGENRESPONSE = 'getgenresponse';
const GETGENRESPONSE = 'sampletypes';
const GETRESULSONLABS = 'getlabsresults';

const GETRESULTSONROUNDS = 'getroundsresults';
const GETRESULTSONCOUNTIES = 'getcountiesresults';
const GETSAMPLERESPONSES = 'getsamplesresponses';
