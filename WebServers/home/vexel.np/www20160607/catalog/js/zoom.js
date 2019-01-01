function zoom(stuffImgDiv) {
	var zoombox = stuffImgDiv.getElementsByClassName("zoombox")[0];
	var big = stuffImgDiv.parentNode.parentNode.getElementsByClassName("bigStuffImageDiv")[0];
	var bigimg = big.getElementsByClassName("bigStuffImage")[0];
	var stuffImg = stuffImgDiv.getElementsByClassName("mainStuffImage")[0];
	var whiteList = stuffImgDiv.parentNode.parentNode.getElementsByClassName("whiteList")[0];
	whiteList.style.display = "block";
	big.style.opacity = "1";
	big.style.display = "block";
	zoombox.style.opacity = "1";
	var xMCoor = event.pageX;
	var yMCoor = event.pageY;
	var stuffImgDivX = stuffImgDiv.offsetLeft;
	var stuffImgDivY = stuffImgDiv.offsetTop;
	var stuffImgDivW = stuffImgDiv.clientWidth;
	var stuffImgDivH = stuffImgDiv.clientHeight;
	var stuffImgX = stuffImg.offsetLeft;
	var stuffImgY = stuffImg.offsetTop;
	var stuffImgW = stuffImg.clientWidth;
	var bigimgW = bigimg.clientWidth;
	zoombox.style.width = stuffImgW * big.clientWidth / bigimgW;
	zoombox.style.height = stuffImgW * big.clientWidth / bigimgW;
	var zoomboxW = zoombox.clientWidth;
	var zoomboxH = zoombox.clientHeight;
	var calculatedX = xMCoor - zoomboxW / 2;
	var calculatedY = yMCoor - zoomboxH / 2;
	calculatedX = Math.min(calculatedX, stuffImgDivX + stuffImgDivW - zoomboxW);
	calculatedX = Math.max(calculatedX, stuffImgDivX);
	calculatedY = Math.min(calculatedY, stuffImgDivY + stuffImgDivH - zoomboxH);
	calculatedY = Math.max(calculatedY, stuffImgDivY);
	zoombox.style.left = calculatedX + 1;
	zoombox.style.top = calculatedY + 1;
	bigimg.style.top = (stuffImgY - calculatedY) * bigimgW / stuffImgW;
	bigimg.style.left = (stuffImgX - calculatedX) * bigimgW / stuffImgW;
}

function unzoom(stuffImgDiv) {
	var zoombox = stuffImgDiv.getElementsByClassName("zoombox")[0];
	var big = stuffImgDiv.parentNode.parentNode.getElementsByClassName("bigStuffImageDiv")[0];
	var whiteList = stuffImgDiv.parentNode.parentNode.getElementsByClassName("whiteList")[0];
	whiteList.style.display = "none";
	big.style.opacity = "0";
	big.style.display = "none";
	zoombox.style.opacity = "0";
}