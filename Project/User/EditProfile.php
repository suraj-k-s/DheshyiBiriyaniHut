<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

session_start();


if(isset($_POST["btn_submit"]))
{
  $name=$_POST["txtname"];
  $email=$_POST["txtemail"];
  
  
  $insertqry ="update tbl_user set user_name='".$name."',user_email='".$email."' where user_id='". $_SESSION["uid"]."'";
  //echo $insertqry;
  if(mysql_query($insertqry))
  {
?>
 
   <script>
     alert("Updated");
   window.location="MyProfile.php"
   </script>
   <?php
  }
  else 
  {
    ?>
        <script>
     alert("failed");
     window.location="MyProfile.php";
     </script>
         <?php
  }

}




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>

<?php

    $selQry = "select * from tbl_user where user_id='". $_SESSION["uid"]."'";
      $row=mysql_query($selQry);
     if($data=mysql_fetch_array($row))
        {
?>
<form id="form1" name="form1" method="post" action="">
<table align="center">
      <tr>
                <td>Name</td>
                    <td><input type="text" name="txtname" value="<?php echo $data["user_name"];?>" /></td>
            </tr>
            
            <tr>
                <td>Email</td>
                   <td><input type="text" name="txtemail" value="<?php echo $data["user_email"];?>" /></td>
            </tr>
            <tr>
    <td colspan="2"  align="center">
      <input type="submit" name="btn_submit" id="btn_submit"   value="Update" />
      </td>
  </tr>

</table>

<?php

      }
?>

</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>