<html>
<head>
<meta charset="utf-8">
<style type="text/css">
@CHARSET "UTF-8";

@font-face {
	font-family: Segoe UI Light;
	src: url("../fonts/segoeuil.ttf");
}

img {
	position: absolute;
	width: 400px;
	right: calc(50% - 200px);
	top: 30px;
}

h1 {
	position: relative;
	font: 100px 'Segoe UI Light';
	color: red;
	text-align: center;
	top: 450px;
}
</style>


</head>
<script type="text/javascript">
var sus = 403;
</script>
<body style="background: black;">
	<img id="imger"
		src="/images/special/guitar.jpg"
		onclick="cl();">
	<h1 id="hid">403 ФОРБИДДЕН</h1>
	<script type="text/javascript">
	var click = false;
	function cl() {
		sus += 1;
// 		alert(sus);
		h = document.getElementById("hid");
		h.innerHTML = sus + " ФОРБИДДЕН";
		click = !click;
		var img = document.getElementById("imger");
		var start = Date.now();
		var timer = setInterval(function() { draw(Date.now() - start, click); }, 2);
		function draw(timePassed, click) {
			if (click) {
				img.style.transform = "rotate(" + Math.sin(timePassed / 400) * timePassed / 40 + "deg)";
			} else { 
				img.style.transform = "rotate(0deg)";
				clearInterval(timer);
			}
		}
	}
</script>
</body>
</html>
