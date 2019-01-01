<html>
<head>
<title>Свет</title>
<link rel="stylesheet" href="/css/index.css">
<script type="text/javascript">
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
function layOutPages() {
	var ksb = document.getElementsByClassName("ksb")[0];
	var pagesDiv = ksb.getElementsByClassName("pages")[0];
	var pages = pagesDiv.getElementsByTagName("div");
	var xes = [-250, -300, -250, 250, 300, 250];
	var yes = [-70, 20, 120];
	yes[3] = yes[2];
	yes[4] = yes[1];
	yes[5] = yes[0];
	for (var i = 0; i < pages.length; i++) {
		var x = pagesDiv.clientWidth / 2;
		var y = pagesDiv.clientHeight / 2;
		var x1 = xes[i] + x;
		var y1 = yes[i] + y;
		pages[i].style.left = x1 - pages[i].clientWidth / 2;
		pages[i].style.top = y1 - pages[i].clientHeight / 2;
	}
}
function reloadWindow() {
	center();
	layOutPages();
// 	var trik = document.getElementsByClassName("ksb")[0].getElementsByTagName('img')[1];
// 	var start = Date.now();
// 	var timer = setInterval(function() { draw(Date.now() - start); }, 2);
// 	function draw(timePassed) {
// 		trik.style.transform = "rotate(" + timePassed / 400 + "deg)";
// 	}
}
window.onload = reloadWindow;
window.onresize = reloadWindow;
</script>
</head>

<body>
	<div class='circlecont'>
		<div class='circle'></div>
	</div>
	<div class='ksb center'>
		<p class='name'>Общественное движение Свёт</p>
		<img src="/images/ksb-rad.png" class='center'>
		<img src="/images/ksbi-trik.png" class='center'>
		<div class='pages center'>
			<div><a href="/about.php">Кто мы такие?</a></div>
			<div><a href="/ideology.php">Идеология</a></div>
			<div><a href="/actions.php">События</a></div>
			<div><a href="/projects.php">Проекты</a></div>
			<div><a href="/friends.php">Наши друзья</a></div>
			<div><a href="/contacts.php">Контакты</a></div>
		</div>
	</div>
</body>
</html>