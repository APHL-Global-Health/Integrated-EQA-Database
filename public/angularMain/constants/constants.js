var getUrl = window.location;
const BASE_URL = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0] + '/';

const SERVER_URL = {
    reports: BASE_URL + 'reports/'

};
SERVER_URL.ROOTURL = 'http://localhost:8081/bom360/web/#';


//-======================================================================
//-----------------------get tickets-----------------------------------
//=======================================================================

const GETROUNDS = 'getrounds';