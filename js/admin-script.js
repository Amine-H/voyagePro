function addCity()
{
	var select = document.getElementById('city');
	var cities = document.getElementById('cities');
	var cities_hidden = document.getElementById('cities_hidden');
	var rm = select.options[select.selectedIndex];
	var cityId = select.value;
	var cityName = rm.text;
	var sep = ',';
	var citiesArray = cities_hidden.value.split(sep);
	if(cities.value.length == 0){sep='';}
	if(citiesArray.indexOf(cityId)<0)
	{
		cities.value = cities.value + sep + cityName;
		cities_hidden.value = cities_hidden.value + sep + cityId;
		rm.parentNode.removeChild(rm);
	}
}
function fetchCities()
{
	
}