function setType(type) {
	var infoTypes = document.getElementsByClassName("infoTypes")[0];
	var as = infoTypes.getElementsByTagName("a");
	for (var i = 0; i < as.length; i++) {
		if (i == type) {
			as[i].className = "here";
		} else {
			as[i].className = "";
		}
	}
}

//TODO Сделать display none у элемента, тк иначе он делает user-select none