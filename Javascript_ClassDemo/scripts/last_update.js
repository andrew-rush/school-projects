// JavaScript Document

// get the date of the lost modification

function getLastUpdated() {
	
	myDate = new Date(document.lastModified);
	theYear = myDate.getFullYear();
	months = ['January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'];
	days = ['Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday'];
	theMonth=months[myDate.getMonth()];
	myDay = myDate.getDay();
	theDay = days[myDay];
	myDateString = theDay + ' ' + theMonth + ' ' + myDate.getDate() + ', ' + theYear;
	return myDateString;
	
}
