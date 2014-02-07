<?php

	function validate($data, $field) {
		
		global $errorCnt;
		
		if( empty($data) ) {
		
			echo "<p>\"$field\" is a required field.</p>\n";
			$errorCnt = $errorCnt + 1;
			$retval = "";
			
		} else {
			
			$retval = trim($data);
			$retval = stripslashes($retval);
			
		}
		
		return($retval);
		
	}
	
	function validateEmail($data, $field) {
		
		global $errorCnt;
		if( empty($data) ) {
			
			echo "<p>\"$field\" is a required field.</p>\n";
			$errorCnt =  $errorCnt + 1;
			$retval = "";
			
		} else {
			
			$retval = trim($data);
			$retval = stripslashes($retval);
			$pattern = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\[\w-]+)*(\.[a-z]{2,})$/i";
			if( preg_match($pattern, $retval) == 0 ) {
				
				echo "<p>\"$field\" is not a valid email address.</p>\n";
				$errorCnt =  $errorCnt + 1;
				$retval = "";
			}
			
		}
		
		return($retval);
		
	}
	
	function displayForm($Sender, $Email, $Subject, $Message) {
		
		?>
        
        <h3>Contact Form</h3>
        <form method="post" action="index.php?page=final" name="contact">
        
        <p>Name<br />
        <input type="text" name="Sender" value="<?php echo $Sender; ?>" /></p>
        <p>Email<br />
        <input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
        <p>Subject<br />
        <input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
        <p>Message<br />
        <textarea name="Message" rows="10" cols="60"><?php echo $Message ?></textarea></p>
        <p><input type="submit" name="Submit" value="Send Form" /></p>
        </form>
	
		<?php
		
	}
	
	$showForm = TRUE;
	$errorCnt = 0;
	$Sender = "";
	$Email = "";
	$Subject = "";
	$Message = "";
	
	if( isset( $_POST['Submit'] ) ) {
		
		$Sender = validate($_POST['Sender'], "Sender");
		$Email = validateEmail($_POST['Email'], "Email");
		$Subject = validate($_POST['Subject'], "Subject");
		$Message = validate($_POST['Message'], "Message");
		
		if($errorCnt == 0) {
			
			$showForm = FALSE;
			
		} else {
			
			$showForm = TRUE;
			
		}
		
	}
	
	if($showForm == TRUE) {
		
		if($errorCnt > 0) {
			
			echo "<p>Please correct the errors and resubmit the form.<p>\n";
			
		}
		
		displayForm($Sender, $Email, $Subject, $Message);
		
	} else {
		
		$headers = "From: $Sender <$Email>\nCC: $Sender <$Email>\n";
		
		$result = mail("andrew.rush@maine.edu", $Subject, $Message, $headers);
		
		if($result) {
			
			echo "<p>Your message have been sent to the webmaster. A copy has been sent to you as well.</p>\n";
			
		} else {
			
			echo "<p>There was an error sending your message.</p>\n";
			
		}
		
	}
		
	
?>