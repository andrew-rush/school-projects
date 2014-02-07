// JavaScript Document

function validateMembershipForm() {
	//alert("Validating first");
	if(document.mForm.fName.value == "") 
	{
		alert("Please enter your first name.");
		document.mForm.fName.focus();
		return false;
	} else {
		//alert("Validating last");
		if(document.mForm.lName.value == "") 
		{
			alert("Please enter your last name");
			document.mForm.lName.focus();
			return false;
		} else {
			//alert("Validating email");
			if(document.mForm.email.value == "") 
			{
				alert("Please enter your an email address.");
				document.mForm.email.focus();
				return false;
			} else {
				//alert("Validating bday");
				var regex = /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/;
				if( (document.mForm.bDay.value == '') || ( !document.mForm.bDay.value.match(regex) ) ) 
				{
					alert("Please enter a date in MM-DD-YYYY format.");
					document.mForm.bDay.value="";
					document.mForm.bDay.focus();
					return false;
				} else {
					//alert("Validating age block");
					var age=Array();
					if( 
						(document.mForm.age[0].checked == false) &&
						(document.mForm.age[1].checked == false) &&
						(document.mForm.age[2].checked == false) &&
						(document.mForm.age[3].checked == false) &&
						(document.mForm.age[4].checked == false) && 
						(document.mForm.age[5].checked == false) && 
						(document.mForm.age[6].checked == false) ) 
					{
						alert("Please select an age range!");
						document.mForm.age.value = "";
						return false;
					} else {
						//alert("Validating country");
						if( 
							(document.mForm.England.checked == false) && 
							(document.mForm.Ireland.checked == false) && 
							(document.mForm.Scotland.checked == false) && 
							(document.mForm.Norway.checked == false) && 
							(document.mForm.Sweden.checked == false) && 
							(document.mForm.Finland.checked == false) && 
							(document.mForm.Germany.checked == false) && 
							(document.mForm.Netherland.checked == false) && 
							(document.mForm.Belgium.checked == false) && 
							(document.mForm.Spain.checked == false) && 
							(document.mForm.Switzerland.checked == false) && 
							(document.mForm.Italy.checked == false) && 
							(document.mForm.Austria.checked == false) ) 
						{
							alert("You must select at least one country.");
							return false;
						} // end country
					} // end else for age
				} // end else for bDay
			} // end else for email
		} // end else for lName
	} // end else for fName
	return true;
} // end function