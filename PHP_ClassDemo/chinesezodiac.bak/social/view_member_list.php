<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3c// DTD XHTML 1.0 Transitional//EN"
"http://www.w3org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/199/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Chinese Zodiac Member List (view_member_list.php)</title>
<link href = "cz.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<h1 align = "center"><strong>Member List</strong></h1><br /> <br />

<?php

   $message = "   <p style = \"text-align:center\"><a href=\"view_member_list.php\">View the member list</a> | ";
  	           $message .= "   <a href=\"view_member_webpage.php?id=".
  	                 $_SESSION['id']."\">View my member web page</a> | ";
  	           $message .= "   <a href=\"member_update.php\">Update my information</a> | ";
  	           $message .= "   <a href=\"change_password.php?id=".
  	                 $_SESSION['id']."\">Change my password</a> | ";
  	           $message .= "   <a href =\"log_out.php\">Log out</a>\n";
  	           $message .= "<br /><br />";

	  echo $message;

		include "inc_connect.php";


$result = mysql_query("SELECT id, firstName, lastName FROM cz_members4 ".
      " ORDER BY lastName, firstName");

$prevletter="@";
//variable for the navigation bar
$menustr = "";
//variable for the list of names
$liststr = "";
//declares an array of letters
$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I",
      "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T",
      "U", "V", "W", "X", "Y", "Z");

while($row = mysql_fetch_array($result))
   {
   $lastName = "";

   //the strtoupper takes the first letter of the last name and converts it to uppercase
   //remenber that the first argument of the substr() is the string you are working on
   //the second argument is the starting position of the string
   //the third argument is the ending position of the string


   $currletter=strtoupper(substr($row["lastName"],0,1));

   //strcasecmp compares the current letter with the pevious letter - if you get a 0, they are the same - if you get a -1, they are different.
   if (strcasecmp($currletter,$prevletter)!=0)
      {
      //iterates through the array
      foreach ($letters as $letter)
         {

         if ((strcasecmp($prevletter,$letter)<0) &&
               (strcasecmp($letter,$currletter)<0))
            {
            //navigation bar is equal to a space | space
            $menustr.=" &nbsp; $letter";
            }
         }
      if (strlen($menustr)>0)
         {
         $menustr.=" &nbsp; ";
         }
      //creates a hyperlink from the navigation bar to the same letter in the list
      $menustr.="<a href=\"#LETTER$currletter\">$currletter</a>";


      $liststr.="<hr />\n";

      //names the section [LETTERA or LETTERB]
      $liststr.="<a name=\"LETTER$currletter\"><b>$currletter</b></a><br />\n";
      //makes the current letter the next one in the alphabet
      $prevletter=$currletter;
      }
   $liststr.="<p />\n";
   //makes the first and last name in the list a hyperlink to the web page with the id of that member
   $liststr.="<a href=\"view_member_webpage.php?id=".number_format($row['id']).
         "\">".$row['lastName'].", ".$row['firstName']."</a><br />\n";
   }

//lists the rest of the letters without a hyperlink if they do not have a matching value
foreach ($letters as $letter)
   {
   if (strcasecmp($currletter,$letter)<0)
      {
      $menustr.=" &nbsp; $letter";
      }
   }

$liststr.="<hr />\n";
echo "<center>\n";
echo "<table border=\"3\" width=\"95%\">\n";
echo "   <tr>\n";
echo "      <td style = \"text-align:center\">";
echo "Select First Letter of Chinese Zodiac Member:";
echo "</td>\n";
echo "   </tr>\n";
echo "   <tr>\n";
echo "      <td style = \"text-align:center\">";
echo $menustr;
echo "</td>\n";
echo "   </tr>\n";
echo "</table>\n";
echo "</center>\n";
echo $liststr;

?>

</body>
</html>