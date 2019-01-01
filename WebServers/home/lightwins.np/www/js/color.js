function color(red, green, blue, alpha) {
	return {r:Math.floor(red), g:Math.floor(green), b:Math.floor(blue), a:alpha};
}

function toZeroColor(color1) {
	return color(color1.r, color1.g, color1.b, 0);
}

function toRGBString(color1) {
	return "rgb(" + color1.r + ", " + color1.g + ", " + color1.b + ")";
}

function toRGBAString(color1) {
	return "rgba(" + color1.r + ", " + color1.g + ", " + color1.b + ", " + color1.a + ")";
}

function mixColors(color1, color2, d) {
	return color(color1.r * d + color2.r * (1 - d),
			color1.g * d + color2.g * (1 - d),
			color1.b * d + color2.b * (1 - d),
			color1.a * d + color2.a * (1 - d));
}

var whiteColor = color(255, 255, 255, 1);
var blackColor = color(0, 0, 0, 1);
var zeroColor = color(0, 0, 0, 0);
var logoInColor = color(9, 162, 230, 1);
var logoOutColor = color(0, 0, 160, 1);

var plakMan0Color = color(203, 235, 250, 1);
var plakMan1Color = color(159, 217, 246, 1);
var plakMan2Color = color(76, 179, 228, 1);
var plakMan3Color = color(13, 120, 183, 1);
var plakMan4Color = color(5, 80, 129, 1);