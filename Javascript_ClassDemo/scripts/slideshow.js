// JavaScript Document

	var slideCounter = 1;
	
	function firstDiv() {
		
		// get the currently visible div
		var div1 = "d" + slideCounter;
		var e1 = document.getElementById(div1);
		
		var div2 = "d1";
		var e2 = document.getElementById(div2);
		
		e1.style.display = 'none';
		e2.style.display = 'block';
		
		// reset the counter
		slideCounter = 1;
		
	}
	
	function prevDiv() {
		
		//alert(counter);
		
		// get the currently visible div
		var div1 = "d" + slideCounter;
		var e1 = document.getElementById(div1);
		
		// increment the counter
		slideCounter--;
		
		// but don't let the counter reach 0
		if(slideCounter == 0) {
			
			
			slideCounter = 5;
			
		}
		
		// get the div we want to toggle visibility
		var div2 = "d" + slideCounter;
		var e2 = document.getElementById(div2);
		
		e1.style.display = 'none';
		e2.style.display = 'block';
		
		
	}
	
	function nextDiv() {
		
		//alert(counter);
		
		// get the currently visible div
		var div1 = "d" + slideCounter;
		var e1 = document.getElementById(div1);
		
		// increment the counter
		slideCounter++;
		
		// but don't let the counter get larger
		// than the number of divs to toggle
		if(slideCounter == 6) {
			
			
			slideCounter = 1;
			
		}
		
		// get the div we want to toggle visibility
		var div2 = "d" + slideCounter;
		var e2 = document.getElementById(div2);
		
		e1.style.display = 'none';
		e2.style.display = 'block';
		
	}
	
	function lastDiv() {
		
		// get the currently visible div
		var div1 = "d" + slideCounter;
		var e1 = document.getElementById(div1);
		
		var div2 = "d5";
		var e2 = document.getElementById(div2);
		
		e1.style.display = 'none';
		e2.style.display = 'block';
		
		// reset the counter
		slideCounter = 5;
	}