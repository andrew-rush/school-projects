// JavaScript Document

function londonTime() {
	
	today = new Date();
	lonTime = new Date();
	lonTime.setHours(today.getHours()+5);
	document.Lclock.Ltime.value = lonTime.toLocaleString();
}