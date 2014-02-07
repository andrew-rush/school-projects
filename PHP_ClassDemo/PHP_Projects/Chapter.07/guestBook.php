<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Guest Book</title>
</head>



<body>
<?php

	if(isset($_GET['action'])) {
		
		if( (file_exists("guests/guestBook.txt")) && (filesize("guests/guestBook.txt")!=0) ) {
	
			$guestArray = file("guests/guestBook.txt");
	
			switch ($_GET['action']) {
	
			case 'Remove_Duplicates':
				$guestArray = array_unique($guestArray);
				$guestArray = array_values($guestArray);
				break;
	
			case 'Sort_Ascending':
				sort($guestArray);
				break;
	
			case 'Shuffle':
				shuffle($guestArray);
				break;
			}//end of switch statement
	
	
			if (count($guestArray) > 0) {
	
				//
				$tempGuests = implode($guestArray);
				
				$fileHandle = fopen("guests/guestBook.txt", "wb");
	
				if($fileHandle ===false){
					echo "There was an error updating the Guest Book\n";
				}//end of inner if
	
				else{
					fwrite($fileHandle, $tempGuests);
					fclose($fileHandle);
				}//end of inner else
	
			}//end of if (count($SongArray)>0)
		else{
				unlink("guests/guestBook.txt");
			}//end of else
		}//end of if((file_exists))
	}//end of if(isset($_GET['action']))

	if(isset($_POST['addGuest'])) {//handling any data submitted from web form
		
		$guestName = stripslashes($_POST['guestName']);
		$guestEmail = stripslashes($_POST['guestEmail']);
		$fileString = "\"$guestName\", \"$guestEmail\"\n";
		
		if( file_exists("guests/guestBook.txt") && filesize("guests/guestBook.txt")>0) {
			$existingGuests = file("guests/guestBook.txt");
		}//end of if file exists
	
		if ( in_array($fileString, $existingGuests) ) {//checks to see if the song name is already in list
			echo "<p>You have already signed the book!<br />\n";
			echo "Your name was not added to the list.</p>";
		}//end of if in_array
	
		else{
			$guestFile = fopen("guests/guestBook.txt", "ab");
	
			if ($guestile ===false) {
				echo "There was an error saving your message!\n";
			}//end of if ($SongFile ===false)
	
			else {
				
				
				fwrite($guestFile, $fileString);
				fclose($guestFile);
				echo "Your name has been added to the Guest Book\n";
			}//end of else fwrite($SongFile, $SongToAdd);
		}//end of else $SongFile = fopen("SongOrganizer/songs.txt", "ab");
	}//end of if(isset($_POST['submit']
	
		if ((!file_exists("guests/guestBook.txt")) || (filesize("guests/guestBook.txt")== 0)) {
				echo "<p>There are no guests in the Guest Book.</p>\n";
			}//end of if ! file_exists
			else{
				$guestArray = file("guests/guestBook.txt");
				echo "<table border=\"1\"width=\"40%\" style=\"background-color: lightgray\">\n";
	
				foreach($guestArray as $thisGuestString){
					
					$thisGuestString = str_getcsv($thisGuestString);
					$name = $thisGuestString[0];
					$email = $thisGuestString[1];
					
					$thisGuestString = "<a href=\"mailto:$email\">$name</a>\n";
					echo "<tr>\n";
					echo "<td>$thisGuestString</td>";
					echo "</tr>\n";
				}//end of foreach loop
	
				echo "</table>\n";
	}//end of else

?>

<p>
<a href = "guestBook.php?action=Sort_Ascending">Sort Guest Book</a><br />

<a href = "guestBook.php?action=Remove_Duplicates" >Remove Duplicates</a><br />

<a href = "guestBook.php?action=Shuffle">Randomize Guest Book</a><br />
</p>

<form name="addGuest" method="POST" action="guestBook.php">

<p>Name: <input type="text" name="guestName" /> Email: <input type="text" name="guestEmail" /></p>
<p><input type="submit" name="addGuest" value="Sign Guestbook" />

</form>

</body>
</html>