var infoXmlHttp = getXmlHttp();

function getinfo() {
	var login = document.getElementsByName("email")[0].value;
	var order = document.getElementsByName("order")[0].value;
	url = "/ajax/info.php";
	infoXmlHttp.onreadystatechange = infoWork;
	infoXmlHttp.open("POST", url, true);
	infoXmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	infoXmlHttp.send("login=" + login + "&order=" + order);
}

function infoWork() {
	if (infoXmlHttp.readyState == 4) {
		var response = infoXmlHttp.responseText.split("\n|\n");
		if (response[0] == 'ok') {
			document.getElementsByClassName("userh1")[0].innerHTML = response[1];
			document.getElementsByClassName("userdiv")[0].innerHTML = response[2];
			alert(response[2]);
		} else {
			var errorField = document.getElementsByClassName('error')[0];
			errorField.innerHTML = response[1];
		}
	}
}