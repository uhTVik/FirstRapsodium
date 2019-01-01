function r() {
	var cats = document.getElementsByClassName("cats")[0];
	var catsw = cats.clientWidth;
	var tW = 310;
	var tP = 39;
	var amount = Math.floor(catsw / tW);
	var realP = Math.floor((catsw - (amount * tW)) / (amount));
	cats.style.left = "40px";
	for (var i = 0; i < cats.getElementsByClassName("onecat").length; i++) {
		cats.getElementsByClassName("onecat")[i].style.padding = "0 " + realP + "px 0 0";
	}
}
window.onresize = r;
window.onload = r;