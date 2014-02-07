<?php

	class EventCalendar {
		
		private $DBConnect = NULL;
		
		function __construct() {
			
			include("includes/inc_ChineseZodiacDB.php");
			$this->DBConnect = $DBConnect;
		
		}
		
		
		function __destruct() {
			
			if(!$this->DBConnect->connect_error) {
				
				$this->DBConnect->close();
				
			}
			
		}
		
		function __wakeup() {
			
			include("includes/inc_ChineseZodiacDB.php");
			$this->DBConnect = $DBConnect;
		
		}
		
	}
	
?>