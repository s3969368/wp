function doMenu()
{
	//get a reference to the select object
	var menu = document.getElementById("menu");
	
	//find which option has been chosen and get the value (the url)
	var url = menu.options[menu.selectedIndex].value;
	
	//go there
	location.href=url;
}