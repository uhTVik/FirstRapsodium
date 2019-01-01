<?php
session_start ();
include_once $_SERVER ['DOCUMENT_ROOT'] . '/functions.php';
?>
<html>
<head>
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/allpages.css">
<script type="text/javascript" src="/js/ajax/ajax.js"></script>
<script type="text/javascript" src="/js/ajax/windows.js"></script>
<script type="text/javascript">
	var listUpdateXmlHttp = getXmlHttp();
	var isloggedinXmlHttp = getXmlHttp();
	function autoUpdate() {
		var listUpdateurl = "/ajax/toplists.php?reload=1";
		listUpdateXmlHttp.open("GET", listUpdateurl, true);
		listUpdateXmlHttp.onreadystatechange = updateLists;
		listUpdateXmlHttp.send(null);
		var isloggedinurl = "/ajax/isloggedin.php?reload=1";
		isloggedinXmlHttp.open("GET", isloggedinurl, true);
		isloggedinXmlHttp.onreadystatechange = updateTop;
		isloggedinXmlHttp.send(null);
	}

	function updateLists() {
		if (listUpdateXmlHttp.readyState == 4) {
			var response = listUpdateXmlHttp.responseText.split(" ");
			var spanbest = best.getElementsByTagName("span")[0];
			var spanor = or.getElementsByTagName("span")[0];
			var spanbuy = buy.getElementsByTagName("span")[0];
			if (response.length == 3) {
				if (spanbest.innerHTML != response[0]) {
					spanbest.innerHTML = response[0];
				}
				if (spanor.innerHTML != response[1]) {
					spanor.innerHTML = response[1];
				}
				if (spanbuy.innerHTML != response[2]) {
					spanbuy.innerHTML = response[2];
				}
			}
			spanbest.style.visibility = 'visible';
			spanor.style.visibility = 'visible';
			spanbuy.style.visibility = 'visible';
		}
	}

	function updateTop() {
		if (isloggedinXmlHttp.readyState == 4) {
			var response = isloggedinXmlHttp.responseText;
			if (response != 2) {
				fmadm.style.display = "none";
			} else {
				fmadm.style.display = "inline";
			}
			if (response != 0) {
				fmreg.style.display = "none";
				fmauth.style.display = "none";
				fmprof.style.display = "inline";
				fmout.style.display = "inline";
			} else {
				fmreg.style.display = "inline";
				fmauth.style.display = "inline";
				fmprof.style.display = "none";
				fmout.style.display = "none";
			}
			setTimeout(autoUpdate, 10);
		}
	}
	
	window.onload = autoUpdate;
</script>
</head>
<body>
<div class="leftTrempel"></div>
<div class="rightTrempel"></div>
	<div class="firstTopMenu">
		<div class='topPhone textHRef'>
			<img alt="трубка" src="/images/picfunc/top/phone.png">
			<span>+7 921 947-56-87</span>
		</div>
		<ul class="firstTopMenu">
			<?php
			$admin = $_SESSION ['id'] == 1;
			$id = $_SESSION ['id'];
			?>
			<li id='fmadm' <?php if(!$admin) {echo "style='display: none;'";} ?> >
				<?php writeLink("Войти&nbsp;в&nbsp;админку", "/admin/index.php")?>
			</li>
			<li><?php writeLink("Главная&nbsp;страница", "/index.php")?></li>
			<li><?php writeLink("Информация&nbsp;о&nbsp;заказе", "javascript:act('info');")?></li>
			<li id='fmreg' <?php if($id != 0) {echo "style='display: none;'";} ?> >
				<?php writeLink("Регистрация", "javascript:act('reg');")?>
			</li>
			<li id='fmauth' <?php if($id != 0) {echo "style='display: none;'";} ?> >
				<?php writeLink("Вход", "javascript:act('auth');")?>
			</li>
			<li id='fmprof' <?php if($id == 0) {echo "style='display: none;'";} ?> >
				<?php writeLink("Личный кабинет", "/profile/")?>
			</li>
			<li id='fmout' <?php if($id == 0) {echo "style='display: none;'";} ?> >
				<?php writeLink("Выход", "javascript:act('logout');")?>
			</li>
		</ul>
	</div>
	<div class="topLogoname">
		<div class="topLogo">
			<img src="/images/logo.png" alt="логотип" width="104" height="104">
		</div>
		<div class="topSiteName">
			<h1 class="topSiteName">Вексель</h1>
			<h2 class="topSiteName">Интернет-магазин бытовой техники и электроники</h2>
		</div>
		<div class="topFuncpages">
			<div id="best" onclick="window.location.href = '/profile/?page=3'">
 				<img alt="Избранное" src="/images/picfunc/best.png" width="30px" height="30px">
				<span class="amount">0</span>
			</div>
			<div id="or" onclick="window.location.href = '/profile/?page=4'">
				<img alt="Избранное" src="/images/picfunc/or.png" width="30px" height="30px">
				<span class="amount">0</span>
			</div>
			<div id="buy" onclick="window.location.href = '/profile/?page=2'">
				<img alt="Избранное" src="/images/picfunc/buy.png" width="30px" height="30px">
				<span class="amount">0</span>
			</div>
		</div>
	</div>
	<div class="secondTopMenu">
		<ul class="secondTopMenu">
			<li><?php writeLink("Каталог&nbsp;товаров", "/catalog")?></li>
			<li><?php writeLink("Доставка", "/delivery.php")?></li>
			<li><?php writeLink("О нас", "/about.php")?></li>
			<li><?php writeLink("Связаться&nbsp;с&nbsp;нами", "/contacts.php")?></li>
			<li><?php writeLink("Акции и скидки", "/discounts.php")?></li>
		</ul>
	</div>
</body>
</html>