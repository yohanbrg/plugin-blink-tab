var headTitle = document.title;
var vis = (function(){
    var stateKey, eventKey, keys = {
        hidden: "visibilitychange",
        webkitHidden: "webkitvisibilitychange",
        mozHidden: "mozvisibilitychange",
        msHidden: "msvisibilitychange"
    };
    for (stateKey in keys) {
        if (stateKey in document) {
            eventKey = keys[stateKey];
            break;
        }
    }
    return function(c) {
        if (c) document.addEventListener(eventKey, c);
        return !document[stateKey];
    }
})();
    var visible = vis();
    vis(function(){
            var blinkInterval = setInterval(function(){
                if ( vis() ) {
                    document.title = headTitle;
                    clearInterval(blinkInterval);
                }
                else{
                    var title = document.title;
                    document.title = (title == blinktabSettings.wording ? '\u200E' : blinktabSettings.wording );
                }
           }, 100);
    });
