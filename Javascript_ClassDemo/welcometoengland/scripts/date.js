// JavaScript Document

function displayDate() {
	
	// instantiate a new date object
	var today = new Date();
	// var theDay = today.toDateString();
	// document.write("<h1>" + theDay + "</h1>");
	// extract day name
	var weekDay = today.getDay();
	if(weekDay == 0) {
		weekDay = "Sunday";	
	}
	if(weekDay == 1) {
		weekDay = "Monday";	
	}
	if(weekDay == 2) {
		weekDay = "Tuesday";	
	}
	if(weekDay == 3) {
		weekDay = "Wednesday";	
	}
	if(weekDay == 4) {
		weekDay = "Thursday";	
	}
	if(weekDay == 5) {
		weekDay = "Friday";	
	}
	if(weekDay == 6) {
		weekDay = "Saturday";	
	}
	// get the numeric value for the month
	var month = today.getMonth();
	// add one so it matches teh real world value
	month += 1;
	// get the day of the month
	var date = today.getDate();
	// get the year
	var year = today.getFullYear();
	document.write("<h2 class=\"centerContent\">Today is " + weekDay + ", " + month + "/" + date + "/" + year + "</h2>");
	
}