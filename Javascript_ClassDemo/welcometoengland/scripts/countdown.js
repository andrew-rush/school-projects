// JavaScript Document

function countdownTrip() {

	today = new Date();
	trip = new Date("September 23, 2013");	
	
	difference = trip-today.getTime();
	days = difference/(60 * 1000 * 60 * 24);
	days = Math.round(days);
	if(days > 0) {
		document.write("There are " + days + " until my trip to England!");
	} else {
		document.write("Today is my trip! Headed to England!");
	}	
	
}