function regenerateUrl (url) {
    if(url.search(/https/g) === -1) {
        url = url.replace(/http/gi, 'https');
    }
    return url;
}
