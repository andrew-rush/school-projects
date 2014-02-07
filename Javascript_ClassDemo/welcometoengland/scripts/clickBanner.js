// JavaScript Document

function changeURL() {
		
	switch(picCounter)
		{
			case 1:
				url = 'http://aviewoncities.com/london/stpaulscathedral.htm';
				break;
			case 2:
				url = 'http://www.facebook.com/OfficialLondonEve';
				break;
			case 3:
				url = 'http://www.harrods.com/content/the-store/visiting-the-store/';
				break;
			default:
				url = "";
				break;
		}
	
	
	window.location = url;
	document.banner.src = pictures(picCounter);
	
}