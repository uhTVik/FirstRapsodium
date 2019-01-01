function ge(id) {
	return document.getElementById(id);
}

function getXmlHttp() {
	var xmlHttp = false;
	try {
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e2) {
			xmlHttp = false;
		}
	}
	if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
		xmlHttp = new XMLHttpRequest();
	}
	return xmlHttp;
}

function ajax(params) {
	var xmlHttp = getXmlHttp();
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4) {
			params.success(xmlHttp.responseText);
		}
	}
	xmlHttp.open("POST", params.url, true);
	xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	var body = "";
	for (var i in params.data) {
		body += encodeURIComponent(i) + "=" + encodeURIComponent(params.data[i]) + "&";
	}
	xmlHttp.send(body);
}

function clearHolder(holder) {
	holder.innerHTML = "";
}

function loading(holder) {
	var img = new Image();
	img.src = "img/life.gif";
	clearHolder(holder);
	holder.appendChild(img);
}

function error(msg, holder) {
	var div = document.createElement("div");
	div.className = "error";
	div.innerHTML = msg;
	div.addEventListener("click", function() {
		this.remove();
	});
	clearHolder(holder);
	holder.appendChild(div);
}

HTMLFormElement.prototype.serialize = function() {
	var data = {};
	for (var i in this.elements) {
		data[this.elements[i].name] = this.elements[i].value;
	}
	return data;
}

HTMLElement.prototype.remove = function() {
	this.parentNode.removeChild(this);
}