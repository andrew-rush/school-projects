// JavaScript Document

	function setBackground(){
		var bgImg = new Array('url(\'images/backgrounds/desert.jpg\')',
							'url(\'images/backgrounds/tarn.jpg\')',
							'url(\'images/backgrounds/ocean.jpg\')',
							'url(\'images/backgrounds/road.jpg\')');
	
		var bgVal = "";
		bgVal = getCookie("background");
		if(bgVal != null)
		{
			document.body.style.backgroundImage = bgImg[bgVal];
			document.body.style.backgroundSize = "100%";
		}
	}