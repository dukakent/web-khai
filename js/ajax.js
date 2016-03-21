// script for performing ajax requests

function ajax(method, uri, action) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      action(xhttp.responseText);
    }
  };
  xhttp.open(method, uri, true);
  xhttp.send();
}