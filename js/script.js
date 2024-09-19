const tokenCookieName = "accesstoken";

function setToken(token){
    setCookie(tokenCookieName, token, 1);
}

function getToken(){
    return getCookie(tokenCookieName);
}

function setCookie(name,value,day) {
    var expire ="";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (const c of ca) {
        let cookie = c;
        while (cookie.startsWith(" ")) cookie = cookie.substring(1, cookie.length);
        if (cookie.startsWith(nameEQ)) return cookie.substring(nameEQ.length, cookie.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function isConnected(){
    if(getToken() == null || getToken == undefined){
        return false;
    }
    else{
        return true;
    }
}

if(isConnected()){
    alert("je suis connecté");
}

var button = document.querySelector('.button');
        var menu = document.querySelector('.menu');

        button.onclick = function() {
            button.classList.toggle('active');
            menu.classList.toggle('active');
}