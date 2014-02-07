// JavaScript Document

// JavaScript Document
				
// image array
	cookieBannerImages= new Array("images/banners/493049d121ad78baade552c415d94377ed5.gif",
						"images/banners/oats.jpg",
						"images/banners/radio_phoolcat.png");
						
	
	
	// look for the visit cookie, if it doesn't exist, set it with a value of 1
	// if it does, increment the visit value and reset the visit cookie wieth the 
	// new value
	
	
	var visitValue = "";
	visitValue = getCookie("visit");
	if(visitValue == null)
	{
		setCookie("visit", 1);
	}
	else
	{
		visitValue++;
		setCookie("visit", visitValue);
	}
	
	
	function setCookieBanner() {
		// use the modulus function to set a variable that
		var remainder = visitValue % 3;
		document.cookieBanner.src = cookieBannerImages[remainder];
	}