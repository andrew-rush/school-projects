// JavaScript Document

function calcDays(date1, date2) {
	
	date1 = new Date(date1);
	date2 = new Date(date2);
	
	// find the later date by comparing the milliseconds
	if(date1 > date2) {
		diff = date1 - date2;
	} else {
		diff = date2 - date1;
	}
	
	aDay = 86400000; // 1000 * 60 * 60 *24;  milliseconds * seconds * minutes * hours
	days = Math.ceil(diff/aDay);
	
	alert("Number of days: " + days);
	
}