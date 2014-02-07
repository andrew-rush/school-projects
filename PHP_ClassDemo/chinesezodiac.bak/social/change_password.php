<?php session_start() ?>

<!DOCTYPE html PUBLIC "-//W3c// DTD XHTML 1.0 Transitional//EN"
"http://www.w3org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/199/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Change Member Password (change_password.php)</title>
<link href = "cz.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1 align = "center"><strong>Change Password</strong></h1>
<br /> <br />

<?php
	   function randomString()
	   {
		   $string = md5(rand());
		   return $string;
	   }

if (isset($_SESSION['id']))
   {
   /*test for session id */
   //echo $_SESSION['id'];
   		include("inc_connect.php");
   		//if the submit button has been pressed
   		if (isset($_POST['submit']))
      	{
      	    //post values from form to variables
			$username = $_POST['username'];
			//echo "<p>The email is " . $username . "</p>";
			$password = $_POST['password'];
			//echo "<p>The password is " . $password . "</p>";
			$newpassword = $_POST['newpassword'];
			//echo "<p>The newpassword is " . $newpassword . "</p>";
			$confirmnewpassword = $_POST['confirmpassword'];
			//echo "<p>The confirmed password is " . $confirmnewpassword . "</p>";
			include "inc_connect.php";
			$result = mysql_fetch_array(mysql_query("SELECT passwordHash,passwordSalt FROM cz_members4 WHERE userName='$username'"));
				if(!$result)
				{
					echo "The email you entered is not in our database";
				}
		        if($newpassword==$confirmnewpassword)
		        {
					if ($result['passwordHash'] == md5($_POST['password']. $result['passwordSalt']))
					{
						$pwsalt = randomString();
						$pwhash = md5($newpassword . $pwsalt);
						$sql=mysql_query("UPDATE cz_members4 SET passwordHash='$pwhash', passwordSalt='$pwsalt' where userName='$username'");
						if($sql)
						{
							echo "<p class = \"center\">Congratulations! You have successfully changed your password.</p>";
							 $message = "   <p style = \"text-align:center\"><a href=\"view_member_list.php\">View the member list</a> | ";
						   $message .= "   <a href=\"view_member_webpage.php?id=".
								 $_SESSION['id']."\">View my member web page</a> | ";
						   $message .= "   <a href=\"member_update.php\">Update my information</a> | ";
						   $message .= "   <a href=\"change_password.php?id=".
								 $_SESSION['id']."\">Change my password</a> | ";
						   $message .= "   <a href =\"log_out.php\">Log out</a>\n";
						   $message .= "<br /><br />";

	  echo $message;
						}
					}
					else
					{
						//User entered their current password incorrectly
						echo "Incorrect current password";
					}
	         	}
	            else
	            {
	                echo "The new password and confirm new password fields must be the same";
	            }
		}
		else
		{

		//display form
		?>

		<h1 class = "center">
		<strong>Change Password</strong>
		</h1>
		<form  name = "change_password" action="change_password.php" method="post">

			<p><strong>Email: </strong>
				<input type="text" name="username" size="25" maxlength="100" />
			</p>
			<p><strong>Password: </strong>
				<input type="password" name="password" size="25" maxlength="100" />
			</p>
			<p><strong>New Password: </strong>
				<input type="password" name="newpassword" size="25" maxlength="100" />
			</p>
			<p><strong>Confirm Password: </strong>
				<input type="password" name="confirmpassword" size="25" maxlength="100" />
			</p>

			<p><input type="submit" name="submit" value="Change Password" />
			</p>
		</form>
<?php
		}
}
else
{
     $message="<p>You are not logged in. You cannot perform this action.</p>\n";
     $message.="<p>Please <a href='member_login.html'>log in</a> to perform this action.</p>\n";
}

?>
