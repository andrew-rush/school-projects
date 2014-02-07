<?php session_start() ?>

<!DOCTYPE html PUBLIC "-//W3c// DTD XHTML 1.0 Transitional//EN"
"http://www.w3org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/199/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Update My Member Data (member_update.php)</title>
<link href = "cz.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1 align = "center"><strong>Update Member Data</strong></h1><br /> <br />

<?php

if (isset($_SESSION['id']))
   {
   /*test for session id */
   //echo $_SESSION['id'];
   include("inc_connect.php");
   //if the submit button has been pressed
   if (isset($_POST['submit']))
      {
     //change the values in the cz_members4 table with the values entered in the form
	       $sql="update cz_members4 set ".
	             "firstName = '".$_POST['member_fname']."', ".
	             "lastName = '".$_POST['member_lname']."', ".
	             "chineseName = '".$_POST['chineseName']."', ".
	             "sign = '".$_POST['sign']."', ".
	             "element = '".$_POST['element']."', ".
	             "compatible = '".$_POST['compatible']."', ".
	             "YinYang = '".$_POST['YinYang']."', ".
	             "personality = '".$_POST['personality']."' ".
            "where id=".$_SESSION['id'];

      $result = mysql_query($sql)
            or die(mysql_error());
      }

   $result = mysql_query("SELECT * FROM cz_members4 WHERE id=".
         number_format($_SESSION['id']))
         or die(mysql_error());

   echo "<div class = \"center\">";
   echo "<strong>Select an image to upload:<strong><br />\n";
   echo "<form method=\"post\" action=\"member_upload.php\" ".
         "enctype=\"multipart/form-data\">".
         "<input type=\"file\" name=\"image\">".
         "<input type=\"submit\" name=\"submit\" value=\"Upload\">".
         "</form>\n";
   echo "</center>";

   echo"<form action=\"member_update.php\" method=\"POST\">\n";

   echo "<center>";

   echo"<table border = '15'>";

   while($row = mysql_fetch_array($result))
      {
      $loadimage=FALSE;
      if (strlen($row['image'])==0)
         {
         $imagetext="<i>(No Image Uploaded)</i>";
         }
       else
         {
         $imagetext=$row['image'];
         $loadimage=TRUE;
         }
    	echo "<tr>\n";
      echo "   <td style = \"text-align:right\"><strong>First Name :&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"member_fname\" value=\"".$row['firstName']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Last Name :&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"member_lname\" value=\"".$row['lastName']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Chinese Name :&nbsp;</strong></td>\n";
	  echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"chineseName\" value=\"".$row['chineseName']."\"></td>\n";
      echo "</tr><tr>\n";

     echo "   <td style = \"text-align:right\"><strong>Zodiac Sign:&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"sign\" value=\"".$row['sign']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "  <td style = \"text-align:right\"><strong>Element :&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"element\" value=\"".$row['element']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Compatible :&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"50\" maxlength=\"50\" name=\"compatible\" value=\"".$row['compatible']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Yin or Yang :&nbsp;</strong></td>\n";
      echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"25\" maxlength=\"25\" name=\"YinYang\" value=\"".$row['YinYang']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Personality :&nbsp;</strong></td>\n";
	        echo "   <td style = \"text-align:left\" /><input type=\"text\" size=\"100\" maxlength=\"100\" name=\"personality\" value=\"".$row['personality']."\"></td>\n";
      echo "</tr><tr>\n";
      echo "</tr><tr>\n";
      echo "   <td style = \"text-align:right\"><strong>Image :&nbsp;</strong></td>\n";
      echo "   <td bgcolor=\"#D0D0D0\" align=\"left\" valign=\"top\">".$imagetext."&nbsp;";
      if ($loadimage)
         {
         echo "<img src=\"images/".$row['userName']."/".
               $imagetext."\" alt=\"[".$row['firstName']." ".
                     $row['lastName']."]\">";
         }
      echo "</td>\n";
      echo "</tr><tr>\n";
      echo "   <td  style = \"text-align:center\" colspan=\"2\">";
      echo "<input type=\"submit\" name=\"submit\" value=\"Save Updated Information\"></td>\n";
    	echo "</tr>\n";
      }
   echo "</table>\n";
   echo"</div>";
   echo "</form>\n";
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
 else
   {
   echo "<p>You are not logged in. You cannot view this information.</p>\n";
   echo "<p>Please <a href='member_login.html'>log in</a> to view this information.</p>\n";
   }

?>

</body>
</html>