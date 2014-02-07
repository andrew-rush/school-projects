// JavaScript Document

	var visits = 0;
	visits = getCookie("VisitNumber");
	if(visits != null)
	{
		visits = parseInt(visits) + 1;
	}
	else
	{
		visits = 1;
	}
	addCookie("VisitNumber", visits);