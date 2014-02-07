<?php
	session_start();
	if (session_destroy()){
	unset($id);
	}

	if($id=="")
	{
	header("Location: thank_you.html");
	exit();
	}
?>




