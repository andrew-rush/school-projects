// JavaScript Document

	function displaySelected() {

		var img = new Array('url(\'images/backgrounds/desert.jpg\')',
							'url(\'images/backgrounds/tarn.jpg\')',
							'url(\'images/backgrounds/ocean.jpg\')',
							'url(\'images/backgrounds/road.jpg\')');
		

	
		
		var selected = document.backgroundForm.backgroundSelect.selectedIndex;
		
		if(selected > 0) {
			
			selected = selected - 1;
			document.body.style.backgroundImage = img[selected];
			setCookie("background", selected);
		}
		
	}