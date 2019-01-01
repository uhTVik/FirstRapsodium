button = false;

function rediectToStuff(stuff) {
	if (!button) {
		window.location.href = "/stuff" + stuff;
	}
}