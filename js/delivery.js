function rotate(div) {
	div.onmousemove = null;
	var element = div.getElementsByClassName("content")[0];
	var start = Date.now();
	var time = 1000;
	var deg = 0;
	var timePassed = 0;
	var timer = setInterval(function() {
		timePassed = Date.now() - start;
		if (timePassed >= time) {
			element.style.transform = "rotateY(" + 180 + "deg)";
			clearInterval(timer);
			return;
		}
		draw(timePassed);
	}, 2);
	div.onmouseleave = function(event) {
		stopRotate(div, timer, timePassed, time, deg);
	};
	function draw(timePassed) {
		var det = 5;
		deg = 180 / (1 + Math.exp(det - timePassed * 2 * det / time));
		element.style.transform = "rotateY(" + deg + "deg)";
	}
}

function stopRotate(div, timer, timeP, time, degst) {
	div.onmouseleave = null;
	clearInterval(timer);
	var element = div.getElementsByClassName("content")[0];
	var start = Date.now();
	timer = setInterval(function() {
		var timePassed = Date.now() - start;
		if (timePassed >= timeP) {
			div.onmousemove = function(event) {
				rotate(div);
			};
			element.style.transform = "rotateY(" + 0 + "deg)";
			clearInterval(timer);
			return;
		}
		draw(timePassed);
	}, 2);
	function draw(timePassed) {
		var det = 5;
		var deg = degst - 180
				/ (1 + Math.exp(det - timePassed * 2 * det / time));
		element.style.transform = "rotateY(" + deg + "deg)";
	}
}