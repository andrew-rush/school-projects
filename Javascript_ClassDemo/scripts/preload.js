// JavaScript Document

	var allImg = new Array("images/header.png",
						"images/css3.png",
						"images/html5.png",
						"images/jsstrict.png",
						"images/backgrounds/road.jpg",
						"images/backgrounds/desert.jpg",
						"images/backgrounds/ocean.jpg",
						"images/backgrounds/tarn.jpg",
						"images/books/css3ptl.jpg",
						"images/books/css3tmm.gif",
						"images/books/functionaljs.gif",
						"images/books/html5canvas.gif",
						"images/books/html5up&running.gif",
						"images/books/introhtml5.jpeg",
						"images/books/jstgp.gif",
						"images/books/tbocss3.gif",
						"images/books/testablejs.gif",
						"images/rickroll/dont-rickroll-me-bro.jpg",
						"images/rickroll/hEAF863A4.jpeg",
						"images/rickroll/images.jpeg",
						"images/rickroll/letters.jpeg",
						"images/rickroll/rick_roll_by_unknownsoldier9865-d61ziss.gif",
						"images/slideshow/Kern-River.jpg",
						"images/slideshow/Sierra-4.jpg",
						"images/slideshow/Sierra-5.jpg",
						"images/slideshow/Sierra-8.jpg",
						"images/slideshow/Sierra-10.jpg");
						
	function preload()
	{
		//var thisImg = new Array();
		var myImg = new Image();
		for(i=0;i<allImg.length;i++)
		{
			myImg.src = allImg[i];
			//alert("Preloading: " + myImg.src + " " + allImg[i]);
		}
	}