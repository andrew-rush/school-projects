<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Song Organizer</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1"/>
</head>

<!--
Sample Code
-->

<body>
<h1>Song Organizer</h1>
<?php
//action is for the hyperlink -- like ?page
if(isset($_GET['action'])) {
    //if the file songs.txt exists and is not blank
	if((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt")!=0)) {

		//Gets the songs and puts them in an indexed array
		$SongArray = file("SongOrganizer/songs.txt");

		//use troubleshooting technique to see if the array contains values
		//echo "<pre>";
		    //print_r($SongArray);
		//echo "</pre>";


		//the switch statment checks to see which of the actions has been clicked and performs those steps
		//NOTHING HAPPENS HERE UNLESS A ACTION HYPERLINK HAS BEEN CLICKED
		switch ($_GET['action']) {

		case 'Remove_Duplicates': //removes duplicates from the songorganizer
			$SongArray = array_unique($SongArray); //The array_unique() is used to remove duplicate values from an array
			$SongArray = array_values($SongArray);//assigns all the values of the array to $SongArray -- but no indexese
			break;

		case 'Sort_Ascending'://sorts songarray ascending
			sort($SongArray);//sorts the array by values
			break;

		case 'Shuffle'://shuffles the song names
			shuffle($SongArray);//The shuffle() function randomizes the order of the elements
			break;
		}//end of switch statement


		//the contents of the songs.txt file are in an ndexed array
		if (count($SongArray)>0) {

		    //
			$NewSongs = implode($SongArray);//turns the indexed array into a string so it can be saved to the text file
			//Opens a handle to the songs.txt file in write binary mode
			$SongStore = fopen("SongOrganizer/songs.txt", "wb");

			if($SongStore ===false){
				echo "There was an error updating the song file\n";
			}//end of inner if

			else{
				fwrite($SongStore, $NewSongs);
				fclose($SongStore);
			}//end of inner else

		}//end of if (count($SongArray)>0)
	else{
			unlink("SongOrganizer/songs.txt");
		}//end of else
	}//end of if((file_exists))
}//end of if(isset($_GET['action']))


if(isset($_POST['submit'])) {//handling any data submitted from web form
	$SongToAdd = stripslashes($_POST['SongName']) . "\n";
	$ExistingSongs = array();

	if(file_exists("SongOrganizer/songs.txt") && filesize("SongOrganizer/songs.txt")>0) {
		$ExistingSongs = file("SongOrganizer/songs.txt");
	}//end of if file exists

	if (in_array($SongToAdd, $ExistingSongs)) {//checks to see if the song name is already in list
		echo "<p>The song you entered already exists! <br />\n";
		echo "Your Song was not added to the list.</p>";
	}//end of if in_array

	else{//adds new song to song list
		$SongFile = fopen("SongOrganizer/songs.txt", "ab");

		if ($SongFile ===false) {
			echo "There was an error saving your message!\n";
		}//end of if ($SongFile ===false)

		else{
			fwrite($SongFile, $SongToAdd);
			fclose($SongFile);
			echo "Your song has been added to the list\n";
		}//end of else fwrite($SongFile, $SongToAdd);
	}//end of else $SongFile = fopen("SongOrganizer/songs.txt", "ab");
}//end of if(isset($_POST['submit']

	if ((!file_exists("SongOrganizer/songs.txt")) || (filesize("SongOrganizer/songs.txt")== 0)) {
			echo "<p>There are no songs in the list.</p>\n";
		}//end of if ! file_exists
		else{
			$SongArray = file("SongOrganizer/songs.txt");
			echo "<table border=\"1\"width=\"100%\" style=\"background-color: lightgray\">\n";

			foreach($SongArray as $Song){
				echo "<tr>\n";
				echo "<td>" . htmlentities($Song) . "</td>";
				echo "</tr>\n";
			}//end of foreach loop

			echo "</table>\n";
}//end of else


?>
<!-- Displaying hyperlinks for the three functions in the switch statment -->
<p>
<a href = "SongOrganizer.php?action=Sort_Ascending">Sort Song List</a><br />

<a href = "SongOrganizer.php?action=Remove_Duplicates" >Remove Duplicates</a><br />

<a href = "SongOrganizer.php?action=Shuffle">Randomize Song List</a><br />
</p>

<!--Web Form for entering song names into the song list  -->
<form action= "SongOrganizer.php" method = "post">
<p>Add a New Song</p>

<p>Song Name: <input type = "text" name = "SongName"/></p>

<p>
<input type = "submit" name = "submit" value = "Add Song to List"/>
<input type = "reset" name = "reset" value = "Reset Song Name">
</p>

</form>
</body>
</html>