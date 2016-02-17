function delta (progress) {
    return progress;
}


function animate (element, way, from, to, duration) {
    var start = new Date().getTime();
    setTimeout(function () {
        var now = (new Date().getTime()) - start;
        var progress = now / duration;
        var result = (to - from) * delta(progress) + from;
        element.style[way] = result + "px";
        if (progress < 1) setTimeout(arguments.callee, 40);
    }, 40);
}


window.onload = function () {

    setTimeout(function(){
        var logo = document.getElementsByClassName("logo")[0];
        var headerRight = document.getElementsByClassName("header-right")[0];
        var justUse = document.getElementsByClassName("just-use")[0];
        var hosting = document.getElementsByClassName("hosting")[0];
        animate(logo, "left", -255, 0, 1000);
        animate(headerRight, "right", -200, 0, 1000);
        animate(hosting, "top", -120, 0, 1000);
        animate(justUse, "top", -120, 0, 1000);
    }, 2000);
};
