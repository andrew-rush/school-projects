// JavaScript Document

counter = 0;
				
// image array
images= new Array("images/html5.png",
					"images/css3.png",
					"images/jsstrict.png");

// url array, aligned in the same order as the image array
urls = new Array("http://www.w3.org/html/logo/",
				"http://www.w3.org/Style/CSS/Overview.en.html",
				"https://developer.mozilla.org/en-US/docs/Web/JavaScript");


function changePic() {
	// take the counter variable, make sure it is not more than the number of images
	// in the array
	if(counter == images.length) {
		
		counter = 0;
		
	}
	// use the counter to determine which image from the array to display
	document.Banner.src = images[counter];
	// increment the counter, so it pulls the next pic
	counter++;
	// function calls itself every three seconds to continuously change image
	setTimeout("changePic()", 3000);
}


function changeURL() {
	// counter has been incremented by changePic(), so we need to use (counter - 1)
	// to pull the right url from the url array.	
	window.location = urls[counter-1];
	
}