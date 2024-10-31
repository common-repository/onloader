/*
OnLoad'er

Use:
new OnLoader('load-div-id', 'display-div-id', 'url');
*/

/*
Public functions
*/

function OnLoader(loader, result, uri) {

  // Show...
  show = function (loader, result, uri) {
    // Show loader
    var loaderelem = document.getElementById(loader);
    if (loaderelem) loaderelem.style.display = 'block';
    // Locate result element.
    var resultelem = document.getElementById(result);
    if (typeof resultelem == 'undefined')
      return;
    if (resultelem) resultelem.style.display = 'none';
    // Fetch...
    var http = new HTTP();
    http.open("GET", uri, true);
    http.onreadystatechange = function() {
      if (http.readyState == 4) {
        try {
          resultelem.innerHTML = http.responseText;
        } catch(e) {
          resultelem.innerHTML = '<span>(OnLoader Error: Invalid response)</span>';
        }
        // Hide loader
        if (loaderelem) loaderelem.style.display = 'none';
        if (resultelem) resultelem.style.display = 'block';
      }
    }
    http.send(null);
  }
  this.show = show;

  // Prepare for onload.
  if (typeof window.onload!="function") {
    window.onload = function() { this.show(loader, result, uri); }
  } else {
    var old_onload = window.onload;
    window.onload = function() { old_onload(); this.show(loader, result, uri); }
  }

}

/*
Private functions
*/

function HTTP() {
  var http;
  if (typeof XMLHttpRequest != 'undefined') {
    http=new XMLHttpRequest();
  } else {
    if (typeof ActiveXObject !='undefined') {
      try {
        http = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {}
    }
  }
  return http;
}
