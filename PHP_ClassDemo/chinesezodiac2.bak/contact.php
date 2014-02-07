<?php

	function validate($data, $field) {
		
		global $errorCnt;
		global $errorMsgs;
		
		
		if( empty($data) ) {
		
			$errorMsgs[] = "\"$field\" is a required field";
			++$errorCnt;
			$return = "";
			
		} else {
			
			$return = trim($data);
			$return = stripslashes($return);
			
			if($field == "Email") {
				
				if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z09-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $_POST['email']) == 0) {
                            
					$errorMsgs[] = "Email must be a valid email format.";
					++$errorCnt;
					$return = "";
			
				}
				
			}
			
		}
		
		return $return;
		
	}
	
	function displayForm($Sender, $Email, $Subject, $Message) {
		
		?>
        
        <h3>Contact Me</h3>
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
	$errorCount = 0;
	$Sender = "";
	$Email = "";
	$Subject = "";
	$Message = "";
	
	if( isset( $_POST['Submit'] ) ) {
		
		$Sender = validate($_POST['Sender'], "Sender");
		$Email = validate($_POST['Email'], "Email");
		$Subject = validate($_POST['Subject'], "Subject");
		$Message = validate($_POST['Message'], "Message");
		
		if($errorCount == 0) {
			
			$showForm = FALSE;
			
		} else {
			
			$showForm = TRUE;
			
		}
		
	}
	
	if($showForm == TRUE) {
		
		if($errorCount > 0) {
			
			echo "<p>$errorCnt errors in your submission<p>\n";
			
			foreach($errorMsgs as $error) {
				
				echo "<p>$error<p>\n";
				
			}
			
		}
		
		displayForm($Sender, $Email, $Subject, $Message);
		
	} else {
		
		$from = "$Sender <$Email>";
		$headers = "From: $from\nCC: $from\n";
		
		$result = mail("andrew.rush@maine.edu", $Subject, $Message, $Headers);
		
		if($result) {
			
			echo "<p>Your message have been sent. A copy has been sent to you as well.</p>\n";
			
		} else {
			
			echo "<p>There was an error sending your message</p>\n";
			
		}
		
	}
		
	
?>