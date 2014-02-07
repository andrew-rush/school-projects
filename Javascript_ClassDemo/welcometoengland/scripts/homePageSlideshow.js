// JavaScript Document

	slides = new Array('images/slideshow/ben.jpg',
					'images/slideshow/city.jpg',
					'images/slideshow/beatle.jpg',
					'images/slideshow/eye.jpg',
					'images/slideshow/bridge.jpg',
					'images/slideshow/hpstudio.jpg',
					'images/slideshow/guard.jpg',
					'images/slideshow/holmes.jpg',
					'images/slideshow/phone.jpg',
					'images/slideshow/view.jpg');
	slideCounter = 0;
	
	function changeSlide(slide) {
		document.Display.src = slides[slide];
	}
	
	function first() {
		slideCounter = 0;
		changeSlide(slideCounter);
		
	}
	
	function previous() {
		if(document.slideshow && slideCounter > 0) {
			slideCounter = slideCounter - 1;
			changeSlide(slideCounter);
		} else {
			last();
		}
	}
	
	function next() {
		if(document.slideshow && slideCounter < slides.length-1) {
			slideCounter++;
			changeSlide(slideCounter);
		} else {
			first();
		}
	}
	
	function last() {
		slideCounter = slides.length-1;
		changeSlide(slideCounter);
	}