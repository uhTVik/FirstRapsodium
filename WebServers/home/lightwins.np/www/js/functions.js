function center() {
	var classCentered = document.getElementsByClassName("center");
	for (var i = 0; i < classCentered.length; i++) {
		var element = classCentered[i];
		var width = element.clientWidth;
		var height = element.clientHeight;
		var parent = element.parentNode;
		var parentWidth = parent.clientWidth;
		var parentHeight = parent.clientHeight;
		element.style.left = (parentWidth - width) / 2;
		element.style.top = (parentHeight - height) / 2;
	}
}

function canvasInit() {
	var canvasArray = document.getElementsByClassName("canvas");
	for (var i = 0; i < canvasArray.length; i++) {
		var canvas = canvasArray[i];
		canvas.width = Math.sqrt(4 * x0 * x0 + 4 * y0 * y0);
		canvas.height = canvas.width;
	}
}

function back() {
	window.location.href = "/";
}

function disableSubmit(ch) {
	if (ch.checked) {
		document.getElementById('submit').disabled = '';
	} else {
		document.getElementById('submit').disabled = 'disabled';
	}
}