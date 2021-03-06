$(document).ready(function () {
    if (!getCookie('redirect')) setRedirect();
});

function setRedirect() {
    setCookie('redirect', getUrl());
}

function getUrl() {
    return window.location.href.toString().split(window.location.host)[1];
}

function getCookie(name){
    var cname = name + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(cname) === 0) return c.substring(cname.length,c.length);
    }
    return "";
}

function setCookie(name, value) {
    document.cookie = name + "=" + value;
    console.log("Cookie set: " + getCookie(name));
}

function unsetCookie(name) {
    document.cookie = name + "=";
}

// Misc
String.prototype.format = function() {
    var formatted = this;
    for (var i = 0; i < arguments.length; i++) {
        var regexp = new RegExp('\\{'+i+'\\}', 'gi');
        formatted = formatted.replace(regexp, arguments[i]);
    }
    return formatted;
};
