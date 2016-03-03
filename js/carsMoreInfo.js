

function getMoreInfo(element) {
    var id = element.id.replace("btn-more-", "");
    var uri = window.location.href+"?act=addinfo&id="+id;
    ajax("GET", uri, function (response) {
        var car = JSON.parse(response);
        showTooltip(car, element.offsetLeft, element.offsetTop);
    });

}

function showTooltip (obj, left, top) {
    var keys = Object.keys(obj);
    var container = document.getElementsByClassName("container")[0];
    var tk = document.createElement("div");
    tk.className = "toolkit";
    for (var i = 0; i < keys.length; i++) {
        var child = document.createElement("div");
        child.innerHTML = "<b>"+keys[i]+": </b>"+obj[keys[i]];
        if(keys[i] == "id") {
            tk.insertBefore(child, tk.childNodes[0]);
        }
        else {
            tk.appendChild(child);    
        }
    }

    container.appendChild(tk);
    tk.style.left = (left-200)+"px";
    tk.style.top = (top-40)+"px";
}

function hideTooltip () {
    var container = document.getElementsByClassName("container")[0];
    var tk = document.getElementsByClassName("toolkit")[0];
    if (tk != null) {
        container.removeChild(tk);
    }
}


var btns = document.getElementsByClassName("btn-more");

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        getMoreInfo(this);
    });
}

document.onclick = function () {
    hideTooltip();
};