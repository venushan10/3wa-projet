

function getUrlBase(){
    let url = window.location;
    return url .protocol + "//" + url.host + "/" + url.pathname.split('/')[1];
}

