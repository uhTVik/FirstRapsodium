var windXmlHttp = getXmlHttp();
var url;
function act(windtype) {
	window.history.pushState(null, null, "?act=" + windtype);
	url = "/" + windtype + ".php";
	windXmlHttp.onreadystatechange = writeWind;
	windXmlHttp.open("GET", url, true);
	windXmlHttp.send(null);
}

function writeWind() {
	if (windXmlHttp.readyState == 4) {
		var response = windXmlHttp.responseText;
		var winddiv = document.getElementById("window");
		winddiv.innerHTML = response;
	}
}