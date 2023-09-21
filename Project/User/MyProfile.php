<?php
ob_start();
 include("Head.php");
include("../Assets/Connection/Connection.php");

session_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
</head>

<body>

<div align="center">
  <?php

    $selQry = "select * from tbl_user where user_id='".$_SESSION["uid"]."'";
      $row=mysql_query($selQry);
     if($data=mysql_fetch_array($row))
        {
?>
  <table>
  <tr>
      <td colspan="2" align="center"><img src="../Assets/Files/Photo/<?php echo $data["user_photo"];?>" width="100" height="100" /></td>
      </tr>
    <tr>
      <td>Name: </td>
      <td><?php echo $data["user_name"];?></td>
      </tr>
    
    <tr>
      <td>Email:</td>
      <td><?php echo $data["user_email"];?></td>
      </tr>
    
      <tr>
      <td>Contact:</td>
      <td><?php echo $data["user_contact"];?></td>
      </tr>
      <tr>
      <td>Address:</td>
      <td><?php echo $data["user_address"];?></td>
      </tr>
      <tr>
      <td><a href="EditProfile.php">Edit Profile</a></td>
      <td><a href="ChangePassword.php">Change Password</a></td>
      </tr>
    
    
  </table>
  
  <?php

      }
?>
</div>
</body>
</html>
<?php
ob_flush();
 include("Foot.php");
?>