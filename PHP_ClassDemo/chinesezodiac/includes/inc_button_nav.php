<a href = "index.php?page=home_page"><img class="btn" src="images/home.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=site_layout"><img class="btn" src="images/info.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=control_structures"><img class="btn" src="images/control.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=string_functions"><img class="btn" src="images/strings.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=web_forms"><img class="btn" src="images/forms.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=midterm_assessment"><img class="btn" src="images/midterm.png" style="border: 0" /></a>
<br />
<a href = "index.php?page=final"><img class="btn" src="images/final.png" style="border: 0" /></a>
<?php
	
	// include("includes/inc_banner_display.php");
	$image = $banner_array[$banner_index];

?>
<img class="btn" src="<?php echo $image ?>" style="border: 0" />