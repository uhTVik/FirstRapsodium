function exit() {
	window.history.pushState(null, null, "?");
	var winddiv = document.getElementById("window");
	winddiv.innerHTML = "";
}
function exAct(img) {
	img.src = "/images/exit_act.png";
}
function exNorm(img) {
	img.src = "/images/exit.png";
}