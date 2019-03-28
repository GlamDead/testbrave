ymaps.ready(function(){
	myMap = new ymaps.Map("map", {
                center: [0.0, 0.0],
                zoom: 1
            });
	
	
})

	function deleteBaloon(objCity){
		objCity.removeAll();
		myMap.geoObjects.removeAll();
	}
