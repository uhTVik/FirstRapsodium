var addToListXmlHttp = getXmlHttp();

function toBestList(id) {
	toList("best", id);
}

function toOrList(id) {
	toList("or", id);
}

function toBuyList(id) {
	toList("buy", id);
}

function toList(type, id) {
	var url = "/ajax/toplists.php?list=" + type + "&stuff=" + id;
	addToListXmlHttp.open("GET", url, true);
	addToListXmlHttp.send(null);
}