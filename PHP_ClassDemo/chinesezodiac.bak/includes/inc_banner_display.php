<?php

	$banner_array = array("images/banner1.png",
							"images/banner2.png",
							"images/banner3.png",
							"images/banner4.png",
							"images/banner5.png");
							
	$banner_count = count($banner_array);
	
	if( empty($_COOKIE['lastBanner']) ) {
		
		$banner_index = rand(0, $banner_count - 1);
		
	} else {
		
		$banner_index = $_COOKIE['lastBanner'];
		$banner_index = (++$banner_index) % $banner_count;
		
	}
	
	setcookie( "lastBanner", $banner_index, (time() + 60*60*24*7) );

?>