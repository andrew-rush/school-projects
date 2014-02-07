// JavaScript Document

function validateForm()
    {
        if(document.cForm.fName.value == "")
        {
            alert("You did not enter a first name. All fields need to be filled out.");
            document.cForm.fName.focus();
            return false;
        } else {
            
            if(document.cForm.lName.value == "")
            {
                alert("You did not enter a last name. All fields need to be filled out.");
                document.cForm.lName.focus();
                return false;
            } else {
                
                if(document.cForm.email.value == "")
                {
                    alert("You did not enter an email address. All fields need to be filled out.");
                    document.cForm.email.focus();
                    return false;
                } else {
                    if(document.cForm.inquiry.value == "")
					{
						alert("Please choose an inquiry type.");
						document.cForm.inquiry.focus();
						return false;
					} else {
						if(document.cForm.qBox.value.length < 1)
						{
							alert("You did not enter a question or comment. All fields need to be filled out.");
							document.cForm.qBox.focus();
							return false;
						}// end qBox conditional					
                    } // end inquiry conditional
                } // end email conditional
            } // end last name conditional
        } // end first name conditional
        
        return true;
        
    } // end function