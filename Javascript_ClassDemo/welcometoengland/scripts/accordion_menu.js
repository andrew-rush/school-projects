// JavaScript Document

function switchMenu(currentMenu) {
	if(document.getElementById)
	{
		thisMenu = document.getElementById(currentMenu).style;
		if(thisMenu.display == "block")
		{
			thisMenu.display = "none";
		} else {
			thisMenu.display = "block";
		}
		return false;
	} else {
		return true;
	}
}