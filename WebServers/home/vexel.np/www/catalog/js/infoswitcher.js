function setType(type) {
	var infoTypes = document.getElementsByClassName("infoTypes")[0];
	var as = infoTypes.getElementsByTagName("a");
	for (var i = 0; i < as.length; i++) {
		if (i == type) {
			as[i].className = "here";
			document.getElementById("inf" + i).style.display = "inherit";
		} else {
			as[i].className = "";
			document.getElementById("inf" + i).style.display = "none";
		}
	}
}