<?php

	if(isset($_POST['signs'])) {
		
		$signs = $_POST['signs'];
		
		$signs = explode(",", $signs);
		
		for($i = 0; $i < count($signs); $i++) {
			
			$signs[$i] = trim($signs[$i]);
			
		}
		
		sort($signs);
		
		$signs = implode(", ", $signs);
		
		echo "<p>Your string sorted:\n";
		echo "<blockquote>$signs</blockquote>\n";
		echo "</p>\n";
		
	}

?>

<p>Please enter the signs of the Chinese zodiac in random order in the text box below. Please be sure that it looks like the string below, with commas between the signs. Feel free to copy and paste the provided string into the form if you want want minimize your typing.</p>
<p>Rat, Ox, Tiger, Rabbit, Dragon, Snake, Horse, Goat, Monkey, Rooster, Dog, Pig</p>


<form id="zodiacSigns" name="form1" method="POST" action="">
  <p><textarea name="signs" cols="35" rows="15"></textarea></p>
  <p><input name="submit" type="submit" value="Submit Signs for Sorting" /></p>
</form>

<p>P.S. This form will sort any string of comma-separated values, not just the signs of the Chinese zodiac.