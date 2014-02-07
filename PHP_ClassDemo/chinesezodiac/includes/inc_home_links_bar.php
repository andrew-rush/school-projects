<div>
    <?php

	if(!isset($_GET['section']) || $_GET['section'] == "php")
	{
		echo "PHP | ";
	}
	else
	{
		echo "<a href=\"index.php?page=home_page&section=php\">PHP</a> | ";
	}
	
	if($_GET['section'] == "zodiac")
	{
		echo "Chinese Zodiac";
	}
	else
	{
		echo "<a href=\"index.php?page=home_page&section=zodiac\">Chinese Zodiac<a/>";
	}

?>
</div>
    


