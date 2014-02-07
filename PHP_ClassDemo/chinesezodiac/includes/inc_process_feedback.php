<?php

	if( isset($_POST['submit']) ) {

		if( empty($_POST['sender']) || empty($_POST['msg']) ) {
			
			echo "<p>Sender and Feedback must have data entered</p>\n";
			
		} else {
			
			include("includes/inc_connect.php"); // Connection made and database selected
			$table = "feedback";
			
			$sql = "INSERT INTO $table (msgDate,
										msgTime,
										sender,
										msg,
										publicMsg)
					VALUES (NOW(),
							NOW(),
							'{$_POST['sender']}',
							'{$_POST['msg']}',
							'{$_POST['publicMsg']}')";
							
			$result = @mysql_query($sql, $conn);
			
			if($result === FALSE) {
				
				echo "<p>Error " . mysql_errno($conn) .": " . mysql_error($conn) . "\n<br />$sql</p>\n";
				
			} else {
				
				echo "<p>Thank you for your feedback!</p>\n";
				
			}
			
		}
										
	} else {
		
		include("includes/inc_feedback_form.php");
		
	}
		
?>