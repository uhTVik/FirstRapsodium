var x0, y0, x1, y1;
var canvas, ctx, canvasDown, ctxDown, canvasUp, ctxUp;
var lights, sections, lightImg, ksb;
var lightSpace = 35;
var sAmount = 8;
var sAngle = (360 - lightSpace * 2 - 2) / sAmount;
var ksbwidth0, ksbwidth;
var mousedown = 0;
var sectionClicked = -1;
var circleD0 = 20;
var circleD = circleD0;
var spiralD0 = 160;
var spiralD = spiralD0;
var contextAngle = 0;
var opacity = 1;
var bodyBGColor = mixColors(plakMan4Color, blackColor, 1);
var systemColor = plakMan2Color;
var lightTextColor = plakMan2Color;
var sectionTextColor0 = plakMan2Color;
var sectionTextColor = sectionTextColor0;
var sectionDefaultColor = mixColors(plakMan3Color, logoOutColor, 0.5);
var sectionUNHOVERColor = sectionDefaultColor;
var sectionHOVER1Color = mixColors(plakMan3Color, logoOutColor, 0.85);
var sectionHOVER2Color = mixColors(plakMan2Color, sectionHOVER1Color, 0.25);
var sectionACTIVEColor = plakMan2Color;
var bodyAngle = 0;
var di = 1;
var lastMousePosition = [ -1, -1 ];
var only = {
	nowrap : 1
};
var sectionDX = 0;
var pageDiv;
var inPage = false;

function drawInit(kwidth) {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	canvasDown = document.getElementById("canvasdown");
	ctxDown = canvasDown.getContext('2d');
	canvasUp = document.getElementById("canvasup");
	ctxUp = canvasUp.getContext('2d');
	canvasActive = document.getElementById("canvasactive");
	ctxActive = canvasActive.getContext('2d');

	sections = document.getElementsByClassName("section");
	lights = document.getElementById("lights");
	lightImg = document.getElementById("lightImg");
	ksb = document.getElementById("ksb");
	pageDiv = document.getElementById("page");

	document.body.style.background = toRGBString(bodyBGColor);
	document.getElementById("lights").style.color = toRGBString(lightTextColor);
	ksbwidth0 = kwidth;
	ksbwidth = kwidth;
	x1 = canvas.clientWidth / 2;
	y1 = canvas.clientHeight / 2;
	x0 = document.body.clientWidth / 2;
	y0 = document.body.clientHeight / 2;
	drawLightCoNT();
}

function drawLightCoNT() {
	drawCircleAroundTheLight();
	redrawLightCoNT();
}

function redrawLightCoNT() {
	canvas.width = canvas.width;
	drawLines();
	drawSpiralAroundTheLight();
	spreadSections();
}

function getCircleR(i) {
	return ksbwidth / 2 + circleD + i;
}

function getSpiralR(i) {
	return ksbwidth / 2 + spiralD + i;
}

function getCircle(angle, i) {
	var r = getCircleR(i);
	var phi = angle - 90;
	var x = x1 + r * Math.cos(phi * Math.PI / 180);
	var y = y1 + r * Math.sin(phi * Math.PI / 180);
	return [ x, y ];
}

function getSpiral(angle, i) {
	var r = getSpiralR(i);
	var phi = angle - 90;
	var x = x1 + r * Math.cos(phi * Math.PI / 180);
	var y = y1 + r * Math.sin(phi * Math.PI / 180);
	return [ x, y ];
}

function drawCircleInsideTheLight() {
	var maxi = 10;
	for (var i = -maxi; i <= 0; i++) {
		ctxUp.beginPath();
		for (var angle = 0; angle <= 360; angle += di) {
			var coors = getCircle(angle, -7 - i - 5);
			ctxUp.lineTo(coors[0], coors[1]);
		}
		ctxUp.lineWidth = 3;
		if (i == 0) {
			ctxUp.fillStyle = "rgba(0, 0, 160, " + (1 + i / maxi) + ")";
			ctxUp.fill();
		} else {
			ctxUp.strokeStyle = "rgba(0, 0, 160, " + (1 + i / maxi) + ")";
			ctxUp.stroke();
		}
	}
}

function drawCircleAroundTheLight() {
	drawCircleInsideTheLight();
	var maxi = 7;
	for (var i = 0; i <= maxi; i++) {
		ctxUp.beginPath();
		for (var angle = 0; angle <= 360; angle += di) {
			var coors = getCircle(angle, i - maxi);
			ctxUp.lineTo(coors[0], coors[1]);
		}
		ctxUp.lineWidth = 3;
		ctxUp.strokeStyle = toRGBAString(mixColors(plakMan2Color, logoOutColor,
				i / maxi));
		ctxUp.stroke();
	}
}

function drawSpiralAroundTheLight() {
	var maxi = 1;
	for (var i = -maxi; i < 0; i++) {
		ctx.beginPath();
		for (var angle = lightSpace + 0.5; angle <= 360 - lightSpace; angle += di) {
			var spxy = getSpiral(angle, maxi + i);
			ctx.lineTo(spxy[0], spxy[1]);
		}
		ctx.lineWidth = 5;
		ctx.strokeStyle = toRGBAString(mixColors(systemColor,
				toZeroColor(logoInColor), -i / maxi));
		ctx.stroke();
	}
}

function drawLines() {
	for (var i = 0; i <= sAmount; i++) {
		ctx.beginPath();
		var angle = (lightSpace + 1) + i * (360 - 2 * lightSpace - 2) / 8
				- bodyAngle;
		if (sectionClicked != -1) {
			ctx.strokeStyle = toRGBAString(mixColors(systemColor,
					toZeroColor(systemColor), opacity));
		} else {
			ctx.strokeStyle = toRGBString(systemColor);
		}
		var spxy = getSpiral(angle, 1);
		var cirxy = getCircle(angle, -2);
		ctx.moveTo(spxy[0], spxy[1]);
		ctx.lineTo(cirxy[0], cirxy[1]);
		ctx.lineWidth = 5;
		ctx.stroke();
	}
}

function spreadSections() {
	for (var i = 0; i < sAmount; i++) {
		var s = sections[i];
		var angle = lightSpace + 1 + (i + 0.5) * sAngle + contextAngle;
		var r = (getSpiralR(0) - spiralD + spiralD0 + getCircleR(0)) / 2;
		var phi = angle - 90;
		var x = x0 + r * Math.cos(phi * Math.PI / 180) - s.clientWidth / 2
				+ sectionDX;
		var y = y0 + r * Math.sin(phi * Math.PI / 180) - s.clientHeight / 2;
		s.style.left = Math.floor(x) + "px";
		s.style.top = Math.floor(y) + "px";
		if (sectionClicked == -1 || sectionClicked != i) {
			fillSection(ctxDown, i, toRGBString(sectionUNHOVERColor));
		} else {
			fillSection(ctxActive, i, toRGBString(sectionACTIVEColor));
		}
		if (sectionClicked != -1 && i != sectionClicked) {
			s.style.opacity = opacity;
		}
		s.style.color = toRGBString(sectionTextColor);
	}
}

function fillSection(context1, sectionNumber, color) {
	var phi0 = lightSpace + 1 + sectionNumber * sAngle;
	var phi1 = lightSpace + 1 + (sectionNumber + 1) * sAngle;
	var phi2;
	context1.beginPath();

	if (sectionClicked != -1 && sectionNumber == sectionClicked) {
		phi0 -= bodyAngle;
	}

	if (bodyAngle > 0 && sectionNumber != sectionClicked) {
		return;
	}

	for (var angle = phi0; angle <= phi1; angle += di) {
		var coors = getCircle(angle, -2);
		context1.lineTo(coors[0], coors[1]);
		phi2 = angle;
	}

	for (var angle = phi2; angle >= phi0; angle -= di) {
		var spxy = getSpiral(angle, 0);
		context1.lineTo(spxy[0], spxy[1]);
	}
	context1.fillStyle = color;
	context1.fill();

}

function md(event, mValue) {
	mousedown = mValue;
	checkMouseInSection(event);
}

function checkMouseInSection(event) {
	var x = event.clientX - x0, y = event.clientY - y0;
	var r = Math.sqrt(x * x + y * y);
	var angle = 90 + Math.asin(y / r) * 180 / Math.PI;
	if (x < 0) {
		angle = 360 - angle;
	}
	angle -= 0.6 + contextAngle;
	document.body.className = '';
	var selected = Math.floor((angle - lightSpace) / sAngle);
	var sColor = sectionUNHOVERColor;
	var type = -1;
	var context = ctxDown;

	if (selected >= sAmount || selected < 0 || sectionClicked != -1) {
		selected = -1;
	} else {
		if (r > getSpiralR(0)) {
			type = 1;
			sColor = sectionHOVER1Color;
		} else if (r < getCircleR(0)) {
			type = 0;
		} else {
			document.body.className = 'pointer';
			if (mousedown == 0) {
				type = 2;
				sColor = sectionHOVER2Color;
			} else {
				type = 3;
				context = ctxActive;
				sColor = sectionACTIVEColor;
			}
		}
	}
	
	if (inPage) {
		var x2 = 60 + ksbwidth * 0.125;
		var y2 = 16 + ksbwidth * 0.125;
		x = event.pageX - x2, y = event.pageY - y2;
		r = Math.sqrt(x * x + y * y);
		if (r < getCircleR(0) * 0.25) {
			document.body.className = 'pointer';
			if (mousedown == 0) {
				
			} else {
				back();
			}
		} else {
//			alert(getCircleR(0));
		}
	}

	if (selected != lastMousePosition[0] && lastMousePosition[0] != -1) {
		fillSection(ctxDown, lastMousePosition[0],
				toRGBString(sectionUNHOVERColor));
	}
	if ((selected != lastMousePosition[0] || type != lastMousePosition[1])
			&& selected != -1) {
		fillSection(context, selected, toRGBString(sColor));
	}

	lastMousePosition[0] = selected;
	lastMousePosition[1] = type;
}

function clickSection() {
	if (lastMousePosition[0] == -1 || lastMousePosition[1] < 2
			|| sectionClicked != -1) {
		return;
	}
	sectionClicked = lastMousePosition[0];
	var lastRender = new Date();
	function render() {
		var time = new Date() - lastRender;
		killTheLights(500, 0, time, lights);
		transformSections(1000, 0, time, sectionClicked, sections);
		if (only.nowrap > 0) {
			nowrap(900, time, sectionClicked, sections);
		}
		sectionToBody1(1000, 1000, time, sectionClicked, sections);
		redrawLightCoNT();
		if (time < 2000) {
			requestAnimationFrame(render);
		} else {
			showPage();
		}
	}
	render();
}

function killTheLights(funcTime, wait, t, lights) {
	if (t < wait) {
		return;
	}
	var time = t - wait;
	lights.style.opacity = Math.max(0, 1 - time / funcTime);
};

function transformSections(funcTime, wait, t, sectionNumber, sections) {
	if (t < wait) {
		return;
	}
	var time = t - wait;
	var phi1 = lightSpace + 1 + (sectionNumber + 0.5) * sAngle;
	var phi2 = 90;
	var angle = (phi2 - phi1) * Math.min(1, time / funcTime);
	canvasActive.style.transform = "rotate(" + angle + "deg)";
	canvas.style.transform = "rotate(" + angle + "deg)";
	canvasDown.style.transform = "rotate(" + angle + "deg)";
	opacity = 1 - Math.min(1, time / funcTime);
	canvasDown.style.opacity = opacity;
	contextAngle = angle;
	spiralD = spiralD0 * Math.pow(1.1, Math.min(1, time / funcTime) * 50);
}

function nowrap(wait, t, sectionNumber, sections) {
	if (t < wait) {
		return;
	}
	only.nowrap--;
	var text = sections[sectionNumber].innerHTML;
	sections[sectionNumber].innerHTML = text.replace("<br>", " ");
}

function sectionToBody1(funcTime, wait, t, sectionNumber, sections) {
	if (t < wait) {
		return;
	}
	var time = t - wait;
	bodyAngle = Math.floor(Math.min(1, time / funcTime) * (360 - sAngle) / di)
			* di;
	document.body.style.background = toRGBString(mixColors(sectionACTIVEColor,
			bodyBGColor, Math.min(1, time / funcTime)));
	sectionTextColor = mixColors(bodyBGColor, sectionACTIVEColor, Math.min(1,
			time / funcTime));
	sections[sectionNumber].style.font = (13 + 37 * Math
			.min(1, time / funcTime))
			+ "pt 'Segoe UI'";
	sectionDX = Math.min(1, time / funcTime)
			* (sections[sectionNumber].clientWidth / 2);
	var scale = 1 - Math.min(1, time / funcTime) * 0.75;
	lightImg.style.width = ksbwidth * scale;
	canvasUp.style.transform = "scaleX(" + scale + ") scaleY(" + scale + ")";
	center();
}

function showPage() {
	var lastRender = new Date();
	var lightStartX = parseFloat(ksb.offsetLeft + lightImg.offsetLeft);
	var lightStartY = parseFloat(ksb.offsetTop + lightImg.offsetTop);
	var SectionNameStartX = parseFloat(sections[sectionClicked].offsetLeft);
	var SectionNameStartY = parseFloat(sections[sectionClicked].offsetTop);
	var canvasUpTransform = canvasUp.style.transform;
	canvasActive.style.opacity = 0;
	canvas.style.opacity = 0;
	inPage = true;
	function render() {
		var time = new Date() - lastRender;
		upLightAndSectionName(500, 0, time, sections[sectionClicked], [
				lightStartX, lightStartY, 60, 20 ], [ SectionNameStartX,
				SectionNameStartY, 140, 0 ], canvasUpTransform);
		showPageDiv(150, 450, time);
		if (time < 600) {
			requestAnimationFrame(render);
		} else {
			goToPage(sectionClicked);
		}
	}
	render();
}

function upLightAndSectionName(funcTime, wait, t, s, lcoors, sncoors,
		canvasUpTransform) {
	if (t < wait) {
		return;
	}
	var time = t - wait;
	var ldx = -(lcoors[0] - lcoors[2]) * Math.min(1, time / funcTime);
	var ldy = -(lcoors[1] - lcoors[3]) * Math.min(1, time / funcTime);
	var sndx = -(sncoors[0] - sncoors[2]) * Math.min(1, time / funcTime);
	var sndy = -(sncoors[1] - sncoors[3]) * Math.min(1, time / funcTime);
	ksb.style.transform = "translate(" + ldx + "px, " + ldy + "px)";
	s.style.transform = "translate(" + sndx + "px, " + sndy + "px)";
	bodyBGColor = toRGBString(mixColors(whiteColor, sectionACTIVEColor,
			0.25 * Math.min(1, time / funcTime)));
	document.body.style.background = bodyBGColor;
}

function showPageDiv(funcTime, wait, t) {
	if (t < wait) {
		return;
	}
	var time = t - wait;
	pageDiv.style.opacity = Math.min(1, time / funcTime);
	document.getElementById("main").style.opacity = Math.min(1, time / funcTime);
}


function fastToPage(n) {
	var n1 = n;
	if (n1 == 8) {
		n1 = 4;
	}
	
	sectionClicked = n1;
	lights.style.opacity = 0;
	
	var phi1 = lightSpace + 1 + (n1 + 0.5) * sAngle;
	var phi2 = 90;
	var angle = (phi2 - phi1);
	canvasActive.style.transform = "rotate(" + angle + "deg)";
	canvas.style.transform = "rotate(" + angle + "deg)";
	canvasDown.style.transform = "rotate(" + angle + "deg)";
	opacity = 0;
	canvasDown.style.opacity = opacity;
	contextAngle = angle;
	spiralD = spiralD0 * Math.pow(1.1, 50);

	only.nowrap--;
	var text = sections[n1].innerHTML;
	sections[n1].innerHTML = text.replace("<br>", " ");
	
	bodyAngle = Math.floor((360 - sAngle) / di) * di;
	document.body.style.background = toRGBString(mixColors(sectionACTIVEColor,
			bodyBGColor, 1));
	sectionTextColor = mixColors(bodyBGColor, sectionACTIVEColor, 1);
	sections[n1].style.font = 50 + "pt 'Segoe UI'";
	sectionDX = sections[n1].clientWidth / 2;
	var scale = 0.25;
	lightImg.style.width = ksbwidth * scale;
	canvasUp.style.transform = "scaleX(" + scale + ") scaleY(" + scale + ")";
	center();
	
	redrawLightCoNT();

	var lightStartX = parseFloat(ksb.offsetLeft + lightImg.offsetLeft);
	var lightStartY = parseFloat(ksb.offsetTop + lightImg.offsetTop);
	var SectionNameStartX = parseFloat(sections[n1].offsetLeft);
	var SectionNameStartY = parseFloat(sections[n1].offsetTop);
	var canvasUpTransform = canvasUp.style.transform;
	canvasActive.style.opacity = 0;
	canvas.style.opacity = 0;
	inPage = true;
	var lcoors = [lightStartX, lightStartY, 60, 20];
	var sncoors = [SectionNameStartX, SectionNameStartY, 140, 0];
	var s = sections[n1];
	
	var ldx = -(lcoors[0] - lcoors[2]);
	var ldy = -(lcoors[1] - lcoors[3]);
	var sndx = -(sncoors[0] - sncoors[2]);
	var sndy = -(sncoors[1] - sncoors[3]);
	ksb.style.transform = "translate(" + ldx + "px, " + ldy + "px)";
	s.style.transform = "translate(" + sndx + "px, " + sndy + "px)";
	bodyBGColor = toRGBString(mixColors(whiteColor, sectionACTIVEColor,
			0.25));
	document.body.style.background = bodyBGColor;
	pageDiv.style.opacity = 1;
	document.getElementById("main").style.opacity = 1;
	goToPage(n);
}