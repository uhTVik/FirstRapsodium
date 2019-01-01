var myMap;
//Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);
function init () {
	myMap = new ymaps.Map('map', {
		center: [59.945, 30.321],
		zoom: 10,
        controls: ['zoomControl', 'searchControl', 'fullscreenControl']
	}, {
		searchControlProvider: 'yandex#search'
	});
	document.getElementById('destroyButton').onclick = function () {
		myMap.destroy();
	};
}