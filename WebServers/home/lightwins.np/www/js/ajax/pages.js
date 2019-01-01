var pagesXmlHttp = getXmlHttp();
var num;
var ideochap = 0;
var isBack = false;
var icURL = "";

function goToPage(sectionNumber) {
	var url;
	icURL = "";
	switch (sectionNumber) {
	case -1:
		back();
		break;
	case 0:
		url = "/join.php";
		break;
	case 1:
		url = "/contacts.php";
		break;
	case 2:
		url = "/events.php";
		break;
	case 3:
		url = "/faq.php";
		break;
	case 4:
		url = "/materials.php";
		break;
	case 5:
		url = "/plan.php";
		break;
	case 6:
		url = "/ideo.php?chap=" + ideochap;
		if (ideochap != 0) {
			icURL = "/" + ideochap;
		}
		break;
	case 7:
		url = "/about.php";
		break;
	case 8:
		url = "/conf.php";
		break;
	}
	num = sectionNumber;
	if (!isBack) {
		history.pushState(sectionNumber, null, url.split('.')[0] + icURL);
	}
	pagesXmlHttp.onreadystatechange = pagesWork;
	pagesXmlHttp.open("GET", url, true);
	pagesXmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	pagesXmlHttp.send(null);
	isBack = false;
	document.body.scrollTop = 0;
}

function gotoIdeoChap(n) {
	ideochap = n;
	goToPage(6);
}

function pagesWork() {
	if (pagesXmlHttp.readyState == 4) {
		var response = pagesXmlHttp.responseText.split("||");
		if (response[0] == 'ok') {
			document.getElementById("page").innerHTML = response[1];
			sections[sectionClicked].innerHTML = response[2];
			document.title = "Свет | " + response[2];
		}
	}
}








var joinXmlHttp = getXmlHttp();

function getRequestBody1(oForm) { 
    var aParams = new Array();
    var all = true;
    for(var i = 0; i < oForm.elements.length; i++) {
        var sParam = encodeURIComponent(oForm.elements[i].name);
        sParam += "=";
        if (oForm.elements[i].type == "checkbox") {
        	if (oForm.elements[i].checked) {
        		sParam += encodeURIComponent("YES");
        	} else {
        		sParam += encodeURIComponent("NO");
        	}
        } else {
        	sParam += encodeURIComponent(oForm.elements[i].value);
        }
        aParams.push(sParam);
        if (RegExp("^d[1-46]|c1|e1$").test(oForm.elements[i].name)) {
        	if (oForm.elements[i].value == "" ||
        			(oForm.elements[i].value == "on" &&
        				oForm.elements[i].checked == false)) {
        		oForm.elements[i].className = 'red';
        		all = false;
        	} else {
        		oForm.elements[i].className = '';
        	}
        }
    }
    if (all) {
    	return aParams.join("&");
    }
    return false;
}

function join(us) {
	var post = getRequestBody1(us);
	if (!post) {
		return;
	}
	var url = "/join.php";
	joinXmlHttp.onreadystatechange = joinWork;
	joinXmlHttp.open("POST", url, true);
	joinXmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	joinXmlHttp.send(post);
}

function joinWork() {
	if (joinXmlHttp.readyState == 4) {
		var response = joinXmlHttp.responseText.split("||");
		if (response[0] == 'ok') {
			document.getElementById("page").innerHTML = response[1];
		}
	}
}











var askXmlHttp = getXmlHttp();

function getRequestBody(oForm) { 
    var aParams = new Array();
    var all = true;
    for(var i = 0; i < oForm.elements.length; i++) {
        var sParam = encodeURIComponent(oForm.elements[i].name);
        sParam += "=";
        sParam += encodeURIComponent(oForm.elements[i].value);
        aParams.push(sParam);
        if (RegExp("^a|b$").test(oForm.elements[i].name)) {
        	if (oForm.elements[i].value == "") {
        		oForm.elements[i].className = 'red';
        		all = false;
        	} else {
        		oForm.elements[i].className = '';
        	}
        }
    }
    if (all) {
    	return aParams.join("&");
    }
    return false;
}

function ask(us) {
	var post = getRequestBody(us);
	if (!post) {
		return;
	}
	var url = "/faq.php";
	askXmlHttp.onreadystatechange = askWork;
	askXmlHttp.open("POST", url, true);
	askXmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	askXmlHttp.send(post);
}

function askWork() {
	if (askXmlHttp.readyState == 4) {
		var response = askXmlHttp.responseText.split("||");
		if (response[0] == 'ok') {
			document.getElementById("page").innerHTML = response[1];
		}
	}
}
