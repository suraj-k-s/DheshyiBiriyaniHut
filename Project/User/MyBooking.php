<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

$selQry="select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id inner join  tbl_product p on p.product_id = c.product_id where user_id='".$_SESSION["uid"]."' and booking_status>0 and cart_status>0"; 
	$res=mysql_query($selQry);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<table border="1">
  <tr>
    <td>SlNo</td>
    <td>Name</td>
    <td>Date</td>
    <td>Photo</td>
    <td>Quantity</td>
    <td>Total amount</td>
    <td>Status</td>
  </tr>
      <?php
	  $i=0;
	while($row=mysql_fetch_array($res))
	{
		$quantity=$row["cart_quantity"];
		$price=$row["product_price"];
		$totalamount=$quantity*$price;
		$i++;
		
  ?>
   <tr>
	<td><?php echo $i;?></td>
    <td><?php echo $row["product_name"];?></td>
    <td><?php echo $row["booking_date"];?></td>
    <td><img src="../Assets/Files/Products/<?php echo $row["product_photo"];?>" width="47" /></td>
    <td><?php echo $row["cart_quantity"];?></td>
    <td><?php echo  "$totalamount";?></td>
	<td>
        <?php
                  if($row['cart_status']=="1")
                  {
                    echo "Order Placed";
                  }
                  else if($row['cart_status']=="2")
                  {
                    echo "Order Processing";
                  }
                  else if($row['cart_status']=="3")
                  {
                    echo "Order Ready To Deliver";
                  }
                  else if($row['cart_status']=="4")
                  {
                    echo "Order Completed";
                  }

              ?>  

  </td>
                    
					
       </tr>
<?php
	}

	
	?>
    
</table>

</form>
	</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>