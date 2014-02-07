<?php
session_start();

include "inc_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password (process_change_password.php)</title>
</head>

<body>
<?
// check the login details of the user and stop execution if not logged in
if(!isset($_SESSION['id'])){
echo "<p style = 'text-align:center; color:red'>You must be a logged in member to change your password.</p>";
exit;

//post the data from the form

$process=$_POST['process'];
$password=$_POST['password'];
$password2=$_POST['password2'];


if(isset($process) and $process=="change-password")
{

	$password=mysql_real_escape_string($password);

//Setting flags for checking
$errors = 0;
$msg="";




if ( strlen($password) < 3 or strlen($password) > 8 ){
$msg.="Password must be between 3 and 8 characters.<br />";
$status= "NOTOK";}

if ( $password != $password2 ){
$msg .="The passwords do not match.<<br />";
++$errors;
}



if($errors == 0)
{
	echo "<p style = 'text-align:center; color:red'>" . $msg  . "</p>";
	echo "<p style = 'text-align:center'><input type='button' value='Retry' onClick='history.go(-1)'>";
}
else
{
	if(mysql_query("UPDATE cz_members4 set password='$password' WHERE id='$_SESSION[id]'"))
	{
		echo "<p style = 'text-align:center'> Your password was changed successfully.</p>
	}
	else
		{
		echo "<p style = 'color:red'>Your password was not changed -- please contact the Chinese Zodiac Site Administrator.</p>";
	}
}
}

?>

</body>

</html>
