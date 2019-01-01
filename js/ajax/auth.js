var authXmlHttp = getXmlHttp();

function login() {
	var login = document.getElementsByName("email")[0].value;
	var pass = document.getElementsByName("pass")[0].value;
	url = "/ajax/auth.php";
	alert("login=" + login + "&pass=" + pass);
	authXmlHttp.onreadystatechange = authWork;
	authXmlHttp.open("POST", url, true);
	authXmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	authXmlHttp.send("login=" + login + "&pass=" + pass);
}

function authWork() {
	if (authXmlHttp.readyState == 4) {
		var response = authXmlHttp.responseText.split("\n");
		if (response[0] == 'ok') {
			exit();
		} else {
			var errorField = document.getElementsByClassName('error')[0];
			errorField.innerHTML = response[1];
		}
	}
}