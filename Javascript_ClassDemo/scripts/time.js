// JavaScript Document

function theTime() {
	
	// get the date
	today = new Date();
	hours = today.getHours();
	if(hours > 12) {
		hours = hours - 12;
		pm = true;
	} else {
		pm = false;
	}
	
	hours = ('0' + hours).slice(-2);
	minutes = ('0' + today.getMinutes()).slice(-2);
	seconds = ('0' + today.getSeconds()).slice(-2);
	myString = hours + ":" + minutes + ":" + seconds;
	if(pm == true) {
		myString = myString + " PM";
	} else {
		myString = myString + " AM";
	}
	
	document.clock.time.value=myString;
	return myString;
}