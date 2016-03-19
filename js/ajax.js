// script for performing ajax requests

function ajax(method, uri, action) {
  $.ajax({ url: uri, method: method }).done(action);
}