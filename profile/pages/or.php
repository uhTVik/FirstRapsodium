<html>
<head>
<link rel="stylesheet" href="/css/profile/or.css">
<script type="text/javascript">
function showParams(button) {
	var parent = button.parentNode;
	var buttons = parent.getElementsByClassName("orscontrol");
	for (var i = 0; i < buttons.length; i++) {
		var b = buttons[i];
		b.style.background = "white";
	}
	button.style.background = "#f8fafc";
}
function openclose(name, cat) {
	var ex = document.getElementById(name);
	var img = cat.getElementsByTagName('img')[0];
	if (ex.style.display != 'block') {
		ex.style.display = 'block';
		img.src = '/images/right.png';
	} else {
		ex.style.display = 'none';
		img.src = '/images/rightf.png';
	}
}
</script>
</head>
<body>
	<div class='categories'>
		<div class='category' onclick="openclose('ex1', this);">
			Ноутбуки <img src="/images/blu_d.png">
		</div>
		<div class='exact' id='ex1'>
			<table class='rubtable'>
				<tr>
					<td><img src='/images/stuffs/stuff1/0.png'></td>
					<td><img src='/images/stuffs/stuff4/0.png'></td>
					<td><img src='/images/stuffs/stuff2/0.png'></td>
				</tr>
				<tr>
					<td><h3>Провод текстильный бежевый переходный</h3></td>
					<td><h3>Гитара Ройцка УМНАЯ</h3></td>
					<td><h3>Apple iPhone 7G Laser Blue</h3></td>
				</tr>
				<tr>
					<td>
						<div class="price">
							<span class='newprice price'>8 000</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>68 000</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>1 000</span><br>
						</div>
					</td>
				</tr>
				<tr>
					<td><?php writeRating(3); ?></td>
					<td><?php writeRating(4); ?></td>
					<td><?php writeRating(5); ?></td>
				</tr>
				<tr>
					<td><h3 class='comments'>15 отзывов</h3></td>
					<td><h3 class='comments'>1 отзыв</h3></td>
					<td><h3 class='comments'>352 отзыва</h3></td>
				</tr>
			</table>
			<div class='ors'>
				<div class='orsbutdiv'>
					<button class='orscontrol orscbl' onclick="showParams(this);">
					Все параметры</button>
					<button class='orscontrol orscbr' onclick="showParams(this);">
					Различающиеся</button>
				</div>
				<table class='orstable'>
					<tr>
						<td>ОС</td>
						<td>Android</td>
						<td>Fuck you!</td>
						<td>Windows</td>
						<td></td>
					</tr>
					<tr>
						<td>Разрешение дисплея, пк</td>
						<td>1920x1080</td>
						<td>1240x680</td>
						<td>2048x1440</td>
						<td></td>
					</tr>
					<tr>
						<td>Время зарядки, ч</td>
						<td>12</td>
						<td>3</td>
						<td>10</td>
						<td></td>
					</tr>
					<tr>
						<td>ОЗУ, Мб</td>
						<td>2048</td>
						<td>1023</td>
						<td>4096</td>
						<td></td>
					</tr>
					<tr>
						<td>Влагозащита</td>
						<td>Нет</td>
						<td>Да</td>
						<td>Нет</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class='category' onclick="openclose('ex2', this);">Смартфоны <img src="/images/blu_d.png"></div>
		<div class='exact' id='ex2'>
			<table class='rubtable'>
				<tr>
					<td><img src='/images/stuffs/stuff1/0.png'></td>
					<td><img src='/images/stuffs/stuff5/0.png'></td>
					<td><img src='/images/stuffs/stuff2/0.png'></td>
				</tr>
				<tr>
					<td><h3>Провод текстильный бежевый переходный</h3></td>
					<td><h3>Гитара Ройцка УМНАЯ</h3></td>
					<td><h3>Apple iPhone 7G Laser Blue</h3></td>
				</tr>
				<tr>
					<td>
						<div class="price">
							<span class='newprice price'>8 000</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>68 000</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>1 000</span><br>
						</div>
					</td>
				</tr>
				<tr>
					<td><?php writeRating(3); ?></td>
					<td><?php writeRating(4); ?></td>
					<td><?php writeRating(5); ?></td>
				</tr>
				<tr>
					<td><h3 class='comments'>15 отзывов</h3></td>
					<td><h3 class='comments'>1 отзыв</h3></td>
					<td><h3 class='comments'>352 отзыва</h3></td>
				</tr>
			</table>
			<div class='ors'>
				<div class='orsbutdiv'>
					<button class='orscontrol orscbl' onclick="showParams(this);">
					Все параметры</button>
					<button class='orscontrol orscbr' onclick="showParams(this);">
					Различающиеся</button>
				</div>
				<table class='orstable'>
					<tr>
						<td>ОС</td>
						<td>Android</td>
						<td>Gitara</td>
						<td>Windows</td>
						<td></td>
					</tr>
					<tr>
						<td>Разрешение дисплея (пк)</td>
						<td>1920x1080</td>
						<td>1240x680</td>
						<td>2048x1440</td>
						<td></td>
					</tr>
					<tr>
						<td>Время зарядки (ч)</td>
						<td>12</td>
						<td>3</td>
						<td>10</td>
						<td></td>
					</tr>
					<tr>
						<td>ОЗУ (Мб)</td>
						<td>2048</td>
						<td>1023</td>
						<td>4096</td>
						<td></td>
					</tr>
					<tr>
						<td>Влагозащита</td>
						<td>Нет</td>
						<td>Да</td>
						<td>Нет</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class='category' onclick="openclose('ex3', this);">Холодильники<img src="/images/blu_d.png"></div>
		<div class='exact' id='ex3'>
			<table class='rubtable'>
				<tr>
					<td><img src='/images/stuffs/stuff1/0.png'></td>
					<td><img src='/images/stuffs/stuff5/0.png'></td>
					<td><img src='/images/stuffs/stuff2/0.png'></td>
				</tr>
				<tr>
					<td><h3>Провод текстильный бежевый переходный</h3></td>
					<td><h3>Гитара Ройцка УМНАЯ</h3></td>
					<td><h3>Apple iPhone 7G Laser Blue</h3></td>
				</tr>
				<tr>
					<td>
						<div class="price">
							<span class='newprice price'>8 000</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>0</span><br>
						</div>
					</td>
					<td>
						<div class="price">
							<span class='newprice price'>1 000</span><br>
						</div>
					</td>
				</tr>
				<tr>
					<td><?php writeRating(3); ?></td>
					<td><?php writeRating(4); ?></td>
					<td><?php writeRating(5); ?></td>
				</tr>
				<tr>
					<td><h3 class='comments'>15 отзывов</h3></td>
					<td><h3 class='comments'>100 отзыв</h3></td>
					<td><h3 class='comments'>352 отзыва</h3></td>
				</tr>
			</table>
			<div class='ors'>
				<div class='orsbutdiv'>
					<button class='orscontrol orscbl' onclick="showParams(this);">
					Все параметры</button>
					<button class='orscontrol orscbr' onclick="showParams(this);">
					Различающиеся</button>
				</div>
				<table class='orstable'>
					<tr>
						<td>ОС</td>
						<td>Android</td>
						<td>Fuck you!</td>
						<td>Windows</td>
						<td></td>
					</tr>
					<tr>
						<td>Разрешение дисплея (пк)</td>
						<td>1920x1080</td>
						<td>1240x680</td>
						<td>2048x1440</td>
						<td></td>
					</tr>
					<tr>
						<td>Время зарядки (ч)</td>
						<td>12</td>
						<td>3</td>
						<td>10</td>
						<td></td>
					</tr>
					<tr>
						<td>ОЗУ (Мб)</td>
						<td>2048</td>
						<td>1023</td>
						<td>4096</td>
						<td></td>
					</tr>
					<tr>
						<td>Влагозащита</td>
						<td>Нет</td>
						<td>Да</td>
						<td>Нет</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>