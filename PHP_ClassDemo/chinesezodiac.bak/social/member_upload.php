<?php
session_start();

//check for session id
if (isset($_SESSION['id']))
   {
   if (isset($_POST['submit']))
      {
      //limit the file types that can be used for pictures
      $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');


      //upload if the image type is okay
      if (in_array($_FILES['image']['type'], $permitted)
      && $_FILES['image']['size'] >0)
         {
         require("inc_connect.php");
            $table_name = "cz_members4";

         $sql="select userName from $table_name ".
               "where id=".$_SESSION['id'];

         $result=mysql_query($sql,$DBConnect) or die(mysql_error());

         if ($result)
            {
            $row=mysql_fetch_array($result);
            if (!is_dir('images'))
			   {
			   mkdir('images');
			   chmod('images', 0755);
               }
            $upload_dir="images/".$row['userName'];
            if (!is_dir($upload_dir))
               {
               mkdir($upload_dir);
               chmod($upload_dir, 0755);
               }

            copy ($_FILES['image']['tmp_name'],
                  "$upload_dir/".$_FILES['image']['name'])
                  or die ("Could not copy");
            chmod("$upload_dir/".$_FILES['image']['name'], 0644);

            $sql="update $table_name set image='".
                  $_FILES['image']['name']."' ".
                  "where id=".$_SESSION['id'];

            $result=mysql_query($sql,$DBConnect) or die(mysql_error());

            header("Location:member_update.php");
            exit;
            }
          else
            {
            $message="<p>Data error, invalid user ID.</p>\n";
            $message.="<p>Please <a href='member_login.html'>log in</a> to perform this action.</p>\n";
            }
         }
       else
         {
         $message="<p>Only images may be uploaded.</p>\n";
         $message.="<p>Please <a href='member_update.php'>select an image file</a> to upload.</p>\n";
         }
      }
    else
      {
      echo "the submit button was not pressed";
      $message="<p>No file specified.</p>\n";
      $message.="<p>Please <a href='member_update.php'>select a file</a> to upload.</p>\n";
      }
   }
 else
   {
   $message="<p>You are not logged in. You cannot perform this action.</p>\n";
   $message.="<p>Please <a href='member_login.html'>log in</a> to perform this action.</p>\n";
   }
?>

<!DOCTYPE html PUBLIC "-//W3c// DTD XHTML 1.0 Transitional//EN"
"http://www.w3org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/199/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Upload Error (member_upload.php)</title>
</head>
<body>
<h1 class = "center"><strong>Update Error</strong></h1><br /> <br />
<?php echo $message; ?>
</body>
</html>
