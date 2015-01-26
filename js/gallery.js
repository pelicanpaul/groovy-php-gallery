function getParameterByName(name){
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);
    if(results == null)
        return "1";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function(){
    $('ul#photo-list').easyPaginate({
        step: 20,
        delay: 0,
        page: getParameterByName('page')
    });
    Shadowbox.init({
        overlayOpacity: 0.65
    });

});