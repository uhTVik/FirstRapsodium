var getCatAndSubcatXmlHttp = getXmlHttp();

function showOrHideForm(formid) {
	var form = document.getElementById(formid);
	if (form.style.display != 'inherit') {
		form.style.display = 'inherit';
	} else {
		form.style.display = 'none';
	}
}

function addInpField(a, formid, inpcl, text, type) {
	var form = document.getElementById(formid);
	var inpdiv = form.getElementsByClassName(inpcl + "i")[0];
	var num = inpdiv.getElementsByTagName('input').length + 1;
	var inputSpan = document.createElement("span");
	inputSpan.innerHTML = text + "<input type='"+type+"' name='" + inpcl + num
			+ "'><br>";
	inpdiv.appendChild(inputSpan);
}

function addCat() {
	var div = document.getElementById("catselectdiv");
	var index = div.getElementsByTagName("select").length / 2 + 1;
	var catselect = document.createElement("select");
	catselect.name = "cat" + index;
	catselect.onchange = function() {
		getSubcats(catselect, index);
	};
	var subcatselect = document.createElement("select");
	subcatselect.name = "subcat" + index;
	subcatselect.innerHTML = "<option selected='selected'>Выберите подкатегорию</option>";
	div.appendChild(catselect);
	div.appendChild(subcatselect);
	div.appendChild(document.createElement("br"));
	getCats(index);
}

function getCats(num) {
	var url = "/ajax/admin.php?getcats=" + num;
	getCatAndSubcatXmlHttp.open("GET", url, true);
	getCatAndSubcatXmlHttp.onreadystatechange = writeCats;
	getCatAndSubcatXmlHttp.send(null);
}

function getSubcats(select, num) {
	var cat = select.selectedIndex;
	if (cat == 0) {
		var nextselect = document.getElementsByName("subcat" + num)[0];
		nextselect.innerHTML = "<option selected='selected'>Выберите подкатегорию</option>";
		return;
	}
	var url = "/ajax/admin.php?cat=" + cat + "&num=" + num;
	getCatAndSubcatXmlHttp.open("GET", url, true);
	getCatAndSubcatXmlHttp.onreadystatechange = writeSubcats;
	getCatAndSubcatXmlHttp.send(null);
}

function writeCats() {
	if (getCatAndSubcatXmlHttp.readyState == 4) {
		var response = getCatAndSubcatXmlHttp.responseText;
		alert(response);
		var cats = response.split("\n");
		var num = parseInt(cats[0]);
		var select = document.getElementsByName("cat" + num)[0];
		select.innerHTML = "<option selected='selected'>Выберите категорию</option>";
		for (var int = 1; int < cats.length - 1; int++) {
			var cat = cats[int];
			select.innerHTML += "<option>" + cat + "</option>";
		}
	}
}

function writeSubcats() {
	if (getCatAndSubcatXmlHttp.readyState == 4) {
		var response = getCatAndSubcatXmlHttp.responseText;
		var subcats = response.split("\n");
		var num = parseInt(subcats[0]);
		var select = document.getElementsByName("subcat" + num)[0];
		select.innerHTML = "<option selected='selected'>Выберите подкатегорию</option>";
		for (var int = 1; int < subcats.length - 1; int++) {
			var subcat = subcats[int];
			select.innerHTML += "<option>" + subcat + "</option>";
		}
	}
}