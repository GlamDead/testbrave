jQuery.noConflict();
var $ = jQuery,
		myMap;

ajaxForPage('home.php');		
		

$("li").click(function(){
	$("h2").text($(this).text());
	switch($(this).text()){
		case 'Home':
			ajaxForPage("home.php");
			break;
		case 'Задание 1':
			ajaxForPage("task1.php");
			break;
		case 'Задание 2':
			ajaxForPage("task2.php");
			break;
		case 'Задание 3':
			ajaxForPage("task3.php");
			break;
		case 'Задание 4':
			ajaxForPage("task4.php");
			break;
		case 'Задание 5':
			ajaxForPage("task5.php");
			break;
		case 'Задание 6':
			ajaxForPage("task6.php");
			break;
		case 'Задание 7':
			ajaxForPage("task7.php");
			break;
	}
	
})

$('.content').on('change', 'select', function(){
	switch($('form').attr('id')){
		case 'task2':
			ajaxForPage('task2.php?countryis=' + $("select").val());
			break;
		case 'task3':
			ajaxForPage('task3.php?countryis=' + $("select").val());
			break;
		case 'task5':
			ajaxForTask('task5.php?countryis=' + $("select").val());
			break;
	}
})

$('.content').on('click', '.wraplist button', function(){
	if($(this).attr('class') == 'nextpage'){
		variable++;
	}
	else{
		variable--;
	}
	switch($('form').attr('id')){
		case 'task3':
			ajaxForPage('task3.php?countryis=' + $("select").val() + '&page=' + variable);
			break;
		case 'task4':
			ajaxForPage('task4.php?search=' + $(".search-form-input").val() + '&page=' + variable);
			break;
		case 'task5':
			ajaxForTask('task5.php?countryis=' + $("select").val() + '&page=' + variable);
			break;
		case 'task6':
			ajaxForTask('task6.php?search=' + $(".search-form-input").val() + '&page=' + variable);
			break;
		case 'task7':
			ajaxForTask('task7.php?search=' + $(".search-form-input").val() + '&page=' + variable);
			break;
	}
})

$(".content").on('click', '.search-form-button', function(){
	ajaxForPage('task4.php?search=' + $('.search-form-input').val());
})

$('.content').on('keyup', '.search-form-input', function(){
	switch($('form').attr('id')){
		case 'task6':
			ajaxForTask('task6.php?search=' + $('.search-form-input').val());
			break;
		case 'task7':
			ajaxForTask('task7.php?search=' + $('.search-form-input').val());
			break;
	}
	
})




function ajaxForPage(url){
	$(".content").empty();
	$.ajax({
		url: url,
		success: function(html){
			$(".content").append(html);
		},
		error: function(html){
			$(".content").append(html);
		}
	});
}

function ajaxForTask(url){
	$(".wraplist").empty();
	$.ajax({
		url: url,
		success: function(html){
			$(".wraplist").append(html);
			yandexMaps();
		},
		error: function(html){
			$(".wraplist").append(html);
		}
	});
}



	function yandexMaps(){

		
		
		var objCity = new ymaps.GeoObjectCollection({},{
			preset: "islands#blackCircleIcon",
			strokeWidth: 2,
			geodesic: true,
			
		});
		deleteBaloon(objCity);
		if($(".search-form-input1").val()!=''){
			$('.li-maps').each(function(i,elem){
			ymaps.geocode($(elem).text(), {results: 1}).then(function (res) {
				var firstGeoObject = res.geoObjects.get(0);
				firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());
				objCity.add(firstGeoObject);
			});
		});
		
			myMap.geoObjects.add(objCity);

		}
		else{
			deleteBaloon(objCity);
		}
		
		
		
	}
	

	


    

