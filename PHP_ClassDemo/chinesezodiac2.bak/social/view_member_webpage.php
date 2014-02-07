<?php
   session_start();

   $show_link=FALSE;
   $show_error=TRUE;
   $row=array();
   $id="";

   if ($_GET['id'])
      {
      $id=$_GET['id'];
      }


   if (strlen($id)>0)
      {
       include "inc_connect.php";
      $table_name='cz_members4';



      if ($DBConnect==FALSE)
         {
         $title="Connection Error";

         $error_msg="ERROR: ".mysql_error()."<br />\n";
         $show_link=TRUE;
         $show_error=TRUE;
         }
       else
         {
         if ($DBSelect)
            {
            $sql="select * from $table_name ".
                  " where id=".number_format($id);

            $rows=mysql_query($sql,$DBConnect);
            if ($rows==FALSE)
               {
               $title="Data Error(FALSE)";

               $error_msg="ERROR: ".mysql_error()."<br />\n";
               $show_link=TRUE;
               $show_error=TRUE;
               }
             else if (mysql_num_rows($rows)==0)
               {
               $title="Data Error(0 rows)";

               $error_msg="ERROR: Zodiac member not found<br />\n";
               $show_link=TRUE;
               $show_error=TRUE;
               }
             else if (mysql_num_rows($rows)==1)
               {
               $row=mysql_fetch_array($rows);
               $title=$row['firstName']." ".$row['lastName'].
                     "'s Zodiac Information";
               }
             else
               {
               $title="Data Error(unknown)";

               $error_msg="ERROR: Internal data error<br />\n";
               $show_link=TRUE;
               $show_error=TRUE;
               }
            }
          else
            {
            $title="Data Error(no db)";

            $error_msg="ERROR: ".mysql_error()."<br />\n";
            $show_link=TRUE;
            $show_error=TRUE;
            }
         }
      }
    else
      {
      header("Location: view_member_list.php");
      exit;
      }

?>

<!DOCTYPE html PUBLIC "-//W3c// DTD XHTML 1.0 Transitional//EN"
"http://www.w3org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?> (view_member_webpage.php)</title>
<link href = "cz.css" rel = "stylesheet" type = "text/css" />

</head>
<body>
<h1 align = "center"><strong>Member Information</strong></h1><br /> <br />
<?php


   if ($show_link)
      {
      echo "Visit the <a href=\"view_member_list.php\">Members ".
            "List</a> to select a cz member.\n";
      echo "<p />\n";
      }
    else
      {
      echo"<center>";
      echo"<table border = '15'>";

    	echo "<tr>\n";
      echo "   <td colspan=2 style =\"text-align:right; vertical-align:top\">";
      if (strlen($row['image'])>0)
         {
         echo "<img src=\"images/".$row['userName']."/".
               $row['image']."\" alt=\"[".$row['firstName']." ".
               $row['lastName']."]\">&nbsp;";
         }
      echo "<b>".$row['firstName']."&nbsp;".$row['lastName'].
            "</b></td>\n";
      echo "</tr><tr>\n";
      echo "   <td style =\"text-align:right\"><strong>Chinese Name :&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['chineseName']."&nbsp;</td>\n";
      echo "</tr><tr>\n";
      echo "   <td style =\"text-align:right\"><strong>Zodiac Sign :&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['sign']."&nbsp;</td>\n";
      echo "</tr><tr>\n";
      echo "   <td style =\"text-align:right\"><strong>Element :&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['element']."&nbsp;</td>\n";
      echo "</tr><tr>\n";
      echo "   <td style =\"text-align:right\"><strong>Compatible with :&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['compatible']."&nbsp;</td>\n";
      echo "</tr><tr>\n";
      echo "   <td style =\"text-align:right\"><strong>Yin or Yang :&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['YinYang']."&nbsp;</td>\n";
      echo "</tr><tr>\n";

      echo "   <td style =\"text-align:right\"><strong>Personality&nbsp;</strong></td>\n";
      echo "   <td style=\"text-align:left\">".$row['personality']."&nbsp;</td>\n";
    	echo "</tr>\n";

      echo "</table>\n";
      echo"</center>";
      echo "<p />\n";
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
 ?>
</body>
</html>