var tds = [];

window.onresize = function() {
	var tables = document.getElementsByTagName("table");
	for (var i = 0; i < tables.length; i++) {
		repaint(tables[i]);
	}
}
window.onload = function() {
	var tables = document.getElementsByTagName("table");
	for (var i = 0; i < tables.length; i++) {
		repaint(tables[i]);
	}
}
function getTDS(i) {
	if (tds[i] == undefined) {
		tds[i] = 0;
	}
	return tds;
}
function right(table) {
	var start = Date.now();
	var timer = setInterval(function() {
		var timePassed = Date.now() - start;
		getTDS(table.id)[table.id] = Math.floor(getTDS(table.id)[table.id]) + timePassed / 250;
		repaint(table);
		if (timePassed > 249)
			clearInterval(timer);
	}, 1);
}
function left(table) {
	getTDS(table.id)[table.id] -= 1;
	repaint(table);
}
function repaint(table) {
	var rows = table.rows;
	var tr = rows[0];
	var n = tr.cells.length;
	var min = Math.floor(getTDS(table.id)[table.id] / 1);
	var max = Math.floor(min
			+ Math.min(table.parentNode.offsetWidth / 145, n));
	var coef = tds[table.id] - min * 1;
	var ltd = table.parentNode.parentNode.getElementsByClassName('ltd')[0];
	var rtd = table.parentNode.parentNode.getElementsByClassName('rtd')[0];
	table.parentNode.style.width = table.parentNode.parentNode.parentNode.clientWidth - 61 + "px";
	ltd.addEventListener('mousemove', function(event) {
		inEl(event, ltd, table, "ltd");
	});
	ltd.addEventListener('mouseout', function(event) {
		outEl(event, ltd);
	});
	rtd.addEventListener('mousemove', function(event) {
		inEl(event, rtd, table, "rtd");
	});
	rtd.addEventListener('mouseout', function(event) {
		outEl(event, rtd);
	});
	for (var j = 0; j < n; j++) {
		for (var i = 0; i < rows.length; i++) {
			tr = rows[i];
			tr.cells[j].style.left = - coef * tr.cells[min + 1].clientWidth;
		}
		if (j > min && j < max) {
			for (var i = 0; i < rows.length; i++) {
				tr = rows[i];
				tr.cells[j].style.display = 'inherit';
				tr.cells[j].style.opacity = "1";
			}
		} else if (j == min) {
			for (var i = 0; i < rows.length; i++) {
				tr = rows[i];
				tr.cells[j].style.display = 'inherit';
				tr.cells[j].style.opacity = 1 - coef;
			}
		} else if (j == max) {
			for (var i = 0; i < rows.length; i++) {
				tr = rows[i];
				tr.cells[j].style.display = 'inherit';
				tr.cells[j].style.opacity = coef;
			}
		} else {
			for (var i = 0; i < rows.length; i++) {
				tr = rows[i];
				tr.cells[j].style.display = 'none';
				tr.cells[j].style.opacity = "1";
			}
		}
	}

	if (min == 0) {
		ltd.onclick = '';
		tds[table.id + " ltd"] = 0;
		ltd.firstChild.src = 'images/leftf.png';
		ltd.style.backgroundColor = '#EEE';
		ltd.style.cursor = 'default';
	} else {
		tds[table.id + " ltd"] = 1;
		ltd.onclick = function onclick(event) {
			left(table);
		};
		ltd.firstChild.src = 'images/left.png';
	}

	if (max > n) {
		left(table);
	} else if (max == n) {
		rtd.onclick = '';
		tds[table.id + " rtd"] = 0;
		rtd.firstChild.src = 'images/rightf.png';
		rtd.style.backgroundColor = '#EEE';
		rtd.style.cursor = 'default';
	} else {
		rtd.onclick = function onclick(event) {
			right(table);
		};
		tds[table.id + " rtd"] = 1;
		rtd.firstChild.src = 'images/right.png';
	}
}
function inEl(event, td, table, type) {
	if (tds[table.id + " " + type] == 1) {
		td.style.backgroundColor = '#DDD';
		td.style.cursor = 'pointer';
	} else {
		td.style.backgroundColor = '#EEE';
		td.style.cursor = 'default';
	}
}
function outEl(event, td) {
	td.style.backgroundColor = '#EEE';
	td.style.cursor = 'default';
}